<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use App\Services\JapaneseRomajiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AddressController extends Controller
{
    private JapaneseRomajiService $romajiService;

    public function __construct(
        JapaneseRomajiService $romajiService
    ) {
        $this->romajiService = $romajiService;
    }

    /**
     * 住所変換画面
     */
    public function index()
    {
        $csvResults = session('csvResults', []);
        $csvCount = session('csvCount', 0);
        $addresses = session('addresses', []);
        $postalCode = session('postalCode', '');
        $inputAddress = session('inputAddress', '');
        $searchType = session('searchType', '');
        $csvError = session('csv_error', '');

        return response()
            ->view('address', compact(
                'csvResults',
                'csvCount',
                'addresses',
                'postalCode',
                'inputAddress',
                'searchType',
                'csvError'
            ))
            ->header(
                'Cache-Control',
                'no-store, no-cache, must-revalidate, max-age=0'
            )
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    /**
     * 利用規約
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * プライバシーポリシー
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * お問い合わせ
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * このサイトについて
     */
    public function about()
    {
        return view('about');
    }

    /**
     * 協力・提携について
     */
    public function cooperation()
    {
        return view('cooperation');
    }

    /**
     * 郵便番号から検索
     *
     * この検索だけDBを使用する。
     */
    public function search(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'postal_code' => [
                    'required',
                    'string',
                    'max:20',
                ],
            ],
            [
                'postal_code.required' =>
                    '郵便番号を入力してください。',
                'postal_code.string' =>
                    '郵便番号の形式が正しくありません。',
                'postal_code.max' =>
                    '郵便番号は20文字以内で入力してください。',
            ]
        );

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput()
                ->with('searchType', 'postal')
                ->with(
                    'postalCode',
                    (string) $request->input(
                        'postal_code',
                        ''
                    )
                );
        }

        $postalCode = $this->normalizePostalCode(
            (string) $request->input(
                'postal_code',
                ''
            )
        );

        if ($postalCode === '') {
            return redirect('/')
                ->withErrors([
                    'postal_code' =>
                        '郵便番号を入力してください。',
                ])
                ->withInput()
                ->with('searchType', 'postal')
                ->with('postalCode', '');
        }

        if (!preg_match('/^\d{7}$/', $postalCode)) {
            return redirect('/')
                ->withErrors([
                    'postal_code' =>
                        '郵便番号は7桁で入力してください。',
                ])
                ->withInput()
                ->with('searchType', 'postal')
                ->with(
                    'postalCode',
                    $postalCode
                );
        }

        /*
         * 郵便番号検索ではDBを使用する。
         */
        $addresses = PostalCode::where(
            'postal_code',
            $postalCode
        )->get();

        foreach ($addresses as $address) {
            $this->formatAddress($address);
        }

        return redirect('/')
            ->with('addresses', $addresses)
            ->with('postalCode', $postalCode)
            ->with('searchType', 'postal');
    }

    /**
     * 日本語住所から検索
     *
     * この処理ではDBを一切使用しない。
     */
    public function searchAddress(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'address' => [
                    'required',
                    'string',
                    'max:500',
                ],
            ],
            [
                'address.required' =>
                    '住所を入力してください。',
                'address.string' =>
                    '住所の形式が正しくありません。',
                'address.max' =>
                    '住所は500文字以内で入力してください。',
            ]
        );

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput()
                ->with('addresses', [])
                ->with(
                    'inputAddress',
                    (string) $request->input(
                        'address',
                        ''
                    )
                )
                ->with('searchType', 'address');
        }

        $inputAddress = trim(
            (string) $request->input(
                'address',
                ''
            )
        );

        if ($inputAddress === '') {
            return redirect('/')
                ->withErrors([
                    'address' =>
                        '住所を入力してください。',
                ])
                ->withInput()
                ->with('addresses', [])
                ->with('inputAddress', '')
                ->with('searchType', 'address');
        }

        /*
         * 入力住所を正規化する。
         *
         * ここではDBを使用しない。
         */
        $normalizedAddress = $this->normalizeAddressText(
            $inputAddress
        );

        /*
         * 住所の先頭に郵便番号がある場合は除去する。
         */
        $normalizedAddress = $this->removeLeadingPostalCode(
            $normalizedAddress
        );

        if ($normalizedAddress === '') {
            return redirect('/')
                ->withErrors([
                    'address' =>
                        '住所を入力してください。',
                ])
                ->withInput()
                ->with('addresses', [])
                ->with(
                    'inputAddress',
                    $inputAddress
                )
                ->with('searchType', 'address');
        }

        /*
         * 日本語住所をDBなしで解析する。
         */
        $independentAddress =
            $this->createIndependentAddress(
                $normalizedAddress
            );

        if ($independentAddress !== null) {
            $addresses = collect([
                $independentAddress,
            ]);
        } else {
            $addresses = collect();
        }

        return redirect('/')
            ->with('addresses', $addresses)
            ->with(
                'inputAddress',
                $inputAddress
            )
            ->with('searchType', 'address');
    }

    /**
     * CSV / TXT 一括変換
     *
     * DBを使用するのは郵便番号検索だけ。
     *
     * CSVの郵便番号がDBに存在する場合：
     *     → DB住所を使用
     *
     * 郵便番号が空、またはDBに存在しない場合：
     *     → 日本語住所をDB検索せず、自前解析
     */
    public function convertCsv(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'csv_file' => [
                    'required',
                    'file',
                    'mimes:csv,txt',
                    'max:131072',
                ],
            ],
            [
                'csv_file.required' =>
                    'CSVまたはTXTファイルを選択してください。',
                'csv_file.file' =>
                    '正しいファイルを選択してください。',
                'csv_file.mimes' =>
                    'CSVまたはTXTファイルを選択してください。',
                'csv_file.max' =>
                    'ファイルサイズが大きすぎます。',
            ]
        );

        if ($validator->fails()) {
            $errorMessage =
                $validator
                    ->errors()
                    ->first('csv_file');

            return redirect('/')
                ->withErrors($validator)
                ->withInput()
                ->with('csv_error', $errorMessage);
        }

        $file = $request->file('csv_file');

        if (!$file || !$file->isValid()) {
            $errorMessage =
                'ファイルのアップロードに失敗しました。';

            return redirect('/')
                ->withErrors([
                    'csv_file' =>
                        $errorMessage,
                ])
                ->withInput()
                ->with(
                    'csv_error',
                    $errorMessage
                );
        }

        $path = $file->getRealPath();

        if (!$path) {
            $errorMessage =
                'ファイルを読み込めませんでした。';

            return redirect('/')
                ->withErrors([
                    'csv_file' =>
                        $errorMessage,
                ])
                ->withInput()
                ->with(
                    'csv_error',
                    $errorMessage
                );
        }

        $handle = fopen($path, 'r');

        if ($handle === false) {
            $errorMessage =
                'ファイルを開けませんでした。';

            return redirect('/')
                ->withErrors([
                    'csv_file' =>
                        $errorMessage,
                ])
                ->withInput()
                ->with(
                    'csv_error',
                    $errorMessage
                );
        }

        $rows = [];
        $lineNumber = 0;

        while (($row = fgetcsv($handle)) !== false) {
            $lineNumber++;

            /*
             * 空行をスキップ
             */
            if (
                count($row) === 1 &&
                trim((string) $row[0]) === ''
            ) {
                continue;
            }

            /*
             * 2列未満の場合
             */
            if (count($row) < 2) {
                fclose($handle);

                $errorMessage =
                    "{$lineNumber}行目の形式が正しくありません。";

                return redirect('/')
                    ->withErrors([
                        'csv_file' =>
                            $errorMessage,
                    ])
                    ->withInput()
                    ->with(
                        'csv_error',
                        $errorMessage
                    );
            }

            /*
             * UTF-8 BOM除去
             */
            if ($lineNumber === 1) {
                $row[0] = preg_replace(
                    '/^\xEF\xBB\xBF/',
                    '',
                    (string) $row[0]
                );
            }

            $postalCode = trim(
                (string) $row[0]
            );

            $japaneseAddress = trim(
                (string) $row[1]
            );

            /*
             * ヘッダーをスキップ
             */
            $headerPostal =
                mb_strtolower(
                    $postalCode
                );

            if (
                $postalCode === '郵便番号' ||
                $headerPostal === 'postal_code' ||
                $headerPostal === 'postcode' ||
                $headerPostal === 'postal code'
            ) {
                continue;
            }

            /*
             * 両方空ならスキップ
             */
            if (
                $postalCode === '' &&
                $japaneseAddress === ''
            ) {
                continue;
            }

            $rows[] = [
                'postal_code' =>
                    $postalCode,
                'japanese_address' =>
                    $japaneseAddress,
            ];

            /*
             * 最大100件
             */
            if (count($rows) > 100) {
                fclose($handle);

                $errorMessage =
                    '一度に変換できる件数は100件までです。';

                return redirect('/')
                    ->withErrors([
                        'csv_file' =>
                            $errorMessage,
                    ])
                    ->withInput()
                    ->with(
                        'csv_error',
                        $errorMessage
                    );
            }
        }

        fclose($handle);

        /*
         * 空データの場合
         */
        if (empty($rows)) {
            $errorMessage =
                '変換する住所データがありません。';

            return redirect('/')
                ->withErrors([
                    'csv_file' =>
                        $errorMessage,
                ])
                ->withInput()
                ->with(
                    'csv_error',
                    $errorMessage
                );
        }

        $csvResults = [];

        foreach ($rows as $row) {
            /*
             * 郵便番号を正規化
             */
            $postalCode =
                $this->normalizePostalCode(
                    $row['postal_code']
                );

            /*
             * 日本語住所
             *
             * 日本語住所の解析自体はDBを使用しない。
             */
            $japaneseAddress =
                trim(
                    (string) $row['japanese_address']
                );

            $normalizedAddress = '';

            if ($japaneseAddress !== '') {
                $normalizedAddress =
                    $this->normalizeAddressText(
                        $japaneseAddress
                    );

                $normalizedAddress =
                    $this->removeLeadingPostalCode(
                        $normalizedAddress
                    );
            }

            /*
             * ==================================================
             * ① 郵便番号がある場合だけDB検索
             * ==================================================
             */
            $postalAddress = null;

            if ($postalCode !== '') {
                $postalAddress =
                    PostalCode::where(
                        'postal_code',
                        $postalCode
                    )->first();
            }

            /*
             * ==================================================
             * ② 郵便番号DB検索に成功
             * ==================================================
             */
            if ($postalAddress) {
                /*
                 * CSVでは日本語住所の詳細部分だけを
                 * 入力住所から取得する。
                 *
                 * 日本語住所そのものをDB検索しない。
                 */
                $detail = '';

                if ($normalizedAddress !== '') {
                    $detail =
                        $this->extractDetailFromInputAddress(
                            $normalizedAddress
                        );
                }

                $this->formatAddress(
                    $postalAddress,
                    $detail
                );

                $csvResults[] = [
                    'postal_code' =>
                        $row['postal_code'],

                    'japanese_address' =>
                        $japaneseAddress,

                    'international_address' =>
                        $postalAddress
                            ->international_address,
                ];

                continue;
            }

            /*
             * ==================================================
             * ③ 郵便番号DB検索に失敗
             *
             * 日本語住所から自前解析する。
             *
             * ここではDBを使用しない。
             * ==================================================
             */
            if ($normalizedAddress !== '') {
                $fallbackAddress =
                    $this->createIndependentAddress(
                        $normalizedAddress,
                        $postalCode
                    );

                if ($fallbackAddress !== null) {
                    $csvResults[] = [
                        'postal_code' =>
                            $row['postal_code'],

                        'japanese_address' =>
                            $japaneseAddress,

                        'international_address' =>
                            $fallbackAddress
                                ->international_address,
                    ];

                    continue;
                }
            }

            /*
             * 本当に解析できない場合のみエラー
             */
            $csvResults[] = [
                'postal_code' =>
                    $row['postal_code'],

                'japanese_address' =>
                    $japaneseAddress,

                'international_address' =>
                    '変換できませんでした',
            ];
        }

        return redirect('/')
            ->with(
                'csvResults',
                $csvResults
            )
            ->with(
                'csvCount',
                count($csvResults)
            );
    }

    /**
     * CSVダウンロード
     */
    public function downloadCsv(
        Request $request
    ): StreamedResponse {
        $csvResults = session(
            'csvResults',
            []
        );

        return response()->streamDownload(
            function () use ($csvResults) {
                $handle = fopen(
                    'php://output',
                    'w'
                );

                /*
                 * UTF-8 BOM
                 */
                fwrite(
                    $handle,
                    "\xEF\xBB\xBF"
                );

                fputcsv(
                    $handle,
                    [
                        '郵便番号',
                        '日本語住所',
                        '海外向け住所',
                    ]
                );

                foreach ($csvResults as $result) {
                    fputcsv(
                        $handle,
                        [
                            $result['postal_code'] ?? '',
                            $result['japanese_address'] ?? '',
                            $result['international_address'] ?? '',
                        ]
                    );
                }

                fclose($handle);
            },
            'converted_addresses.csv',
            [
                'Content-Type' =>
                    'text/csv; charset=UTF-8',
            ]
        );
    }

    /**
     * DB住所を海外向け形式に整形
     *
     * このメソッドは郵便番号DB検索で取得した
     * PostalCode専用。
     */
    private function formatAddress(
        PostalCode $address,
        string $detail = ''
    ): void {
        /*
         * DBに保存されているromajiを使用する。
         */
        $townRomaji =
            trim(
                (string) (
                    $address->town_romaji ?? ''
                )
            );

        $cityRomaji =
            trim(
                (string) (
                    $address->city_romaji ?? ''
                )
            );

        $prefectureRomaji =
            trim(
                (string) (
                    $address->prefecture_romaji ?? ''
                )
            );

        /*
         * romajiが空の場合のみ、
         * 元の日本語を使用する。
         */
        if ($townRomaji === '') {
            $townRomaji =
                (string) $address->town;
        }

        if ($cityRomaji === '') {
            $cityRomaji =
                (string) $address->city;
        }

        if ($prefectureRomaji === '') {
            $prefectureRomaji =
                (string) $address->prefecture;
        }

        $address->international_town =
            $this->formatTown(
                $townRomaji
            );

        $address->international_city =
            $this->formatCity(
                $cityRomaji
            );

        $address->international_prefecture =
            $this->formatName(
                $prefectureRomaji
            );

        $address->formatted_postal_code =
            $address->postal_code;

        $parsedDetail =
            $this->parseAddressDetail(
                $detail
            );

        $address->international_number =
            $parsedDetail['number'];

        $address->international_building =
            $parsedDetail['building'];

        $address->international_room =
            $parsedDetail['room'];

        $address->international_address =
            $this->buildInternationalAddress(
                $address,
                $parsedDetail
            );
    }

    /**
     * 日本語住所をDBなしで変換する。
     *
     * このメソッドではPostalCode::query()などを
     * 一切呼び出さない。
     */
    private function createIndependentAddress(
        string $inputAddress,
        string $postalCode = ''
    ): ?PostalCode {
        $inputAddress =
            $this->normalizeAddressText(
                $inputAddress
            );

        if ($inputAddress === '') {
            return null;
        }

        /*
         * 先頭郵便番号を除去
         */
        $inputAddress =
            $this->removeLeadingPostalCode(
                $inputAddress
            );

        if ($inputAddress === '') {
            return null;
        }

        /*
         * 住所全体を解析
         */
        $parsed =
            $this->parseIndependentJapaneseAddress(
                $inputAddress
            );

        if (
            $parsed['prefecture'] === '' &&
            $parsed['city'] === '' &&
            $parsed['town'] === '' &&
            $parsed['detail'] === ''
        ) {
            return null;
        }

        /*
         * DB検索結果ではなく、
         * 新しいPostalCodeオブジェクトを
         * メモリ上だけで作る。
         */
        $address = new PostalCode();

        /*
         * 郵便番号は入力されている場合だけ使用。
         *
         * DBから推測しない。
         */
        $address->postal_code =
            $postalCode;

        $address->prefecture =
            $parsed['prefecture'];

        $address->city =
            $parsed['city'];

        $address->town =
            $parsed['town'];

        /*
         * 日本語検索ではDBのromajiを使用しない。
         */
        $address->prefecture_romaji =
            $this->convertIndependentPlace(
                $parsed['prefecture']
            );

        $address->city_romaji =
            $this->convertIndependentPlace(
                $parsed['city']
            );

        $address->town_romaji =
            $this->convertIndependentPlace(
                $parsed['town']
            );

        /*
         * 詳細住所を解析
         */
        $this->formatIndependentAddress(
            $address,
            $parsed['detail']
        );

        return $address;
    }

    /**
     * 日本語住所を自前で分解する。
     *
     * DBは一切参照しない。
     */
    private function parseIndependentJapaneseAddress(
        string $address
    ): array {
        $result = [
            'prefecture' => '',
            'city' => '',
            'town' => '',
            'detail' => '',
        ];

        $address =
            $this->normalizeAddressText(
                $address
            );

        if ($address === '') {
            return $result;
        }

        /*
         * 最初の数字より後ろを詳細住所とする。
         *
         * 例：
         *
         * 仙台市太白区緑ヶ丘4-30-3
         *
         * ↓
         *
         * base   = 仙台市太白区緑ヶ丘
         * detail = 4-30-3
         */
        $base = $address;

        if (
            preg_match(
                '/^(.+?)(\d.*)$/u',
                $address,
                $matches
            )
        ) {
            $base =
                trim($matches[1]);

            $result['detail'] =
                trim($matches[2]);
        }

        /*
         * スペースを区切りとして利用する。
         *
         * 例：
         *
         * 宮城県 仙台市 太白区 緑ヶ丘
         */
        $parts = preg_split(
            '/\s+/u',
            $base,
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        if (!empty($parts)) {
            /*
             * 都道府県
             */
            if (
                preg_match(
                    '/^(北海道|東京都|(?:京都|大阪)府|.{2,3}県)$/u',
                    $parts[0]
                )
            ) {
                $result['prefecture'] =
                    array_shift($parts);
            }
        }

        /*
         * 都道府県がスペースなしの場合も対応。
         *
         * 例：
         *
         * 宮城県仙台市太白区緑ヶ丘
         */
        if (
            $result['prefecture'] === '' &&
            preg_match(
                '/^(北海道|東京都|(?:京都|大阪)府|.{2,3}県)(.*)$/u',
                $base,
                $matches
            )
        ) {
            $result['prefecture'] =
                $matches[1];

            $base =
                $matches[2];

            $parts = preg_split(
                '/\s+/u',
                trim($base),
                -1,
                PREG_SPLIT_NO_EMPTY
            );
        }

        /*
         * スペース区切りがある場合。
         *
         * 例：
         *
         * 仙台市 太白区 緑ヶ丘
         */
        if (count($parts) >= 3) {
            $result['city'] =
                $parts[0] . $parts[1];

            $result['town'] =
                implode(
                    '',
                    array_slice(
                        $parts,
                        2
                    )
                );

            return $result;
        }

        /*
         * 2要素の場合。
         *
         * 例：
         *
         * 仙台市太白区 緑ヶ丘
         */
        if (count($parts) === 2) {
            $result['city'] =
                $parts[0];

            $result['town'] =
                $parts[1];

            return $result;
        }

        /*
         * スペースなしの住所を解析。
         *
         * 市 / 区 / 町 / 村などの境界を
         * 自前のルールで判断する。
         */
        $remaining =
            trim(
                implode(
                    '',
                    $parts
                )
            );

        if ($remaining === '') {
            return $result;
        }

        /*
         * 市 + 区
         *
         * 例：
         *
         * 仙台市太白区緑ヶ丘
         */
        if (
            preg_match(
                '/^(.+?市.+?区)(.+)$/u',
                $remaining,
                $matches
            )
        ) {
            $result['city'] =
                $matches[1];

            $result['town'] =
                $matches[2];

            return $result;
        }

        /*
         * 政令指定都市以外の市
         *
         * 例：
         *
         * 名取市増田
         */
        if (
            preg_match(
                '/^(.+?市)(.+)$/u',
                $remaining,
                $matches
            )
        ) {
            $result['city'] =
                $matches[1];

            $result['town'] =
                $matches[2];

            return $result;
        }

        /*
         * 区だけの場合
         *
         * 例：
         *
         * 太白区緑ヶ丘
         */
        if (
            preg_match(
                '/^(.+?区)(.+)$/u',
                $remaining,
                $matches
            )
        ) {
            $result['city'] =
                $matches[1];

            $result['town'] =
                $matches[2];

            return $result;
        }

        /*
         * 郡 + 町
         */
        if (
            preg_match(
                '/^(.+?郡.+?[町村])(.+)$/u',
                $remaining,
                $matches
            )
        ) {
            $result['city'] =
                $matches[1];

            $result['town'] =
                $matches[2];

            return $result;
        }

        /*
         * 町 / 村
         */
        if (
            preg_match(
                '/^(.+?[町村])(.+)$/u',
                $remaining,
                $matches
            )
        ) {
            $result['city'] =
                $matches[1];

            $result['town'] =
                $matches[2];

            return $result;
        }

        /*
         * 最低限のfallback。
         *
         * 市区町村が判定できない場合でも、
         * 入力文字を捨てない。
         */
        $result['town'] =
            $remaining;

        return $result;
    }

    /**
     * 日本語住所から詳細住所を取得する。
     *
     * DBは使用しない。
     */
    private function extractDetailFromInputAddress(
        string $address
    ): string {
        $address =
            $this->normalizeAddressText(
                $address
            );

        if ($address === '') {
            return '';
        }

        $address =
            $this->removeLeadingPostalCode(
                $address
            );

        if (
            preg_match(
                '/^.*?(\d.*)$/u',
                $address,
                $matches
            )
        ) {
            return trim(
                $matches[1]
            );
        }

        return '';
    }

    /**
     * DBなしで住所名をromajiへ変換。
     *
     * 漢字はJapaneseRomajiServiceで
     * 変換できないため、そのまま保持する。
     */
    private function convertIndependentPlace(
        string $value
    ): string {
        $value = trim($value);

        if ($value === '') {
            return '';
        }

        /*
         * 漢字を含む場合は無理に変換しない。
         */
        if (
            preg_match(
                '/[\x{3400}-\x{4DBF}\x{4E00}-\x{9FFF}\x{F900}-\x{FAFF}]/u',
                $value
            )
        ) {
            return $value;
        }

        return trim(
            $this->romajiService->convert(
                $value
            )
        );
    }

    /**
     * 日本語住所を海外向け形式へ整形する。
     *
     * DBは使用しない。
     */
    private function formatIndependentAddress(
        PostalCode $address,
        string $detail
    ): void {
        $address->international_town =
            $this->formatTown(
                $address->town_romaji ?? ''
            );

        $address->international_city =
            $this->formatCity(
                $address->city_romaji ?? ''
            );

        $address->international_prefecture =
            $this->formatName(
                $address->prefecture_romaji ?? ''
            );

        $address->formatted_postal_code =
            $address->postal_code;

        $parsedDetail =
            $this->parseAddressDetail(
                $detail
            );

        $address->international_number =
            $parsedDetail['number'];

        $address->international_building =
            $parsedDetail['building'];

        $address->international_room =
            $parsedDetail['room'];

        $address->international_address =
            $this->buildInternationalAddress(
                $address,
                $parsedDetail
            );
    }

    /**
     * 詳細住所を解析する。
     */
    private function parseAddressDetail(
        string $detail
    ): array {
        $result = [
            'number' => '',
            'building' => '',
            'room' => '',
        ];

        $detail =
            $this->normalizeAddressText(
                $detail
            );

        if ($detail === '') {
            return $result;
        }

        /*
         * 数字間のハイフンを統一。
         */
        $detail =
            $this->normalizeAddressHyphens(
                $detail
            );

        /*
         * ==================================================
         * ① 部屋番号
         * ==================================================
         */

        $room = '';

        /*
         * Room 201
         */
        if (
            preg_match(
                '/(?:^|\s)Room\s*([0-9A-Za-z-]+)\s*$/iu',
                $detail,
                $matches
            )
        ) {
            $room =
                $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)Room\s*[0-9A-Za-z-]+\s*$/iu',
                    '',
                    $detail
                );
        }

        /*
         * #201
         */
        elseif (
            preg_match(
                '/(?:^|\s)#\s*([0-9A-Za-z-]+)\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room =
                $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)#\s*[0-9A-Za-z-]+\s*$/u',
                    '',
                    $detail
                );
        }

        /*
         * 201号室
         */
        elseif (
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*号室\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room =
                $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)[0-9A-Za-z-]+\s*号室\s*$/u',
                    '',
                    $detail
                );
        }

        /*
         * 201号
         */
        elseif (
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*号\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room =
                $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)[0-9A-Za-z-]+\s*号\s*$/u',
                    '',
                    $detail
                );
        }

        $detail =
            trim($detail);

        /*
         * ==================================================
         * ② 建物名の後ろにスペース付きの部屋番号
         *
         * 例：
         *
         * 4-30-3 アークベース緑ヶ丘 201
         * ==================================================
         */
        if (
            $room === '' &&
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]{1,8})\s*$/u',
                $detail,
                $matches
            )
        ) {
            $candidateRoom =
                $matches[1];

            $roomPosition =
                mb_strrpos(
                    $detail,
                    $candidateRoom
                );

            if ($roomPosition !== false) {
                $beforeRoom =
                    trim(
                        mb_substr(
                            $detail,
                            0,
                            $roomPosition
                        )
                    );

                if (
                    $beforeRoom !== '' &&
                    preg_match(
                        '/\s/u',
                        $detail
                    )
                ) {
                    $room =
                        $candidateRoom;

                    $detail =
                        $beforeRoom;
                }
            }
        }

        /*
         * ==================================================
         * ③ 建物名に続いて部屋番号が直接ついている場合
         *
         * 例：
         *
         * アークベース緑ヶ丘ll201
         *
         * ↓
         *
         * building = アークベース緑ヶ丘ll
         * room     = 201
         *
         * DBは使用しない。
         * ==================================================
         */
        if (
            $room === '' &&
            preg_match(
                '/^(.+?[^\d])(\d{1,4})$/u',
                $detail,
                $matches
            )
        ) {
            $beforeRoom =
                trim($matches[1]);

            $candidateRoom =
                $matches[2];

            /*
             * 建物名側に日本語または英字がある場合だけ
             * 部屋番号として扱う。
             */
            if (
                $beforeRoom !== '' &&
                preg_match(
                    '/[^\d]/u',
                    $beforeRoom
                )
            ) {
                $room =
                    $candidateRoom;

                $detail =
                    $beforeRoom;
            }
        }

        /*
         * ==================================================
         * ④ 番地
         * ==================================================
         */

        $number = '';

        /*
         * 4丁目30番3号
         */
        if (
            preg_match(
                '/^(\d+)\s*丁目\s*(\d+)\s*番地?\s*(\d+)\s*号?/u',
                $detail,
                $matches
            )
        ) {
            $number =
                $matches[1] .
                '-' .
                $matches[2] .
                '-' .
                $matches[3];

            $detail =
                mb_substr(
                    $detail,
                    mb_strlen(
                        $matches[0]
                    )
                );
        }

        /*
         * 4丁目30番地3号
         */
        elseif (
            preg_match(
                '/^(\d+)\s*丁目\s*(\d+)\s*番地?\s*-?\s*(\d+)\s*号?/u',
                $detail,
                $matches
            )
        ) {
            $number =
                $matches[1] .
                '-' .
                $matches[2] .
                '-' .
                $matches[3];

            $detail =
                mb_substr(
                    $detail,
                    mb_strlen(
                        $matches[0]
                    )
                );
        }

        /*
         * 4-30-3
         * 4 - 30 - 3
         * 4-30
         */
        elseif (
            preg_match(
                '/^(\d+(?:\s*-\s*\d+){1,3})(?:\s*号)?/u',
                $detail,
                $matches
            )
        ) {
            $number =
                preg_replace(
                    '/\s+/u',
                    '',
                    $matches[1]
                );

            $detail =
                mb_substr(
                    $detail,
                    mb_strlen(
                        $matches[0]
                    )
                );
        }

        /*
         * 4番地3号
         */
        elseif (
            preg_match(
                '/^(\d+)\s*番地?\s*(\d+)\s*号?/u',
                $detail,
                $matches
            )
        ) {
            $number =
                $matches[1] .
                '-' .
                $matches[2];

            $detail =
                mb_substr(
                    $detail,
                    mb_strlen(
                        $matches[0]
                    )
                );
        }

        /*
         * 4丁目
         * 4番地
         * 4番
         * 4号
         */
        elseif (
            preg_match(
                '/^(\d+)\s*(?:丁目|番地?|番|号)/u',
                $detail,
                $matches
            )
        ) {
            $number =
                $matches[1];

            $detail =
                mb_substr(
                    $detail,
                    mb_strlen(
                        $matches[0]
                    )
                );
        }

        if ($number !== '') {
            $result['number'] =
                $number;
        }

        /*
         * ==================================================
         * ⑤ 残りを建物名
         * ==================================================
         */
        $building =
            trim($detail);

        if ($building !== '') {
            $result['building'] =
                trim(
                    $this->romajiService->convert(
                        $building
                    )
                );
        }

        /*
         * ==================================================
         * ⑥ 部屋番号
         * ==================================================
         */
        if ($room !== '') {
            $result['room'] =
                trim($room);
        }

        return $result;
    }

    /**
     * 海外向け住所を作成する。
     */
    private function buildInternationalAddress(
        PostalCode $address,
        array $detail
    ): string {
        $parts = [];

        $town =
            (string) (
                $address->international_town ?? ''
            );

        $city =
            (string) (
                $address->international_city ?? ''
            );

        $prefecture =
            (string) (
                $address->international_prefecture ?? ''
            );

        /*
         * 町域 + 番地
         */
        $townPart =
            $town;

        if (
            !empty(
                $detail['number']
            )
        ) {
            if ($townPart !== '') {
                $townPart .= ' ';
            }

            $townPart .=
                $detail['number'];
        }

        if ($townPart !== '') {
            $parts[] =
                $townPart;
        }

        /*
         * 建物名
         */
        if (
            !empty(
                $detail['building']
            )
        ) {
            $parts[] =
                $detail['building'];
        }

        /*
         * 部屋番号
         */
        if (
            !empty(
                $detail['room']
            )
        ) {
            $parts[] =
                'Room ' .
                $detail['room'];
        }

        /*
         * 市区町村
         */
        if ($city !== '') {
            $parts[] =
                $city;
        }

        /*
         * 都道府県
         */
        if ($prefecture !== '') {
            $parts[] =
                $prefecture;
        }

        /*
         * 郵便番号
         */
        if (
            !empty(
                $address->postal_code
            )
        ) {
            $parts[] =
                $address->postal_code;
        }

        /*
         * 国
         */
        $parts[] =
            'Japan';

        return implode(
            ', ',
            array_filter(
                $parts,
                fn ($part) =>
                    trim($part) !== ''
            )
        );
    }

    /**
     * 入力住所を全角・半角を含めて正規化する。
     */
    private function normalizeAddressText(
        string $text
    ): string {
        $text =
            trim($text);

        if ($text === '') {
            return '';
        }

        /*
         * 全角英数字 → 半角
         * 半角カタカナ → 全角カタカナ
         */
        $text =
            mb_convert_kana(
                $text,
                'asKV',
                'UTF-8'
            );

        /*
         * 全角スペース → 半角スペース
         */
        $text =
            str_replace(
                '　',
                ' ',
                $text
            );

        /*
         * 改行・タブなど
         */
        $text =
            preg_replace(
                '/[\r\n\t]+/u',
                ' ',
                $text
            );

        /*
         * 連続空白を1つへ
         */
        $text =
            preg_replace(
                '/\s+/u',
                ' ',
                $text
            );

        /*
         * 全角記号
         */
        $text =
            str_replace(
                [
                    '＃',
                    '：',
                    '，',
                    '．',
                    '／',
                    '（',
                    '）',
                ],
                [
                    '#',
                    ':',
                    ',',
                    '.',
                    '/',
                    '(',
                    ')',
                ],
                $text
            );

        return trim($text);
    }

    /**
     * 住所先頭に入力された郵便番号を除去する。
     */
    private function removeLeadingPostalCode(
        string $address
    ): string {
        $address =
            $this->normalizeAddressText(
                $address
            );

        if ($address === '') {
            return '';
        }

        $address =
            preg_replace(
                '/^〒?\s*\d{3}\s*[-ー－−–—]?\s*\d{4}\s*/u',
                '',
                $address
            );

        return trim($address);
    }

    /**
     * 住所番号に使用されるハイフン類を統一。
     */
    private function normalizeAddressHyphens(
        string $text
    ): string {
        /*
         * 数字の間にあるハイフン類を統一。
         */
        $text =
            preg_replace(
                '/(?<=\d)[ー－−–—﹣](?=\d)/u',
                '-',
                $text
            );

        /*
         * その他の明確なハイフン記号
         */
        return str_replace(
            [
                '－',
                '−',
                '–',
                '—',
                '﹣',
            ],
            '-',
            $text
        );
    }

    /**
     * 郵便番号を正規化する。
     */
    private function normalizePostalCode(
        string $postalCode
    ): string {
        $postalCode =
            trim($postalCode);

        if ($postalCode === '') {
            return '';
        }

        /*
         * 全角英数字を半角へ
         */
        $postalCode =
            mb_convert_kana(
                $postalCode,
                'as',
                'UTF-8'
            );

        /*
         * 郵便記号を除去
         */
        $postalCode =
            str_replace(
                '〒',
                '',
                $postalCode
            );

        /*
         * 各種ハイフンと空白を除去
         */
        $postalCode =
            str_replace(
                [
                    '-',
                    'ー',
                    '－',
                    '−',
                    '–',
                    '—',
                    ' ',
                    '　',
                ],
                '',
                $postalCode
            );

        return trim(
            $postalCode
        );
    }

    /**
     * 名前を整形
     */
    private function formatName(
        string $name
    ): string {
        return ucwords(
            strtolower(
                trim($name)
            )
        );
    }

    /**
     * 市区町村名を整形
     */
    private function formatCity(
        string $city
    ): string {
        $city =
            $this->formatName(
                $city
            );

        $city =
            preg_replace(
                '/\sShi$/i',
                '-shi',
                $city
            );

        $city =
            preg_replace(
                '/\sKu$/i',
                '-ku',
                $city
            );

        $city =
            preg_replace(
                '/\sGun$/i',
                '-gun',
                $city
            );

        $city =
            preg_replace(
                '/\sCho$/i',
                '-cho',
                $city
            );

        $city =
            preg_replace(
                '/\sMura$/i',
                '-mura',
                $city
            );

        return $city;
    }

    /**
     * 町域名を整形
     */
    private function formatTown(
        string $town
    ): string {
        return $this->formatName(
            $town
        );
    }
}