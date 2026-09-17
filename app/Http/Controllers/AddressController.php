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
     */
    public function search(Request $request)
    {
        $postalCode = $this->normalizePostalCode(
            (string) $request->input('postal_code', '')
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
        $inputAddress = trim(
            (string) $request->input('address', '')
        );

        if ($inputAddress === '') {
            return redirect('/')
                ->with('addresses', [])
                ->with('inputAddress', '')
                ->with('searchType', 'address');
        }

        /**
         * 表示用の元入力はそのまま保持する。
         *
         * 検索・解析には正規化した住所を使用する。
         */
        $normalizedAddress = $this->normalizeAddressText(
            $inputAddress
        );

        /**
         * 住所の先頭に郵便番号が入力されていた場合は除去する。
         *
         * 例：
         * 〒980-0811 仙台市青葉区一番町4-30-3
         *
         * ↓
         *
         * 仙台市青葉区一番町4-30-3
         */
        $normalizedAddress = $this->removeLeadingPostalCode(
            $normalizedAddress
        );

        /**
         * 検索用住所。
         *
         * 空白をすべて除去する。
         */
        $searchAddress = $this->normalizeAddressForSearch(
            $normalizedAddress
        );

        /**
         * ① 住所全体でDB検索
         */
        $addresses = $this->findAddressesByFullAddress(
            $searchAddress
        );

        /**
         * ② 詳細住所を除いたベース住所でDB検索
         *
         * 例：
         *
         * 仙台市青葉区一番町4-30-3
         *
         * ↓
         *
         * 仙台市青葉区一番町
         */
        if ($addresses->isEmpty()) {
            $baseAddress = $this->extractSearchBase(
                $searchAddress
            );

            if (
                $baseAddress !== '' &&
                $baseAddress !== $searchAddress
            ) {
                $addresses = $this->findAddressesByFullAddress(
                    $baseAddress
                );
            }
        }

        /**
         * ③ DBに見つかった場合
         */
        if ($addresses->isNotEmpty()) {
            foreach ($addresses as $address) {
                $detail = $this->extractDetailFromMatchedAddress(
                    $normalizedAddress,
                    $address
                );

                $this->formatAddress(
                    $address,
                    $detail
                );
            }
        } else {
            /**
             * ④ DBに住所がない場合
             *
             * DBにないことを「変換失敗」としない。
             */
            $fallbackAddress = $this->createFallbackAddress(
                $normalizedAddress
            );

            if ($fallbackAddress !== null) {
                $addresses = collect([
                    $fallbackAddress
                ]);
            } else {
                $addresses = collect();
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

            /**
             * 空行をスキップ
             */
            if (
                count($row) === 1 &&
                trim((string) $row[0]) === ''
            ) {
                continue;
            }

            /**
             * 2列未満の場合
             */
            if (count($row) < 2) {
                fclose($handle);

                return redirect('/')
                    ->with(
                        'csv_error',
                        "{$lineNumber}行目の形式が正しくありません。"
                    );
            }

            /**
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

            /**
             * ヘッダーをスキップ
             */
            $headerPostal = mb_strtolower(
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

            /**
             * 最大100件
             */
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
            /**
             * 郵便番号を全角・半角を含めて正規化
             */
            $postalCode = $this->normalizePostalCode(
                $row['postal_code']
            );

            /**
             * 住所を正規化
             */
            $japaneseAddress = trim(
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
             * 日本語住所から検索
             */
            if (
                !$postalAddress &&
                $normalizedAddress !== ''
            ) {
                $searchAddress =
                    $this->normalizeAddressForSearch(
                        $normalizedAddress
                    );

                /**
                 * 住所全体
                 */
                $postalAddress =
                    $this->findFirstAddressByFullAddress(
                        $searchAddress
                    );

                /**
                 * 詳細住所を除いたベース住所
                 */
                if (!$postalAddress) {
                    $baseAddress =
                        $this->extractSearchBase(
                            $searchAddress
                        );

                    if (
                        $baseAddress !== '' &&
                        $baseAddress !== $searchAddress
                    ) {
                        $postalAddress =
                            $this->findFirstAddressByFullAddress(
                                $baseAddress
                            );
                    }
                }
            }

            /**
             * ③ DBに見つかった場合
             */
            if ($postalAddress) {
                $detail =
                    $this->extractDetailFromMatchedAddress(
                        $normalizedAddress,
                        $postalAddress
                    );

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
                        $postalAddress->international_address,
                ];

                continue;
            }

            /**
             * ④ DBに見つからない場合
             *
             * 入力住所から自前で解析する。
             */
            if ($normalizedAddress !== '') {
                $fallbackAddress =
                    $this->createFallbackAddress(
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
                            $fallbackAddress->international_address,
                    ];

                    continue;
                }
            }

            /**
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
            ->with('csvResults', $csvResults)
            ->with('csvCount', count($csvResults));
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

                /**
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
     * DB住所を使って海外向け形式に整形
     */
    private function formatAddress(
        PostalCode $address,
        string $detail = ''
    ): void {
        /**
         * DBにromajiがある場合は、
         * JapaneseRomajiServiceで漢字を無理に変換しない。
         */
        $townRomaji =
            $this->resolvePlaceRomaji(
                (string) $address->town,
                (string) ($address->town_romaji ?? '')
            );

        $cityRomaji =
            $this->resolvePlaceRomaji(
                (string) $address->city,
                (string) ($address->city_romaji ?? '')
            );

        $prefectureRomaji =
            $this->resolvePlaceRomaji(
                (string) $address->prefecture,
                (string) ($address->prefecture_romaji ?? '')
            );

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
     * DBに住所がない場合のフォールバック変換
     */
    private function createFallbackAddress(
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

        /**
         * 先頭郵便番号を除去
         */
        $inputAddress =
            $this->removeLeadingPostalCode(
                $inputAddress
            );

        /**
         * 検索用住所
         */
        $addressWithoutSpaces =
            $this->normalizeAddressForSearch(
                $inputAddress
            );

        /**
         * 最初の数字より前をベース住所とする
         */
        $baseAddress =
            $this->extractSearchBase(
                $addressWithoutSpaces
            );

        if ($baseAddress === '') {
            return null;
        }

        /**
         * 最初の数字から後ろを詳細住所として取得
         */
        $detail =
            $this->extractDetailFromSearchBase(
                $inputAddress
            );

        /**
         * fallbackでもDBから分かる範囲は利用する。
         *
         * 例：
         *
         * 仙台市太白区緑ヶ丘
         *
         * ↓
         *
         * city:
         * 仙台市 太白区
         *
         * town:
         * 緑ヶ丘
         *
         * さらにDBに緑ヶ丘のromajiがあれば
         *
         * Midorigaoka
         *
         * を利用する。
         */
        $resolved =
            $this->resolveFallbackBase(
                $baseAddress
            );

        $address = new PostalCode();

        /**
         * 郵便番号は、
         * 入力されているものだけ使用する。
         *
         * DBにない場合は推測しない。
         */
        $address->postal_code =
            $postalCode;

        $address->prefecture =
            $resolved['prefecture'] ?? '';

        $address->prefecture_romaji =
            $resolved['prefecture_romaji'] ?? '';

        $address->city =
            $resolved['city'] ?? '';

        $address->city_romaji =
            $resolved['city_romaji'] ?? '';

        $address->town =
            $resolved['town'] ?? $baseAddress;

        $address->town_romaji =
            $resolved['town_romaji'] ?? '';

        /**
         * DBで町域まで解決できなかった場合でも、
         * 入力されたbaseAddressを保持する。
         */
        if (
            trim((string) $address->town) === ''
        ) {
            $address->town =
                $baseAddress;
        }

        $this->formatAddress(
            $address,
            $detail
        );

        return $address;
    }

    /**
     * fallback用にDBから住所の構成を解決する。
     *
     * 例：
     *
     * 仙台市太白区緑ヶ丘
     *
     * ↓
     *
     * 市区町村：
     * 仙台市 太白区
     *
     * 町域：
     * 緑ヶ丘
     */
    private function resolveFallbackBase(
        string $baseAddress
    ): array {
        $result = [
            'prefecture' => '',
            'prefecture_romaji' => '',
            'city' => '',
            'city_romaji' => '',
            'town' => $baseAddress,
            'town_romaji' => '',
        ];

        $normalizedBase =
            $this->normalizeAddressForComparison(
                $baseAddress
            );

        if ($normalizedBase === '') {
            return $result;
        }

        /**
         * 都道府県＋市区町村の候補を取得。
         *
         * 市区町村数は町域数よりかなり少ないため、
         * ここではdistinctで取得してPHP側で
         * 最長一致を探す。
         */
        $cities = PostalCode::query()
            ->select([
                'prefecture',
                'prefecture_romaji',
                'city',
                'city_romaji',
            ])
            ->distinct()
            ->get();

        $bestCity = null;
        $bestLength = 0;

        foreach ($cities as $city) {
            $prefecture =
                (string) $city->prefecture;

            $cityName =
                (string) $city->city;

            $prefectureCity =
                $this->normalizeAddressForComparison(
                    $prefecture . $cityName
                );

            $cityOnly =
                $this->normalizeAddressForComparison(
                    $cityName
                );

            /**
             * 都道府県＋市区町村
             */
            if (
                $prefectureCity !== '' &&
                str_starts_with(
                    $normalizedBase,
                    $prefectureCity
                )
            ) {
                $length =
                    mb_strlen($prefectureCity);

                if ($length > $bestLength) {
                    $bestLength = $length;

                    $bestCity = [
                        'prefecture' =>
                            $prefecture,

                        'prefecture_romaji' =>
                            (string) $city->prefecture_romaji,

                        'city' =>
                            $cityName,

                        'city_romaji' =>
                            (string) $city->city_romaji,

                        'prefix' =>
                            $prefectureCity,
                    ];
                }
            }

            /**
             * 市区町村だけ
             *
             * 例：
             *
             * 仙台市太白区緑ヶ丘
             *
             * 入力に「宮城県」がなくても
             * 仙台市太白区を認識できる。
             */
            if (
                $cityOnly !== '' &&
                str_starts_with(
                    $normalizedBase,
                    $cityOnly
                )
            ) {
                $length =
                    mb_strlen($cityOnly);

                if ($length > $bestLength) {
                    $bestLength = $length;

                    $bestCity = [
                        'prefecture' =>
                            $prefecture,

                        'prefecture_romaji' =>
                            (string) $city->prefecture_romaji,

                        'city' =>
                            $cityName,

                        'city_romaji' =>
                            (string) $city->city_romaji,

                        'prefix' =>
                            $cityOnly,
                    ];
                }
            }
        }

        /**
         * 市区町村が見つかった場合
         */
        if ($bestCity !== null) {
            $result['prefecture'] =
                $bestCity['prefecture'];

            $result['prefecture_romaji'] =
                $bestCity['prefecture_romaji'];

            $result['city'] =
                $bestCity['city'];

            $result['city_romaji'] =
                $bestCity['city_romaji'];

            $remaining =
                mb_substr(
                    $normalizedBase,
                    mb_strlen(
                        $bestCity['prefix']
                    )
                );

            if ($remaining !== '') {
                /**
                 * まず同じ市区町村内で町域を探す。
                 */
                $townCandidates =
                    PostalCode::query()
                        ->select([
                            'town',
                            'town_romaji',
                        ])
                        ->where(
                            'city',
                            $bestCity['city']
                        )
                        ->get();

                $bestTown = null;
                $bestTownLength = 0;

                foreach (
                    $townCandidates as $townCandidate
                ) {
                    $townName =
                        (string) $townCandidate->town;

                    $normalizedTown =
                        $this->normalizeAddressForComparison(
                            $townName
                        );

                    if (
                        $normalizedTown !== '' &&
                        $normalizedTown === $remaining
                    ) {
                        $bestTown = $townCandidate;
                        break;
                    }

                    /**
                     * townが入力baseの先頭に含まれるケース。
                     */
                    if (
                        $normalizedTown !== '' &&
                        str_starts_with(
                            $remaining,
                            $normalizedTown
                        ) &&
                        mb_strlen($normalizedTown) >
                            $bestTownLength
                    ) {
                        $bestTownLength =
                            mb_strlen($normalizedTown);

                        $bestTown =
                            $townCandidate;
                    }
                }

                /**
                 * 同じ市区町村内にない場合、
                 * 全国の同名町域から安全にromajiを取得する。
                 *
                 * ただし「最初の1件」を使わない。
                 *
                 * 同じtown_romajiしか存在しない場合のみ
                 * その読みを採用する。
                 */
                if ($bestTown === null) {
                    $bestTown =
                        $this->findTownByUniqueRomaji(
                            $remaining
                        );
                }

                if ($bestTown !== null) {
                    $result['town'] =
                        (string) $bestTown->town;

                    $result['town_romaji'] =
                        (string) (
                            $bestTown->town_romaji ?? ''
                        );
                } else {
                    /**
                     * DBに町域がない場合でも、
                     * 入力された町域をそのまま保持する。
                     */
                    $result['town'] =
                        $remaining;
                }
            }

            return $result;
        }

        /**
         * 市区町村自体が見つからなかった場合。
         *
         * 町域全体をそのまま保持する。
         */
        return $result;
    }

    /**
     * 全国から同名町域を検索し、
     * 全て同じromajiの場合のみ採用する。
     */
    private function findTownByUniqueRomaji(
        string $townName
    ): ?PostalCode {
        $normalizedTown =
            $this->normalizeAddressForComparison(
                $townName
            );

        if ($normalizedTown === '') {
            return null;
        }

        $townCandidates =
            PostalCode::query()
                ->select([
                    'town',
                    'town_romaji',
                ])
                ->get();

        $romajiValues = [];
        $firstCandidate = null;

        foreach (
            $townCandidates as $candidate
        ) {
            $candidateTown =
                $this->normalizeAddressForComparison(
                    (string) $candidate->town
                );

            if (
                $candidateTown !== $normalizedTown
            ) {
                continue;
            }

            if ($firstCandidate === null) {
                $firstCandidate =
                    $candidate;
            }

            $romaji =
                trim(
                    (string) (
                        $candidate->town_romaji ?? ''
                    )
                );

            if ($romaji !== '') {
                $romajiValues[] =
                    mb_strtolower($romaji);
            }
        }

        if (
            $firstCandidate === null ||
            empty($romajiValues)
        ) {
            return null;
        }

        $romajiValues =
            array_values(
                array_unique($romajiValues)
            );

        /**
         * 読みが一意の場合のみ使用。
         */
        if (count($romajiValues) !== 1) {
            return null;
        }

        /**
         * 元データのtownを保持しつつ、
         * romajiだけ利用できるようにする。
         */
        $firstCandidate->town_romaji =
            $romajiValues[0];

        return $firstCandidate;
    }

    /**
     * 詳細住所を取得するためのフォールバック処理
     */
    private function extractDetailFromSearchBase(
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

        /**
         * 最初の数字から後ろを詳細住所とする。
         *
         * 全角数字はnormalizeAddressText()で
         * 半角数字に統一済み。
         */
        if (
            preg_match(
                '/^\D*?(\d.*)$/u',
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
     * DB住所に含まれる
     * 都道府県＋市区町村＋町域以降の詳細住所を取得する。
     *
     * DBは「住所を完全に一致させるフィルター」ではなく、
     * 分かる範囲を取得するための補助として扱う。
     */
    private function extractDetailFromMatchedAddress(
        string $inputAddress,
        PostalCode $address
    ): string {
        if (trim($inputAddress) === '') {
            return '';
        }

        $input =
            $this->normalizeAddressText(
                $inputAddress
            );

        $input =
            $this->removeLeadingPostalCode(
                $input
            );

        $base =
            (string) $address->prefecture .
            (string) $address->city .
            (string) $address->town;

        $base =
            $this->normalizeAddressText(
                $base
            );

        /**
         * まず都道府県＋市区町村＋町域で除去。
         */
        $detail =
            $this->removeAddressPrefixIgnoringSpaces(
                $input,
                $base
            );

        /**
         * prefectureが入力されていない場合、
         * city + townだけでも試す。
         */
        if ($detail === '') {
            $baseWithoutPrefecture =
                (string) $address->city .
                (string) $address->town;

            $baseWithoutPrefecture =
                $this->normalizeAddressText(
                    $baseWithoutPrefecture
                );

            $detail =
                $this->removeAddressPrefixIgnoringSpaces(
                    $input,
                    $baseWithoutPrefecture
                );
        }

        /**
         * cityも入力されていない場合、
         * townだけでも試す。
         */
        if ($detail === '') {
            $town =
                $this->normalizeAddressText(
                    (string) $address->town
                );

            $detail =
                $this->removeAddressPrefixIgnoringSpaces(
                    $input,
                    $town
                );
        }

        /**
         * DBの住所部分を正確に除去できなかった場合でも、
         * 詳細住所を捨てない。
         *
         * 最初の数字以降をそのまま詳細住所として扱う。
         */
        if ($detail === '') {
            $detail =
                $this->extractDetailFromSearchBase(
                    $input
                );
        }

        return trim($detail);
    }

    /**
     * 入力住所から検索用のベース住所を取得する。
     */
    private function extractSearchBase(
        string $address
    ): string {
        $address =
            $this->normalizeAddressForSearch(
                $address
            );

        if ($address === '') {
            return '';
        }

        /**
         * 最初の数字から後ろを詳細住所として扱う。
         */
        if (
            preg_match(
                '/^(.*?)(\d.*)$/u',
                $address,
                $matches
            )
        ) {
            $base =
                trim($matches[1]);

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
        $input =
            $this->normalizeAddressText(
                $input
            );

        $base =
            $this->normalizeAddressText(
                $base
            );

        if (
            $input === '' ||
            $base === ''
        ) {
            return '';
        }

        /**
         * 比較用には空白を除去。
         *
         * これにより、
         *
         * 仙台市太白区緑ヶ丘4-30-3
         *
         * 仙台市　太白区 緑ヶ丘 4－30－3
         *
         * のどちらも同じように扱える。
         */
        $inputWithoutSpaces =
            $this->normalizeAddressForComparison(
                $input
            );

        $baseWithoutSpaces =
            $this->normalizeAddressForComparison(
                $base
            );

        if (
            $inputWithoutSpaces === '' ||
            $baseWithoutSpaces === ''
        ) {
            return '';
        }

        /**
         * 先頭がDB住所と一致しているか確認。
         */
        if (
            !str_starts_with(
                $inputWithoutSpaces,
                $baseWithoutSpaces
            )
        ) {
            return '';
        }

        /**
         * DB住所の文字数分だけ、
         * 元の入力から詳細住所位置を求める。
         */
        $inputLength =
            mb_strlen($input);

        $baseLength =
            mb_strlen($baseWithoutSpaces);

        $inputIndex = 0;
        $matchedLength = 0;

        while (
            $inputIndex < $inputLength &&
            $matchedLength < $baseLength
        ) {
            $char =
                mb_substr(
                    $input,
                    $inputIndex,
                    1
                );

            /**
             * 入力側の空白は無視。
             */
            if (
                preg_match(
                    '/\s/u',
                    $char
                )
            ) {
                $inputIndex++;
                continue;
            }

            $matchedLength++;
            $inputIndex++;
        }

        /**
         * DB住所分を超えた位置から
         * 残りを詳細住所とする。
         */
        $detail =
            mb_substr(
                $input,
                $inputIndex
            );

        return trim($detail);
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

        /**
         * 住所番号部分で使用するハイフンだけ統一する。
         *
         * 「ー」は日本語の長音にも使われるため、
         * normalizeAddressText()では
         * 全体を「-」に変換しない。
         */
        $detail =
            $this->normalizeAddressHyphens(
                $detail
            );

        /**
         * ① 部屋番号を先に取得
         *
         * 201号室
         * 201号
         * Room 201
         * #201
         */
        $room = '';

        /**
         * Room 201
         */
        if (
            preg_match(
                '/(?:^|\s)Room\s*([0-9A-Za-z-]+)\s*$/iu',
                $detail,
                $matches
            )
        ) {
            $room = $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)Room\s*[0-9A-Za-z-]+\s*$/iu',
                    '',
                    $detail
                );
        }

        /**
         * #201
         */
        elseif (
            preg_match(
                '/(?:^|\s)#\s*([0-9A-Za-z-]+)\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room = $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)#\s*[0-9A-Za-z-]+\s*$/u',
                    '',
                    $detail
                );
        }

        /**
         * 201号室
         */
        elseif (
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*号室\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room = $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)[0-9A-Za-z-]+\s*号室\s*$/u',
                    '',
                    $detail
                );
        }

        /**
         * 201号
         */
        elseif (
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*号\s*$/u',
                $detail,
                $matches
            )
        ) {
            $room = $matches[1];

            $detail =
                preg_replace(
                    '/(?:^|\s)[0-9A-Za-z-]+\s*号\s*$/u',
                    '',
                    $detail
                );
        }

        $detail =
            trim($detail);

        /**
         * ② 建物名の後ろに単純な部屋番号がある場合。
         *
         * 例：
         *
         * 4-30-3 グリーンハイツ 201
         *
         * ↓
         *
         * room = 201
         */
        if (
            $room === '' &&
            preg_match(
                '/(?:^|\s)([0-9A-Za-z-]+)\s*$/u',
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

                /**
                 * 前に何か文字があり、
                 * 住所全体に空白がある場合のみ
                 * 部屋番号と判断。
                 */
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

        /**
         * ③ 番地部分を取得
         *
         * 4-30-3
         * 4丁目30番3号
         * 4丁目30番地3号
         * 4丁目30-3
         */
        $number = '';

        /**
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
                    mb_strlen($matches[0])
                );
        }

        /**
         * 4丁目30番3
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
                    mb_strlen($matches[0])
                );
        }

        /**
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
                    mb_strlen($matches[0])
                );
        }

        /**
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
                    mb_strlen($matches[0])
                );
        }

        /**
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
                    mb_strlen($matches[0])
                );
        }

        if ($number !== '') {
            $result['number'] =
                $number;
        }

        /**
         * ④ 残りを建物名として扱う。
         *
         * 重要：
         * ここで残った文字列を捨てない。
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

        /**
         * ⑤ 部屋番号
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

        /**
         * formatAddress()で解決済みの値を優先。
         */
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

        /**
         * 町域 + 番地
         */
        $townPart =
            $town;

        if (!empty($detail['number'])) {
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

        /**
         * 建物名
         */
        if (!empty($detail['building'])) {
            $parts[] =
                $detail['building'];
        }

        /**
         * 部屋番号
         */
        if (!empty($detail['room'])) {
            $parts[] =
                'Room ' .
                $detail['room'];
        }

        /**
         * 市区町村
         */
        if ($city !== '') {
            $parts[] =
                $city;
        }

        /**
         * 都道府県
         */
        if ($prefecture !== '') {
            $parts[] =
                $prefecture;
        }

        /**
         * 郵便番号
         */
        if (!empty($address->postal_code)) {
            $parts[] =
                $address->postal_code;
        }

        /**
         * 国名
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
     * 住所全体からDBを検索する。
     *
     * DB側の半角・全角スペースを無視する。
     */
    private function findAddressesByFullAddress(
        string $normalizedAddress
    ) {
        if ($normalizedAddress === '') {
            return collect();
        }

        return PostalCode::whereRaw(
            "REPLACE(REPLACE(prefecture, ' ', ''), '　', '') ||
             REPLACE(REPLACE(city, ' ', ''), '　', '') ||
             REPLACE(REPLACE(town, ' ', ''), '　', '')
             LIKE ?",
            [
                '%' .
                $normalizedAddress .
                '%'
            ]
        )->get();
    }

    /**
     * 住所全体からDBを1件取得する。
     */
    private function findFirstAddressByFullAddress(
        string $normalizedAddress
    ): ?PostalCode {
        if ($normalizedAddress === '') {
            return null;
        }

        return PostalCode::whereRaw(
            "REPLACE(REPLACE(prefecture, ' ', ''), '　', '') ||
             REPLACE(REPLACE(city, ' ', ''), '　', '') ||
             REPLACE(REPLACE(town, ' ', ''), '　', '')
             LIKE ?",
            [
                '%' .
                $normalizedAddress .
                '%'
            ]
        )->first();
    }

    /**
     * 入力文字列を全角・半角を含めて正規化する。
     *
     * 例：
     *
     * 仙台市　太白区　緑ヶ丘
     * 仙台市 太白区 緑ヶ丘
     * 仙台市太白区緑ヶ丘
     *
     * を同じ検索基準で扱う。
     */
    private function normalizeAddressText(
        string $text
    ): string {
        $text =
            trim($text);

        if ($text === '') {
            return '';
        }

        /**
         * 全角英数字 → 半角
         * 半角カタカナ → 全角カタカナ
         *
         * ２０１ → 201
         * ｌｌ → ll
         */
        $text =
            mb_convert_kana(
                $text,
                'asKV',
                'UTF-8'
            );

        /**
         * 全角スペースを半角スペースへ
         */
        $text =
            str_replace(
                '　',
                ' ',
                $text
            );

        /**
         * 改行・タブなどをスペースへ
         */
        $text =
            preg_replace(
                '/[\r\n\t]+/u',
                ' ',
                $text
            );

        /**
         * NBSPなどの空白も通常スペースとして扱う。
         */
        $text =
            preg_replace(
                '/\s+/u',
                ' ',
                $text
            );

        /**
         * 全角記号を統一。
         *
         * 「ー」は長音符の可能性があるため、
         * ここではハイフンに変換しない。
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
     * 住所検索用に空白をすべて除去する。
     */
    private function normalizeAddressForSearch(
        string $text
    ): string {
        $text =
            $this->normalizeAddressText(
                $text
            );

        if ($text === '') {
            return '';
        }

        return preg_replace(
            '/\s+/u',
            '',
            $text
        );
    }

    /**
     * DB住所比較用の正規化。
     *
     * 「ヶ」「ケ」のような表記揺れを
     * 比較時だけある程度吸収する。
     *
     * ※ 出力文字列自体は変更しない。
     */
    private function normalizeAddressForComparison(
        string $text
    ): string {
        $text =
            $this->normalizeAddressForSearch(
                $text
            );

        if ($text === '') {
            return '';
        }

        /**
         * 住所名でよくある
         * ヶ / ケ の表記揺れを比較用に統一。
         *
         * 出力には使用しない。
         */
        $text =
            str_replace(
                [
                    'ヶ',
                    'ｹ',
                ],
                'ケ',
                $text
            );

        return $text;
    }

    /**
     * 郵便番号を正規化する。
     *
     * 例：
     *
     * 980-0811
     * 980－0811
     * ９８０－０８１１
     * 〒980-0811
     *
     * ↓
     *
     * 9800811
     */
    private function normalizePostalCode(
        string $postalCode
    ): string {
        $postalCode =
            trim($postalCode);

        if ($postalCode === '') {
            return '';
        }

        /**
         * 全角英数字を半角へ。
         */
        $postalCode =
            mb_convert_kana(
                $postalCode,
                'as',
                'UTF-8'
            );

        /**
         * 郵便記号を除去。
         */
        $postalCode =
            str_replace(
                '〒',
                '',
                $postalCode
            );

        /**
         * 各種ハイフンと空白を除去。
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

        return trim($postalCode);
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

        /**
         * 〒980-0811
         */
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
     *
     * 注意：
     * 「ー」は長音符にもなるため、
     * 住所詳細の数字周辺でのみ利用する。
     */
    private function normalizeAddressHyphens(
        string $text
    ): string {
        /**
         * 数字の間にあるハイフン類を統一。
         *
         * 4ー30ー3
         * ↓
         * 4-30-3
         */
        $text =
            preg_replace(
                '/(?<=\d)[ー－−–—﹣](?=\d)/u',
                '-',
                $text
            );

        /**
         * その他の明確なハイフン記号
         */
        $text =
            str_replace(
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

        return $text;
    }

    /**
     * DBのromajiを優先して住所名を変換する。
     *
     * 漢字の住所名を
     * JapaneseRomajiServiceへ直接渡して
     * 壊すことを防ぐ。
     */
    private function resolvePlaceRomaji(
        string $original,
        string $dbRomaji = ''
    ): string {
        $dbRomaji =
            trim($dbRomaji);

        if ($dbRomaji !== '') {
            return $dbRomaji;
        }

        $original =
            trim($original);

        if ($original === '') {
            return '';
        }

        /**
         * 漢字を含む場合、
         * DBに安全な読みがない限り
         * generic converterに渡さない。
         */
        if (
            preg_match(
                '/[\x{3400}-\x{4DBF}\x{4E00}-\x{9FFF}\x{F900}-\x{FAFF}]/u',
                $original
            )
        ) {
            /**
             * まずtownとして一意のromajiを探す。
             */
            $town =
                $this->findTownByUniqueRomaji(
                    $original
                );

            if (
                $town !== null &&
                trim(
                    (string) (
                        $town->town_romaji ?? ''
                    )
                ) !== ''
            ) {
                return trim(
                    (string) $town->town_romaji
                );
            }

            /**
             * 安全な読みがない場合は
             * 壊れたローマ字を生成しない。
             */
            return $original;
        }

        /**
         * 漢字を含まない場合は通常変換。
         */
        return $this->romajiService->convert(
            $original
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