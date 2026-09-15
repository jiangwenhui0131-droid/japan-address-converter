<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AddressController extends Controller
{
    public function index()
    {
        // CSV変換結果を1回だけ取得
        $csvResults = session()->pull('csvResults');
        $csvCount = session()->pull('csvCount');

        // 郵便番号検索結果を1回だけ取得
        $addresses = session()->pull('addresses');
        $postalCode = session()->pull('postalCode');
        $inputAddress = session()->pull('inputAddress');
        $searchType = session()->pull('searchType');

        // エラーメッセージ
        $csvError = session()->pull('csv_error');

        return response()
            ->view('address', [
                'csvResults' => $csvResults,
                'csvCount' => $csvCount,
                'addresses' => $addresses,
                'postalCode' => $postalCode,
                'inputAddress' => $inputAddress,
                'searchType' => $searchType,
                'csv_error' => $csvError,
            ])
            ->header(
                'Cache-Control',
                'no-store, no-cache, must-revalidate, max-age=0'
            )
            ->header(
                'Pragma',
                'no-cache'
            )
            ->header(
                'Expires',
                '0'
            );
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
     * 運営者について
     */
    public function about()
    {
        return view('about');
    }

    /**
     * 協業・掲載について
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
        // 郵便番号からハイフンを削除
        $postalCode = str_replace(
            '-',
            '',
            trim($request->postal_code)
        );

        // 郵便番号から住所を検索
        $addresses = PostalCode::where(
            'postal_code',
            $postalCode
        )->get();

        // 海外向け住所を整形
        foreach ($addresses as $address) {
            $this->formatAddress($address);
        }

        // 検索結果をSessionに保存
        session()->put(
            'addresses',
            $addresses
        );

        session()->put(
            'postalCode',
            $postalCode
        );

        session()->put(
            'searchType',
            'postal'
        );

        // 常にトップページへ戻す
        return redirect('/');
    }

    /**
     * 日本語住所から検索
     */
    public function searchAddress(Request $request)
    {
        // 入力値を保存
        $inputAddress = trim($request->address);

        // 全角スペース・半角スペースを削除
        $normalizedAddress = str_replace(
            ['　', ' '],
            '',
            $inputAddress
        );

        /**
         * 都道府県 + 市区町村 + 町域
         * を連結して検索する
         */
        $addresses = PostalCode::whereRaw(
            "REPLACE(
                REPLACE(
                    prefecture || city || town,
                    '　',
                    ''
                ),
                ' ',
                ''
            ) LIKE ?",
            ['%' . $normalizedAddress . '%']
        )->get();

        /**
         * 完全な住所で見つからなかった場合、
         * 町名だけでも検索する
         */
        if ($addresses->isEmpty()) {
            $addresses = PostalCode::whereRaw(
                "REPLACE(
                    REPLACE(
                        town,
                        '　',
                        ''
                    ),
                    ' ',
                    ''
                ) LIKE ?",
                ['%' . $normalizedAddress . '%']
            )->get();
        }

        // 海外向け住所を整形
        foreach ($addresses as $address) {
            $this->formatAddress($address);
        }

        // 検索結果をSessionに保存
        session()->put(
            'addresses',
            $addresses
        );

        session()->put(
            'inputAddress',
            $inputAddress
        );

        session()->put(
            'searchType',
            'address'
        );

        // 常にトップページへ戻す
        return redirect('/');
    }

    /**
     * CSV一括変換
     */
    public function convertCsv(Request $request)
    {
        /**
         * ----------------------------------------
         * ① ファイルチェック
         * ----------------------------------------
         *
         * max:131072
         * = 131072KB
         * = 128MB
         */
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
                    'CSVファイルを選択してください。',

                'csv_file.file' =>
                    '正しいCSVファイルをアップロードしてください。',

                'csv_file.mimes' =>
                    'CSVまたはTXTファイルをアップロードしてください。',

                'csv_file.max' =>
                    'ファイルサイズが大きすぎます。128MB以下のファイルをアップロードしてください。',
            ]
        );

        if ($validator->fails()) {
            return back()->with(
                'csv_error',
                $validator->errors()->first('csv_file')
            );
        }

        /**
         * ----------------------------------------
         * ② ファイル取得
         * ----------------------------------------
         */
        $file = $request->file('csv_file');

        if (!$file || !$file->isValid()) {
            return back()->with(
                'csv_error',
                'CSVファイルをアップロードできませんでした。もう一度お試しください。'
            );
        }

        /**
         * ----------------------------------------
         * ③ CSVファイルを開く
         * ----------------------------------------
         */
        $realPath = $file->getRealPath();

        if (!$realPath || !is_file($realPath)) {
            return back()->with(
                'csv_error',
                'CSVファイルを読み込めませんでした。もう一度お試しください。'
            );
        }

        $handle = @fopen(
            $realPath,
            'r'
        );

        if ($handle === false) {
            return back()->with(
                'csv_error',
                'CSVファイルを読み込めませんでした。'
            );
        }

        /**
         * ----------------------------------------
         * ④ CSVを読み込み、
         *    実際のデータ件数を確認
         * ----------------------------------------
         */
        $rows = [];
        $rowNumber = 0;

        try {
            while (($row = @fgetcsv($handle)) !== false) {
                $rowNumber++;

                // 2列未満の場合はスキップ
                if (count($row) < 2) {
                    continue;
                }

                $firstColumn = trim(
                    (string) $row[0]
                );

                $secondColumn = trim(
                    (string) $row[1]
                );

                /**
                 * ヘッダー行の場合はスキップ
                 *
                 * 例：
                 * 郵便番号,住所
                 * postal_code,address
                 * postcode,address
                 */
                if (
                    $rowNumber === 1
                    && (
                        $firstColumn === '郵便番号'
                        || strtolower($firstColumn) === 'postal_code'
                        || strtolower($firstColumn) === 'postcode'
                    )
                ) {
                    continue;
                }

                // 両方空の場合はデータとして数えない
                if (
                    $firstColumn === ''
                    && $secondColumn === ''
                ) {
                    continue;
                }

                $rows[] = [
                    'postal_code' => $firstColumn,
                    'address' => $secondColumn,
                ];

                /**
                 * 101件になった時点で終了
                 */
                if (count($rows) > 100) {
                    fclose($handle);

                    return back()->with(
                        'csv_error',
                        'CSV一括変換は100件まで無料です。101件以上の変換については、有料サービスをご利用ください。'
                    );
                }
            }
        } catch (\Throwable $e) {
            fclose($handle);

            return back()->with(
                'csv_error',
                'CSVファイルを読み込めませんでした。ファイルの内容や形式を確認して、もう一度お試しください。'
            );
        }

        fclose($handle);

        /**
         * ----------------------------------------
         * ⑤ 件数チェック
         * ----------------------------------------
         */
        $csvCount = count($rows);

        // 0件の場合
        if ($csvCount === 0) {
            return back()->with(
                'csv_error',
                '変換できる住所データがありません。'
            );
        }

        /**
         * ----------------------------------------
         * ⑥ CSV変換
         * ----------------------------------------
         */
        $results = [];

        foreach ($rows as $row) {
            $firstColumn = $row['postal_code'];
            $inputAddress = $row['address'];

            // 郵便番号
            $postalCode = str_replace(
                '-',
                '',
                $firstColumn
            );

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
             * ② 郵便番号で見つからなかった場合
             *    日本語住所で検索
             */
            if (
                !$postalAddress
                && $inputAddress !== ''
            ) {
                $normalizedAddress = str_replace(
                    ['　', ' '],
                    '',
                    $inputAddress
                );

                /**
                 * 都道府県 + 市区町村 + 町域
                 */
                $postalAddress = PostalCode::whereRaw(
                    "REPLACE(
                        REPLACE(
                            prefecture || city || town,
                            '　',
                            ''
                        ),
                        ' ',
                        ''
                    ) LIKE ?",
                    ['%' . $normalizedAddress . '%']
                )->first();

                /**
                 * 完全な住所で見つからなかった場合、
                 * 町名だけでも検索
                 */
                if (!$postalAddress) {
                    $postalAddress = PostalCode::whereRaw(
                        "REPLACE(
                            REPLACE(
                                town,
                                '　',
                                ''
                            ),
                            ' ',
                            ''
                        ) LIKE ?",
                        ['%' . $normalizedAddress . '%']
                    )->first();
                }
            }

            /**
             * 見つからなかった場合
             */
            if (!$postalAddress) {
                $results[] = [
                    'postal_code' => $firstColumn,
                    'address' => $inputAddress,
                    'international_address' => '変換できませんでした',
                ];

                continue;
            }

            /**
             * 海外向け住所
             */
            $internationalTown = $this->formatTown(
                $postalAddress->town_romaji
            );

            $internationalCity = $this->formatCity(
                $postalAddress->city_romaji
            );

            $internationalPrefecture = $this->formatName(
                $postalAddress->prefecture_romaji
            );

            $formattedPostalCode =
                substr(
                    $postalAddress->postal_code,
                    0,
                    3
                )
                . '-'
                . substr(
                    $postalAddress->postal_code,
                    3,
                    4
                );

            $internationalAddress =
                $internationalTown
                . ', '
                . $internationalCity
                . ', '
                . $internationalPrefecture
                . ', '
                . $formattedPostalCode
                . ', Japan';

            $results[] = [
                'postal_code' => $formattedPostalCode,
                'address' => $inputAddress,
                'international_address' => $internationalAddress,
            ];
        }

        /**
         * ----------------------------------------
         * ⑦ CSV変換結果をSessionに一時保存
         * ----------------------------------------
         */
        session()->put(
            'csvResults',
            $results
        );

        session()->put(
            'csvCount',
            count($results)
        );

        /**
         * POSTページをそのまま表示せず、
         * 初期ページへリダイレクトする
         */
        return redirect('/');
    }

    /**
     * CSVダウンロード
     */
    public function downloadCsv(Request $request)
    {
        $results = $request->input(
            'results',
            []
        );

        if (empty($results)) {
            return back()->with(
                'csv_error',
                'ダウンロードするデータがありません。'
            );
        }

        $fileName = 'converted_addresses.csv';

        return new StreamedResponse(
            function () use ($results) {
                $handle = fopen(
                    'php://output',
                    'w'
                );

                // Excel用UTF-8 BOM
                fwrite(
                    $handle,
                    "\xEF\xBB\xBF"
                );

                // ヘッダー
                fputcsv(
                    $handle,
                    [
                        '郵便番号',
                        '日本語住所',
                        '海外向け住所',
                    ]
                );

                // データ
                foreach ($results as $result) {
                    fputcsv(
                        $handle,
                        [
                            $result['postal_code'] ?? '',
                            $result['address'] ?? '',
                            $result['international_address'] ?? '',
                        ]
                    );
                }

                fclose($handle);
            },
            200,
            [
                'Content-Type' =>
                    'text/csv; charset=UTF-8',

                'Content-Disposition' =>
                    'attachment; filename="' .
                    $fileName .
                    '"',
            ]
        );
    }

    /**
     * 住所情報を海外向け表示用に整形
     */
    private function formatAddress($address)
    {
        $address->international_town =
            $this->formatTown(
                $address->town_romaji
            );

        $address->international_city =
            $this->formatCity(
                $address->city_romaji
            );

        $address->international_prefecture =
            $this->formatName(
                $address->prefecture_romaji
            );

        $address->formatted_postal_code =
            substr(
                $address->postal_code,
                0,
                3
            )
            . '-'
            . substr(
                $address->postal_code,
                3,
                4
            );
    }

    /**
     * 一般的なローマ字表記を整形
     */
    private function formatName($name)
    {
        return ucwords(
            strtolower(
                trim($name)
            )
        );
    }

    /**
     * 市区町村のローマ字を整形
     */
    private function formatCity($city)
    {
        $city = $this->formatName($city);

        $city = str_replace(
            ' Shi',
            '-shi',
            $city
        );

        $city = str_replace(
            ' Ku',
            '-ku',
            $city
        );

        $city = str_replace(
            ' Gun',
            '-gun',
            $city
        );

        $city = str_replace(
            ' Cho',
            '-cho',
            $city
        );

        $city = str_replace(
            ' Mura',
            '-mura',
            $city
        );

        return $city;
    }

    /**
     * 町名のローマ字を整形
     */
    private function formatTown($town)
    {
        return $this->formatName($town);
    }
}