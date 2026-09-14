<!DOCTYPE html>

<html lang="ja">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>
    日本住所英語変換｜郵便番号・住所を英語表記に変換
</title>

<meta
    name="description"
    content="日本の郵便番号や住所を海外向けの英語表記に変換できます。郵便番号検索、日本語住所検索、CSVによる住所一括変換に対応しています。"
>

<link
    rel="canonical"
    href="{{ secure_url('/') }}"
>

<meta
    property="og:title"
    content="日本住所英語変換｜郵便番号・住所を英語表記に変換"
>

<meta
    property="og:description"
    content="日本の郵便番号や住所を海外向けの英語表記に変換できます。郵便番号検索、日本語住所検索、CSVによる住所一括変換に対応しています。"
>

<meta
    property="og:type"
    content="website"
>

<meta
    property="og:url"
    content="{{ secure_url('/') }}"
>

<meta
    property="og:site_name"
    content="日本住所変換ツール"
>

<meta
    name="twitter:card"
    content="summary"
>

<meta
    name="twitter:title"
    content="日本住所英語変換｜郵便番号・住所を英語表記に変換"
>

<meta
    name="twitter:description"
    content="日本の郵便番号や住所を海外向けの英語表記に変換できます。郵便番号検索、日本語住所検索、CSVによる住所一括変換に対応しています。"
>

<meta
    http-equiv="Cache-Control"
    content="no-store, no-cache, must-revalidate, max-age=0"
>

<meta
    http-equiv="Pragma"
    content="no-cache"
>

<meta
    http-equiv="Expires"
    content="0"
>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 40px 20px;
        background: #f5f5f5;
        color: #333;
        font-family:
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            "Hiragino Kaku Gothic ProN",
            "Hiragino Sans",
            Meiryo,
            sans-serif;
    }

    /*
     * ヘッダー
     */
    .site-header {
        margin-bottom: 35px;
        text-align: center;
    }

    h1 {
        margin: 0 0 12px;
        font-size: 32px;
        color: #222;
        line-height: 1.4;
    }

    .description {
        margin: 0;
        color: #666;
        font-size: 15px;
        line-height: 1.7;
    }

    /*
     * 各機能のカード
     */
    .feature-card {
        margin-bottom: 24px;
        padding: 28px;
        background: #fff;
        border-radius: 12px;
        box-shadow:
            0 2px 10px rgba(0, 0, 0, 0.06);
    }

    .feature-card h2 {
        margin: 0 0 20px;
        font-size: 21px;
        color: #222;
    }

    /*
     * 検索フォーム
     */
    .search-form {
        display: flex;
        gap: 10px;
        align-items: stretch;
    }

    .search-form input[type="text"] {
        flex: 1;
        min-width: 0;
        height: 46px;
        padding: 0 14px;
        border: 1px solid #ccc;
        border-radius: 7px;
        font-size: 16px;
        outline: none;
        background: #fff;
        color: #333;
    }

    .search-form input[type="text"]:focus {
        border-color: #555;
    }

    .search-form input[type="text"]::placeholder {
        color: #aaa;
    }

    .search-form button {
        flex-shrink: 0;
        height: 46px;
        padding: 0 24px;
        border: none;
        border-radius: 7px;
        background: #222;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .search-form button:hover {
        background: #444;
    }

    /*
     * 検索結果
     */
    .result-area {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #eee;
    }

    .result-title {
        margin: 0 0 16px;
        font-size: 17px;
        font-weight: 600;
        color: #333;
    }

    .result-card {
        margin-bottom: 14px;
        padding: 20px;
        background: #fafafa;
        border: 1px solid #e3e3e3;
        border-radius: 8px;
    }

    .result-card:last-child {
        margin-bottom: 0;
    }

    .result-row {
        margin-bottom: 18px;
    }

    .result-row:last-child {
        margin-bottom: 0;
    }

    .result-label {
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 600;
        color: #777;
    }

    .result-value {
        line-height: 1.7;
        font-size: 15px;
        color: #333;
        word-break: break-word;
    }

    /*
     * 海外向け住所
     */
    .international-address {
        position: relative;
        padding:
            14px
            110px
            14px
            14px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 7px;
        line-height: 1.8;
        word-break: break-word;
    }

    .copy-button {
        position: absolute;
        top: 10px;
        right: 10px;
        height: 36px;
        padding: 0 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background: #fff;
        color: #333;
        font-size: 13px;
        cursor: pointer;
    }

    .copy-button:hover {
        background: #f0f0f0;
    }

    /*
     * 結果なし
     */
    .no-result {
        margin: 0;
        padding: 15px;
        border-radius: 7px;
        background: #f8f8f8;
        color: #777;
        font-size: 14px;
    }

    /*
     * CSV
     */
    .csv-description {
        margin: 0 0 18px;
        color: #666;
        font-size: 14px;
        line-height: 1.7;
    }

    .csv-example {
        margin: 0 0 20px;
        padding: 14px;
        border-radius: 7px;
        background: #f7f7f7;
        border: 1px solid #e5e5e5;
        overflow-x: auto;
    }

    .csv-example-title {
        margin: 0 0 8px;
        font-size: 13px;
        font-weight: 600;
        color: #555;
    }

    .csv-example pre {
        margin: 0;
        font-size: 13px;
        line-height: 1.6;
        white-space: pre-wrap;
    }

    .csv-upload-form {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .csv-file-input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 7px;
        background: #fff;
        font-size: 14px;
    }

    .csv-upload-button {
        align-self: flex-start;
        height: 44px;
        padding: 0 22px;
        border: none;
        border-radius: 7px;
        background: #222;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
    }

    .csv-upload-button:hover {
        background: #444;
    }

    /*
     * CSV結果
     */
    .csv-result-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 15px;
    }

    .csv-result-count {
        margin: 0;
        color: #666;
        font-size: 14px;
    }

    .csv-table-wrapper {
        width: 100%;
        overflow-x: auto;
        border: 1px solid #ddd;
        border-radius: 7px;
    }

    .csv-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
        background: #fff;
    }

    .csv-table th,
    .csv-table td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        text-align: left;
        vertical-align: top;
        font-size: 13px;
    }

    .csv-table th {
        background: #f7f7f7;
        font-weight: 600;
        color: #555;
    }

    .csv-table tr:last-child td {
        border-bottom: none;
    }

    .csv-download-form {
        margin-top: 18px;
    }

    .csv-download-button {
        height: 44px;
        padding: 0 22px;
        border: none;
        border-radius: 7px;
        background: #222;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
    }

    .csv-download-button:hover {
        background: #444;
    }

    /*
     * エラー
     */
    .error-message {
        margin-bottom: 20px;
        padding: 14px;
        border-radius: 7px;
        background: #fff0f0;
        border: 1px solid #f0cccc;
        color: #b33;
        font-size: 14px;
        line-height: 1.6;
    }

    /*
     * フッター
     */
    .site-footer {
        margin-top: 40px;
        padding: 25px 20px;
        text-align: center;
        color: #777;
        font-size: 13px;
    }

    .footer-links {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        flex-wrap: wrap;
    }

    .footer-links a {
        color: #666;
        text-decoration: none;
    }

    .footer-links a:hover {
        color: #222;
        text-decoration: underline;
    }

    .copyright {
        margin: 12px 0 0;
        color: #999;
        font-size: 12px;
    }

    /*
     * スマートフォン
     */
    @media (max-width: 600px) {

        body {
            padding: 25px 12px;
        }

        .site-header {
            margin-bottom: 25px;
        }

        h1 {
            font-size: 26px;
        }

        .description {
            font-size: 14px;
        }

        .feature-card {
            margin-bottom: 18px;
            padding: 20px;
        }

        .feature-card h2 {
            font-size: 19px;
        }

        .search-form {
            flex-direction: column;
        }

        .search-form input[type="text"] {
            width: 100%;
        }

        .search-form button {
            width: 100%;
        }

        .international-address {
            padding-right: 14px;
            padding-bottom: 58px;
        }

        .copy-button {
            top: auto;
            right: 10px;
            bottom: 10px;
        }

        .csv-upload-button,
        .csv-download-button {
            width: 100%;
        }

        .csv-result-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .site-footer {
            margin-top: 25px;
            padding: 20px 10px;
        }
    }

</style>

</head>

<body>

<div class="container">

<!-- ============================================================
     ヘッダー
     ============================================================ -->
<header class="site-header">

    <h1>
        日本住所変換ツール
    </h1>

    <p class="description">
        日本の郵便番号・住所を海外向けの英語表記に変換します。
    </p>

</header>


<!-- ============================================================
     エラーメッセージ
     ============================================================ -->
@if (session('csv_error'))

    <div class="error-message">
        {{ session('csv_error') }}
    </div>

@endif


<!-- ============================================================
     郵便番号から検索
     ============================================================ -->
<div class="feature-card">

    <h2>
        郵便番号から検索
    </h2>

    <form
        action="{{ secure_url('/search') }}"
        method="POST"
        class="search-form"
    >

        @csrf

        <input
            type="text"
            name="postal_code"
            value="{{ $postalCode ?? '' }}"
            placeholder="例：060-0041"
            autocomplete="off"
        >

        <button type="submit">
            検索
        </button>

    </form>


    <!-- 検索結果 -->
    @if (
        isset($postalCode)
        && ($searchType ?? '') === 'postal'
    )

        <div class="result-area">

            <p class="result-title">
                検索結果
            </p>

            @if ($addresses->count() > 0)

                @foreach ($addresses as $address)

                    <div class="result-card">

                        <!-- 日本語住所 -->
                        <div class="result-row">

                            <div class="result-label">
                                日本語住所
                            </div>

                            <div class="result-value">
                                {{ $address->prefecture }}
                                {{ $address->city }}
                                {{ $address->town }}
                            </div>

                        </div>


                        <!-- ローマ字表記 -->
                        <div class="result-row">

                            <div class="result-label">
                                ローマ字表記
                            </div>

                            <div class="result-value">
                                {{ $address->town_romaji }},
                                {{ $address->city_romaji }},
                                {{ $address->prefecture_romaji }}
                            </div>

                        </div>


                        <!-- 海外向け住所 -->
                        <div class="result-row">

                            <div class="result-label">
                                海外向け住所
                            </div>

                            <div
                                class="international-address"
                                id="postal-address-{{ $address->id }}"
                            >

                                {{ $address->international_town }},
                                {{ $address->international_city }}<br>

                                {{ $address->international_prefecture }}<br>

                                {{ $address->formatted_postal_code }}<br>

                                Japan

                                <button
                                    type="button"
                                    class="copy-button"
                                    onclick="copyAddress('postal-address-{{ $address->id }}')"
                                >
                                    コピー
                                </button>

                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                <p class="no-result">
                    住所が見つかりませんでした。
                </p>

            @endif

        </div>

    @endif

</div>


<!-- ============================================================
     日本語住所から検索
     ============================================================ -->
<div class="feature-card">

    <h2>
        日本語住所から検索
    </h2>

    <form
        action="{{ secure_url('/search-address') }}"
        method="POST"
        class="search-form"
    >

        @csrf

        <input
            type="text"
            name="address"
            value="{{ $inputAddress ?? '' }}"
            placeholder="例：北海道札幌市中央区大通東"
            autocomplete="off"
        >

        <button type="submit">
            検索
        </button>

    </form>


    <!-- 検索結果 -->
    @if (
        isset($inputAddress)
        && ($searchType ?? '') === 'address'
    )

        <div class="result-area">

            <p class="result-title">
                検索結果
            </p>

            @if ($addresses->count() > 0)

                @foreach ($addresses as $address)

                    <div class="result-card">

                        <!-- 日本語住所 -->
                        <div class="result-row">

                            <div class="result-label">
                                日本語住所
                            </div>

                            <div class="result-value">
                                {{ $address->prefecture }}
                                {{ $address->city }}
                                {{ $address->town }}
                            </div>

                        </div>


                        <!-- ローマ字表記 -->
                        <div class="result-row">

                            <div class="result-label">
                                ローマ字表記
                            </div>

                            <div class="result-value">
                                {{ $address->town_romaji }},
                                {{ $address->city_romaji }},
                                {{ $address->prefecture_romaji }}
                            </div>

                        </div>


                        <!-- 海外向け住所 -->
                        <div class="result-row">

                            <div class="result-label">
                                海外向け住所
                            </div>

                            <div
                                class="international-address"
                                id="address-search-{{ $address->id }}"
                            >

                                {{ $address->international_town }},
                                {{ $address->international_city }}<br>

                                {{ $address->international_prefecture }}<br>

                                {{ $address->formatted_postal_code }}<br>

                                Japan

                                <button
                                    type="button"
                                    class="copy-button"
                                    onclick="copyAddress('address-search-{{ $address->id }}')"
                                >
                                    コピー
                                </button>

                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                <p class="no-result">
                    住所が見つかりませんでした。
                </p>

            @endif

        </div>

    @endif

</div>


<!-- ============================================================
     CSV一括変換
     ============================================================ -->
<div class="feature-card">

    <h2>
        住所を一括変換
    </h2>

    <p class="csv-description">
        CSVファイルをアップロードすると、
        複数の住所をまとめて海外向け住所に変換できます。
        現在は最大10件まで変換できます。
    </p>


    <!-- CSV形式の例 -->
    <div class="csv-example">

        <p class="csv-example-title">
            CSV形式の例
        </p>

        <pre>郵便番号,住所

060-0041,北海道札幌市中央区大通東
080-0111,北海道河東郡音更町木野大通東</pre>

    </div>


    <!-- CSVアップロード -->
    <form
        action="{{ secure_url('/convert-csv') }}"
        method="POST"
        enctype="multipart/form-data"
        class="csv-upload-form"
    >

        @csrf

        <input
            type="file"
            name="csv_file"
            accept=".csv,.txt"
            class="csv-file-input"
            required
        >

        <button
            type="submit"
            class="csv-upload-button"
        >
            CSVを変換
        </button>

    </form>


    <!-- CSV変換結果 -->
    @if (isset($csvResults))

        <div class="result-area">

            <div class="csv-result-header">

                <p
                    class="result-title"
                    style="margin: 0;"
                >
                    変換結果
                </p>

                <p class="csv-result-count">
                    {{ $csvCount }}件
                </p>

            </div>


            @if (count($csvResults) > 0)

                <!-- CSV結果テーブル -->
                <div class="csv-table-wrapper">

                    <table class="csv-table">

                        <thead>

                            <tr>

                                <th>
                                    郵便番号
                                </th>

                                <th>
                                    日本語住所
                                </th>

                                <th>
                                    海外向け住所
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($csvResults as $index => $result)

                                <tr>

                                    <td>
                                        {{ $result['postal_code'] ?? '' }}
                                    </td>

                                    <td>
                                        {{ $result['address'] ?? '' }}
                                    </td>

                                    <td>
                                        {{ $result['international_address'] ?? '' }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                <!-- CSVダウンロード -->
                <form
                    action="{{ secure_url('/download-csv') }}"
                    method="POST"
                    class="csv-download-form"
                >

                    @csrf

                    @foreach ($csvResults as $index => $result)

                        <input
                            type="hidden"
                            name="results[{{ $index }}][postal_code]"
                            value="{{ $result['postal_code'] ?? '' }}"
                        >

                        <input
                            type="hidden"
                            name="results[{{ $index }}][address]"
                            value="{{ $result['address'] ?? '' }}"
                        >

                        <input
                            type="hidden"
                            name="results[{{ $index }}][international_address]"
                            value="{{ $result['international_address'] ?? '' }}"
                        >

                    @endforeach

                    <button
                        type="submit"
                        class="csv-download-button"
                    >
                        CSVをダウンロード
                    </button>

                </form>

            @else

                <p class="no-result">
                    変換できる住所がありませんでした。
                </p>

            @endif

        </div>

    @endif

</div>


<!-- ============================================================
     フッター
     ============================================================ -->
<footer class="site-footer">

    <div class="footer-links">

        <a href="{{ secure_url('/terms') }}">
            利用規約
        </a>

        <span>
            ｜
        </span>

        <a href="{{ secure_url('/privacy') }}">
            プライバシーポリシー
        </a>

        <span>
            ｜
        </span>

        <a href="{{ secure_url('/contact') }}">
            お問い合わせ
        </a>

    </div>

    <p class="copyright">
        © {{ date('Y') }} 日本住所変換ツール
    </p>

</footer>

</div>

<!-- ============================================================
     JavaScript
     ============================================================ -->

<script>

    function copyAddress(id) {

        const element = document.getElementById(id);

        if (!element) {
            return;
        }

        const text = element.innerText.trim();

        navigator.clipboard.writeText(text)
            .then(function () {

                alert(
                    '住所をコピーしました。'
                );

            })
            .catch(function () {

                alert(
                    'コピーに失敗しました。'
                );

            });

    }

</script>

</body>

</html>
