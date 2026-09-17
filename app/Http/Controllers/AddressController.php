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

    public function __construct(JapaneseRomajiService $romajiService)
    {
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
     */
    public function search(Request $request)
    {
        $postalCode = preg_replace(
            '/[-ー－\s]/u',
            '',
            trim($request->input('postal_code', ''))
        );

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
     */
    public function searchAddress(Request $request)
    {
        $inputAddress = trim($request->input('address', ''));

        // 入力が空の場合は従来通り空結果
        if ($inputAddress === '') {
            return redirect('/')
                ->with('addresses', [])
                ->with('inputAddress', '')
                ->with('searchType', 'address');
        }

        // 検索用：全角・半角スペースを除去
        $normalizedAddress = preg_replace(
            '/[\s　]+/u',
            '',
            $inputAddress
        );

        /**
         * ① 住所全体でDB検索
         *
         * DB側の都道府県・市区町村・町域に含まれる
         * 半角・全角スペースも無視して検索する。
         */
        $addresses = $this->findAddressesByFullAddress(
            $normalizedAddress
        );

        /**
         * ② 詳細住所が付いている場合、
         *    番地より前の住所で再検索
         */
        if ($addresses->isEmpty()) {
            $baseAddress = $this->extractSearchBase(
                $normalizedAddress
            );

            if (
                $baseAddress !== '' &&
                $baseAddress !== $normalizedAddress
            ) {
                $addresses = $this->findAddressesByFullAddress(
                    $baseAddress
                );
            }
        }

        /**
         * ③ 町域だけでも検索
         *
         * 従来の検索方法を維持。
         */
        if ($addresses->isEmpty()) {
            $baseAddress = $this->extractSearchBase(
                $normalizedAddress
            );

            if ($baseAddress !== '') {
                $addresses = PostalCode::whereRaw(
                    "REPLACE(REPLACE(town, ' ', ''), '　', '') LIKE ?",
                    ['%' . $baseAddress . '%']
                )->get();
            }
        }

        /**
         * ④ DBに見つかった場合
         *
         * 従来通り、DB住所より後ろを詳細住所として解析する。
         */
        if ($addresses->isNotEmpty()) {
            foreach ($addresses as $address) {
                $detail = $this->extractDetailFromMatchedAddress(
                    $inputAddress,
                    $address
                );

                $this->formatAddress(
                    $address,
                    $detail
                );
            }
        } else {
            /**
             * ⑤ DBに住所がない場合
             *
             * DBがないことを「変換失敗」としない。
             *
             * 例：
             * 仙台市太白区緑ヶ丘4-30-3 アークベース緑ヶ丘 ll 201
             *
             * ↓
             * base:
             * 仙台市太白区緑ヶ丘
             *
             * detail:
             * 4-30-3 アークベース緑ヶ丘 ll 201
             *
             * 番地・建物名・部屋番号は自前で解析する。
             *
             * この場合、DBから取得できない郵便番号は
             * 勝手に補完しない。
             */
            $fallbackAddress = $this->createFallbackAddress(
                $inputAddress
            );

            if ($fallbackAddress !== null) {
                $addresses = collect([
                    $fallbackAddress
                ]);
            }
        }

        return redirect('/')
            ->with('addresses', $addresses)
            ->with('inputAddress', $inputAddress)
            ->with('searchType', 'address');
    }

    /**
     * CSV / TXT 一括変換
     */
    public function convertCsv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt|max:131072',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->with(
                    'csv_error',
                    $validator->errors()->first('csv_file')
                );
        }

        $file = $request->file('csv_file');

        if (!$file || !$file->isValid()) {
            return redirect('/')
                ->with(
                    'csv_error',
                    'ファイルのアップロードに失敗しました。'
                );
        }

        $path = $file->getRealPath();

        if (!$path) {
            return redirect('/')
                ->with(
                    'csv_error',
                    'ファイルを読み込めませんでした。'
                );
        }

        $handle = fopen($path, 'r');

        if ($handle === false) {
            return redirect('/')
                ->with(
                    'csv_error',
                    'ファイルを開けませんでした。'
                );
        }

        $rows = [];
        $lineNumber = 0;

        while (($row = fgetcsv($handle)) !== false) {
            $lineNumber++;

            // 空行をスキップ
            if (
                count($row) === 1 &&
                trim((string) $row[0]) === ''
            ) {
                continue;
            }

            // 2列未満の場合
            if (count($row) < 2) {
                fclose($handle);

                return redirect('/')
                    ->with(
                        'csv_error',
                        "{$lineNumber}行目の形式が正しくありません。"
                    );
            }

            // UTF-8 BOM除去
            if ($lineNumber === 1) {
                $row[0] = preg_replace(
                    '/^\xEF\xBB\xBF/',
                    '',
                    (string) $row[0]
                );
            }

            $postalCode = trim((string) $row[0]);
            $japaneseAddress = trim((string) $row[1]);

            // ヘッダーをスキップ
            $headerPostal = mb_strtolower($postalCode);

            if (
                $postalCode === '郵便番号' ||
                $headerPostal === 'postal_code' ||
                $headerPostal === 'postcode' ||
                $headerPostal === 'postal code'
            ) {
                continue;
            }

            if (
                $postalCode === '' &&
                $japaneseAddress === ''
            ) {
                continue;
            }

            $rows[] = [
                'postal_code' => $postalCode,
                'japanese_address' => $japaneseAddress,
            ];

            // 最大100件
            if (count($rows) > 100) {
                fclose($handle);

                return redirect('/')
                    ->with(
                        'csv_error',
                        '一度に変換できる件数は100件までです。'
                    );
            }
        }

        fclose($handle);

        $csvResults = [];

        foreach ($rows as $row) {
            $postalCode = preg_replace(
                '/[-ー－\s]/u',
                '',
                $row['postal_code']
            );

            $japaneseAddress = $row['japanese_address'];

            $postalAddress = null;

            /**
             * ① 郵便番号で検索
             */
            if ($postalCode !== '') {
                $postalAddress = PostalCode::where(
                    'postal_code',
                    $postalCode
                )->first();
            }

            /**
             * ② 郵便番号で見つからなかった場合、
             *    日本語住所から検索
             */
            if (
                !$postalAddress &&
                $japaneseAddress !== ''
            ) {
                $normalizedAddress = preg_replace(
                    '/[\s　]+/u',
                    '',
                    $japaneseAddress
                );

                $postalAddress = $this->findFirstAddressByFullAddress(
                    $normalizedAddress
                );

                /**
                 * 詳細住所が含まれている場合、
                 * 番地より前の住所を使って再検索。
                 */
                if (!$postalAddress) {
                    $baseAddress = $this->extractSearchBase(
                        $normalizedAddress
                    );

                    if (
                        $baseAddress !== '' &&
                        $baseAddress !== $normalizedAddress
                    ) {
                        $postalAddress = $this->findFirstAddressByFullAddress(
                            $baseAddress
                        );
                    }
                }

                /**
                 * 町域だけで検索
                 */
                if (!$postalAddress) {
                    $baseAddress = $this->extractSearchBase(
                        $normalizedAddress
                    );

                    if ($baseAddress !== '') {
                        $postalAddress = PostalCode::whereRaw(
                            "REPLACE(REPLACE(town, ' ', ''), '　', '') LIKE ?",
                            ['%' . $baseAddress . '%']
                        )->first();
                    }
                }
            }

            /**
             * ③ DBに見つかった場合
             *
             * 今まで通りDB住所より後ろを
             * 番地・建物名・部屋番号として解析する。
             */
            if ($postalAddress) {
                $detail = $this->extractDetailFromMatchedAddress(
                    $japaneseAddress,
                    $postalAddress
                );

                $this->formatAddress(
                    $postalAddress,
                    $detail
                );

                $csvResults[] = [
                    'postal_code' => $row['postal_code'],
                    'japanese_address' => $japaneseAddress,
                    'international_address' =>
                        $postalAddress->international_address,
                ];

                continue;
            }

            /**
             * ④ DBに見つからない場合
             *
             * 「変換できませんでした」にはしない。
             *
             * 入力住所から番地・建物名・部屋番号を
             * 自前で解析する。
             *
             * 郵便番号DBにない場合は、
             * 郵便番号を勝手に推測しない。
             */
            if ($japaneseAddress !== '') {
                $fallbackAddress = $this->createFallbackAddress(
                    $japaneseAddress,
                    $postalCode
                );

                if ($fallbackAddress !== null) {
                    $csvResults[] = [
                        'postal_code' => $row['postal_code'],
                        'japanese_address' => $japaneseAddress,
                        'international_address' =>
                            $fallbackAddress->international_address,
                    ];

                    continue;
                }
            }

            /**
             * 住所自体が空など、
             * 本当に解析できない場合のみエラー表示。
             */
            $csvResults[] = [
                'postal_code' => $row['postal_code'],
                'japanese_address' => $japaneseAddress,
                'international_address' => '変換できませんでした',
            ];
        }

        return redirect('/')
            ->with('csvResults', $csvResults)
            ->with('csvCount', count($csvResults));
    }

    /**
     * CSVダウンロード
     */
    public function downloadCsv(Request $request): StreamedResponse
    {
        $csvResults = session('csvResults', []);

        return response()->streamDownload(
            function () use ($csvResults) {
                $handle = fopen('php://output', 'w');

                // UTF-8 BOM
                fwrite($handle, "\xEF\xBB\xBF");

                fputcsv($handle, [
                    '郵便番号',
                    '日本語住所',
                    '海外向け住所',
                ]);

                foreach ($csvResults as $result) {
                    fputcsv($handle, [
                        $result['postal_code'] ?? '',
                        $result['japanese_address'] ?? '',
                        $result['international_address'] ?? '',
                    ]);
                }

                fclose($handle);
            },
            'converted_addresses.csv',
            [
                'Content-Type' => 'text/csv; charset=UTF-8',
            ]
        );
    }

    /**
     * DB住所を使って海外向け形式に整形
     */
    private function formatAddress(
        PostalCode $address,
        string $detail = ''
    ): void {
        $address->international_town = $this->formatTown(
            $this->romajiService->convert($address->town)
        );

        $address->international_city = $this->formatCity(
            $this->romajiService->convert($address->city)
        );

        $address->international_prefecture = $this->formatName(
            $this->romajiService->convert($address->prefecture)
        );

        $address->formatted_postal_code =
            $address->postal_code;

        $parsedDetail = $this->parseAddressDetail($detail);

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
     * DBに住所がない場合のフォールバック変換
     *
     * 例：
     * 仙台市太白区緑ヶ丘4-30-3 アークベース緑ヶ丘 ll 201
     *
     * ↓
     * base   = 仙台市太白区緑ヶ丘
     * detail = 4-30-3 アークベース緑ヶ丘 ll 201
     *
     * DBにない郵便番号は推測しない。
     */
    private function createFallbackAddress(
        string $inputAddress,
        string $postalCode = ''
    ): ?PostalCode {
        $inputAddress = trim($inputAddress);

        if ($inputAddress === '') {
            return null;
        }

        $normalizedAddress = $this->normalizeSpaces(
            $inputAddress
        );

        /**
         * 最初の数字より前を住所のベースとして扱う。
         */
        $baseAddress = $this->extractSearchBase(
            preg_replace(
                '/[\s　]+/u',
                '',
                $normalizedAddress
            )
        );

        if ($baseAddress === '') {
            return null;
        }

        /**
         * ベース住所の後ろを詳細住所として取得。
         */
        $detail = $this->removeAddressPrefixIgnoringSpaces(
            $normalizedAddress,
            $baseAddress
        );

        /**
         * もしベース住所を正常に切り出せなかった場合、
         * 最初の数字から詳細住所を重新取得。
         */
        if ($detail === '') {
            $detail = $this->extractDetailFromSearchBase(
                $normalizedAddress
            );
        }

        /**
         * DBに存在しないため、
         * 都道府県・市区町村・町域を無理に推測しない。
         *
         * baseAddressは町域相当として保持する。
         */
        $address = new PostalCode();

        $address->postal_code = $postalCode;
        $address->prefecture = '';
        $address->city = '';
        $address->town = $baseAddress;

        $this->formatAddress(
            $address,
            $detail
        );

        return $address;
    }

    /**
     * 詳細住所を取得するためのフォールバック処理
     */
    private function extractDetailFromSearchBase(
        string $address
    ): string {
        $address = $this->normalizeSpaces($address);

        if ($address === '') {
            return '';
        }

        if (preg_match(
            '/^\D*?(\d.*)$/u',
            $address,
            $matches
        )) {
            return trim($matches[1]);
        }

        return '';
    }

    /**
     * DB住所に含まれる
     * 都道府県＋市区町村＋町域以降の詳細住所を取得する。
     *
     * 例：
     * 宮城県仙台市青葉区一番町4-30-3 グリーンハイツ 201
     *
     * ↓
     * 4-30-3 グリーンハイツ 201
     */
    private function extractDetailFromMatchedAddress(
        string $inputAddress,
        PostalCode $address
    ): string {
        if (trim($inputAddress) === '') {
            return '';
        }

        $input = $this->normalizeSpaces(
            $inputAddress
        );

        $base = $address->prefecture
            . $address->city
            . $address->town;

        $base = $this->normalizeSpaces($base);

        /**
         * DBのcityなどに入っているスペースを無視して
         * 入力住所からDB住所部分を削除する。
         */
        $detail = $this->removeAddressPrefixIgnoringSpaces(
            $input,
            $base
        );

        return trim($detail);
    }

    /**
     * 入力住所から検索用のベース住所を取得する。
     *
     * 例：
     * 仙台市青葉区一番町4-30-3 グリーンハイツ 201
     *
     * ↓
     * 仙台市青葉区一番町
     */
    private function extractSearchBase(string $address): string
    {
        $address = trim($address);

        if ($address === '') {
            return '';
        }

        /**
         * 最初の数字から後ろを詳細住所として扱う。
         *
         * 住所全体検索を先に行っているため、
         * 町域名そのものに数字が含まれるケースについては
         * 従来検索を優先する。
         */
        if (preg_match(
            '/^(.*?)(\d.*)$/u',
            $address,
            $matches
        )) {
            $base = trim($matches[1]);

            if ($base !== '') {
                return $base;
            }
        }

        return $address;
    }

    /**
     * スペースを保持したまま、
     * 住所の先頭にあるDB住所を削除する。
     */
    private function removeAddressPrefixIgnoringSpaces(
        string $input,
        string $base
    ): string {
        $input = $this->normalizeSpaces($input);
        $base = $this->normalizeSpaces($base);

        if (
            $input === '' ||
            $base === ''
        ) {
            return '';
        }

        $inputLength = mb_strlen($input);
        $baseLength = mb_strlen($base);

        $inputIndex = 0;
        $baseIndex = 0;

        while (
            $inputIndex < $inputLength &&
            $baseIndex < $baseLength
        ) {
            $inputChar = mb_substr(
                $input,
                $inputIndex,
                1
            );

            if (preg_match('/\s/u', $inputChar)) {
                $inputIndex++;
                continue;
            }

            $baseChar = mb_substr(
                $base,
                $baseIndex,
                1
            );

            if ($inputChar !== $baseChar) {
                return '';
            }

            $inputIndex++;
            $baseIndex++;
        }

        if ($baseIndex < $baseLength) {
            return '';
        }

        while ($inputIndex < $inputLength) {
            $char = mb_substr(
                $input,
                $inputIndex,
                1
            );

            if (!preg_match('/\s/u', $char)) {
                break;
            }

            $inputIndex++;
        }

        return trim(
            mb_substr(
                $input,
                $inputIndex
            )
        );
    }

    /**
     * 詳細住所を解析する。
     *
     * 例：
     * 4-30-3 グリーンハイツ 201
     *
     * number   = 4-30-3
     * building = Guriinhaitsu
     * room     = 201
     */
    private function parseAddressDetail(
        string $detail
    ): array {
        $result = [
            'number' => '',
            'building' => '',
            'room' => '',
        ];

        $detail = $this->normalizeSpaces($detail);

        if ($detail === '') {
            return $result;
        }

        /**
         * 全角英数字・記号を半角に統一。
         */
        $detail = mb_convert_kana(
            $detail,
            'as',
            'UTF-8'
        );

        /**
         * ハイフン類を統一。
         */
        $detail = str_replace(
            [
                '−',
                'ー',
                '－',
                '–',
                '—',
            ],
            '-',
            $detail
        );

        /**
         * ① 「201号室」「201号」「Room 201」などを先に取得
         */
        $room = '';

        if (preg_match(
            '/(?:^|\s)Room\s*([0-9A-Za-z-]+)\s*$/iu',
            $detail,
            $matches
        )) {
            $room = $matches[1];

            $detail = preg_replace(
                '/(?:^|\s)Room\s*[0-9A-Za-z-]+\s*$/iu',
                '',
                $detail
            );
        } elseif (preg_match(
            '/(?:^|\s)#\s*([0-9A-Za-z-]+)\s*$/u',
            $detail,
            $matches
        )) {
            $room = $matches[1];

            $detail = preg_replace(
                '/(?:^|\s)#\s*[0-9A-Za-z-]+\s*$/u',
                '',
                $detail
            );
        } elseif (preg_match(
            '/(?:^|\s)([0-9A-Za-z-]+)\s*号室\s*$/u',
            $detail,
            $matches
        )) {
            $room = $matches[1];

            $detail = preg_replace(
                '/(?:^|\s)[0-9A-Za-z-]+\s*号室\s*$/u',
                '',
                $detail
            );
        } elseif (preg_match(
            '/(?:^|\s)([0-9A-Za-z-]+)\s*号\s*$/u',
            $detail,
            $matches
        )) {
            $room = $matches[1];

            $detail = preg_replace(
                '/(?:^|\s)[0-9A-Za-z-]+\s*号\s*$/u',
                '',
                $detail
            );
        }

        $detail = trim($detail);

        /**
         * ② 建物名の後ろに単純な部屋番号がある場合
         *
         * 例：
         * 4-30-3 グリーンハイツ 201
         *
         * → 201を部屋番号として扱う。
         */
        if (
            $room === '' &&
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*$/u',
                $detail,
                $matches
            )
        ) {
            $candidateRoom = $matches[1];

            /**
             * 住所番号そのものを部屋番号として取らないよう、
             * その前に空白が存在する場合のみ部屋番号とする。
             */
            $roomPosition = mb_strrpos(
                $detail,
                $candidateRoom
            );

            if ($roomPosition !== false) {
                $beforeRoom = trim(
                    mb_substr(
                        $detail,
                        0,
                        $roomPosition
                    )
                );

                if (
                    $beforeRoom !== '' &&
                    preg_match('/\s/u', $detail)
                ) {
                    $room = $candidateRoom;
                    $detail = $beforeRoom;
                }
            }
        }

        /**
         * ③ 番地部分を取得
         *
         * 4-30-3
         * 4丁目30番3号
         * 4丁目30番地3号
         * 4丁目30-3
         *
         * を 4-30-3 に統一。
         */
        $number = '';

        if (preg_match(
            '/^(\d+)丁目(\d+)(?:番地?|番)(\d+)(?:号)?/u',
            $detail,
            $matches
        )) {
            $number = $matches[1]
                . '-'
                . $matches[2]
                . '-'
                . $matches[3];

            $detail = mb_substr(
                $detail,
                mb_strlen($matches[0])
            );
        } elseif (preg_match(
            '/^(\d+)丁目(\d+)(?:番地?|番)?-?(\d+)(?:号)?/u',
            $detail,
            $matches
        )) {
            $number = $matches[1]
                . '-'
                . $matches[2]
                . '-'
                . $matches[3];

            $detail = mb_substr(
                $detail,
                mb_strlen($matches[0])
            );
        } elseif (preg_match(
            '/^(\d+(?:-\d+){1,3})(?:号)?/u',
            $detail,
            $matches
        )) {
            $number = $matches[1];

            $detail = mb_substr(
                $detail,
                mb_strlen($matches[0])
            );
        } elseif (preg_match(
            '/^(\d+)(?:丁目|番地?|番|号)/u',
            $detail,
            $matches
        )) {
            $number = $matches[1];

            $detail = mb_substr(
                $detail,
                mb_strlen($matches[0])
            );
        }

        /**
         * 番地部分を取れた場合のみ保存。
         */
        if ($number !== '') {
            $result['number'] = $number;
        }

        /**
         * ④ 残りを建物名として扱う。
         */
        $building = trim($detail);

        if ($building !== '') {
            $result['building'] = trim(
                $this->romajiService->convert(
                    $building
                )
            );
        }

        /**
         * ⑤ 部屋番号
         */
        if ($room !== '') {
            $result['room'] = trim($room);
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

        $town = $this->formatTown(
            $this->romajiService->convert(
                $address->town
            )
        );

        $city = $this->formatCity(
            $this->romajiService->convert(
                $address->city
            )
        );

        $prefecture = $this->formatName(
            $this->romajiService->convert(
                $address->prefecture
            )
        );

        /**
         * 町域 + 番地
         */
        $townPart = $town;

        if (!empty($detail['number'])) {
            $townPart .= ' ' . $detail['number'];
        }

        if ($townPart !== '') {
            $parts[] = $townPart;
        }

        /**
         * 建物名
         */
        if (!empty($detail['building'])) {
            $parts[] = $detail['building'];
        }

        /**
         * 部屋番号
         */
        if (!empty($detail['room'])) {
            $parts[] = 'Room ' . $detail['room'];
        }

        /**
         * 市区町村
         */
        if ($city !== '') {
            $parts[] = $city;
        }

        /**
         * 都道府県
         */
        if ($prefecture !== '') {
            $parts[] = $prefecture;
        }

        /**
         * 郵便番号
         */
        if (!empty($address->postal_code)) {
            $parts[] = $address->postal_code;
        }

        /**
         * 国名
         */
        $parts[] = 'Japan';

        return implode(
            ', ',
            array_filter(
                $parts,
                fn ($part) => trim($part) !== ''
            )
        );
    }

    /**
     * 住所全体からDBを検索する。
     *
     * DB側の半角・全角スペースを無視する。
     */
    private function findAddressesByFullAddress(
        string $normalizedAddress
    ) {
        return PostalCode::whereRaw(
            "REPLACE(REPLACE(prefecture, ' ', ''), '　', '') ||
             REPLACE(REPLACE(city, ' ', ''), '　', '') ||
             REPLACE(REPLACE(town, ' ', ''), '　', '')
             LIKE ?",
            ['%' . $normalizedAddress . '%']
        )->get();
    }

    /**
     * 住所全体からDBを1件取得する。
     */
    private function findFirstAddressByFullAddress(
        string $normalizedAddress
    ): ?PostalCode {
        return PostalCode::whereRaw(
            "REPLACE(REPLACE(prefecture, ' ', ''), '　', '') ||
             REPLACE(REPLACE(city, ' ', ''), '　', '') ||
             REPLACE(REPLACE(town, ' ', ''), '　', '')
             LIKE ?",
            ['%' . $normalizedAddress . '%']
        )->first();
    }

    /**
     * スペースを正規化
     */
    private function normalizeSpaces(string $text): string
    {
        $text = str_replace(
            ['　'],
            [' '],
            trim($text)
        );

        return preg_replace(
            '/\s+/u',
            ' ',
            $text
        );
    }

    /**
     * 名前を整形
     */
    private function formatName(string $name): string
    {
        return ucwords(
            strtolower(
                trim($name)
            )
        );
    }

    /**
     * 市区町村名を整形
     */
    private function formatCity(string $city): string
    {
        $city = $this->formatName($city);

        $city = preg_replace(
            '/\sShi$/i',
            '-shi',
            $city
        );

        $city = preg_replace(
            '/\sKu$/i',
            '-ku',
            $city
        );

        $city = preg_replace(
            '/\sGun$/i',
            '-gun',
            $city
        );

        $city = preg_replace(
            '/\sCho$/i',
            '-cho',
            $city
        );

        $city = preg_replace(
            '/\sMura$/i',
            '-mura',
            $city
        );

        return $city;
    }

    /**
     * 町域名を整形
     */
    private function formatTown(string $town): string
    {
        return $this->formatName($town);
    }
}