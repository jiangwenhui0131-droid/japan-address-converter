<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png.png') }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        日本住所英語変換｜郵便番号・住所を英語表記に変換
    </title>

    <meta
        name="description"
        content="日本の郵便番号や住所を英語表記に変換できる無料のオンライン住所変換ツールです。CSV一括変換にも対応しています。"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <link
        rel="canonical"
        href="{{ secure_url('/') }}"
    >

    <!-- OGP -->
    <meta
        property="og:title"
        content="日本住所英語変換｜郵便番号・住所を英語表記に変換"
    >

    <meta
        property="og:description"
        content="日本の郵便番号や住所を英語表記に変換できる無料オンラインツール"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:url"
        content="{{ secure_url('/') }}"
    >

    <!-- Twitter -->
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
        content="日本の郵便番号や住所を英語表記に変換できる無料オンラインツール"
    >

    <!-- Google AdSense -->
    <script
        async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9772041946026515"
        crossorigin="anonymous"
    ></script>


    <style>

        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;

            --background: #f8fafc;
            --card: #ffffff;

            --text: #1e293b;
            --text-secondary: #64748b;

            --border: #e2e8f0;

            --success: #16a34a;
            --danger: #dc2626;

            --radius: 12px;

            --shadow:
                0 4px 20px rgba(15, 23, 42, 0.08);
        }


        * {
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;

            background: var(--background);

            color: var(--text);

            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                "Hiragino Kaku Gothic ProN",
                "Hiragino Sans",
                Meiryo,
                sans-serif;

            line-height: 1.6;
        }


        a {
            color: inherit;

            text-decoration: none;
        }


        button,
        input,
        select,
        textarea {
            font: inherit;
        }


        .container {
            width: min(1100px, calc(100% - 32px));

            margin: 0 auto;
        }


        /* =========================
           Header
           ========================= */

        header {
            background: #ffffff;

            border-bottom: 1px solid var(--border);

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .header-inner {
            min-height: 76px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        .brand {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .brand-flag {
            font-size: 32px;
        }


        .brand-title {
            font-size: 20px;

            font-weight: 800;

            line-height: 1.3;
        }


        .brand-subtitle {
            color: var(--text-secondary);

            font-size: 12px;
        }


        .language-select {
            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 8px 12px;

            background: #ffffff;

            color: var(--text);

            cursor: pointer;
        }


        /* =========================
           Main
           ========================= */

        main {
            padding: 40px 0 70px;
        }


        .hero {
            text-align: center;

            margin-bottom: 32px;
        }


        .hero h1 {
            margin: 0 0 10px;

            font-size: clamp(26px, 4vw, 38px);

            line-height: 1.3;

            font-weight: 800;
        }


        .hero p {
            margin: 0;

            color: var(--text-secondary);

            font-size: 15px;
        }


        /* =========================
           Card
           ========================= */

        .card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            padding: 28px;
        }


        /* =========================
           Tabs
           ========================= */

        .tabs {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 8px;

            margin-bottom: 28px;

            padding: 5px;

            background: #f1f5f9;

            border-radius: 10px;
        }


        .tab-button {
            border: 0;

            background: transparent;

            color: var(--text-secondary);

            padding: 12px 10px;

            border-radius: 8px;

            cursor: pointer;

            font-weight: 700;

            transition: 0.2s;
        }


        .tab-button:hover {
            color: var(--text);
        }


        .tab-button.active {
            background: #ffffff;

            color: var(--primary);

            box-shadow:
                0 1px 4px rgba(15, 23, 42, 0.08);
        }


        .tab-content {
            display: none;
        }


        .tab-content.active {
            display: block;
        }


        /* =========================
           Form
           ========================= */

        .form-group {
            margin-bottom: 18px;
        }


        .form-label {
            display: block;

            margin-bottom: 7px;

            font-size: 14px;

            font-weight: 700;
        }


        .form-control {
            width: 100%;

            border: 1px solid var(--border);

            border-radius: 9px;

            padding: 12px 14px;

            background: #ffffff;

            color: var(--text);

            outline: none;

            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }


        .form-control:focus {
            border-color: var(--primary);

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.12);
        }


        .btn-primary {
            width: 100%;

            border: 0;

            border-radius: 9px;

            padding: 13px 18px;

            background: var(--primary);

            color: #ffffff;

            cursor: pointer;

            font-weight: 700;

            transition: background 0.2s;
        }


        .btn-primary:hover {
            background: var(--primary-hover);
        }


        .btn-primary:disabled {
            opacity: 0.6;

            cursor: not-allowed;
        }


        /* =========================
           Search result
           ========================= */

        .result-box {
            margin-top: 28px;

            padding-top: 28px;

            border-top: 1px solid var(--border);
        }


        .result-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            margin-bottom: 15px;
        }


        .result-header h2 {
            margin: 0;

            font-size: 19px;
        }


        .result-count {
            display: inline-flex;

            align-items: center;

            padding: 4px 9px;

            border-radius: 999px;

            background: #eff6ff;

            color: var(--primary);

            font-size: 12px;

            font-weight: 700;
        }


        /* =========================
           Address result
           ========================= */

        .address-result {
            padding: 18px;

            border: 1px solid var(--border);

            border-radius: 10px;

            background: #f8fafc;
        }


        .address-result-row {
            margin-bottom: 12px;
        }


        .address-result-row:last-child {
            margin-bottom: 0;
        }


        .address-label {
            display: block;

            margin-bottom: 4px;

            color: var(--text-secondary);

            font-size: 12px;

            font-weight: 700;
        }


        .address-value {
            word-break: break-word;

            font-size: 15px;
        }


        .copy-button {
            margin-top: 12px;

            border: 1px solid var(--border);

            border-radius: 8px;

            padding: 8px 14px;

            background: #ffffff;

            color: var(--text);

            cursor: pointer;

            font-size: 13px;

            font-weight: 700;
        }


        .copy-button:hover {
            background: #f8fafc;
        }


        /* =========================
           CSV table
           ========================= */

        .table-scroll {
            width: 100%;

            overflow-x: auto;

            border: 1px solid var(--border);

            border-radius: 10px;

            background: #ffffff;
        }


        .csv-table {
            width: 100%;

            min-width: 700px;

            border-collapse: collapse;
        }


        .csv-table th {
            padding: 12px;

            background: #f8fafc;

            border-bottom: 1px solid var(--border);

            color: var(--text-secondary);

            text-align: left;

            font-size: 13px;

            font-weight: 700;

            white-space: nowrap;
        }


        .csv-table td {
            padding: 12px;

            border-bottom: 1px solid var(--border);

            font-size: 13px;

            vertical-align: top;
        }


        .csv-table tbody tr:last-child td {
            border-bottom: 0;
        }


        .csv-table td:nth-child(1) {
            width: 130px;

            white-space: nowrap;
        }


        /* =========================
           CSV 毛玻璃区域
           ========================= */

        .csv-preview-blur {
            position: relative;

            height: 150px;

            overflow: hidden;

            border-top: 1px solid var(--border);

            background:
                linear-gradient(
                    to bottom,
                    rgba(255, 255, 255, 0.25),
                    rgba(255, 255, 255, 0.95)
                );
        }


        /*
         * 模拟后面还有很多数据。
         * 这里不是真实数据，所以不会泄露第 6 件以后的内容。
         */
        .csv-preview-blur-lines {
            position: absolute;

            top: 10px;

            left: 0;

            right: 0;

            z-index: 1;
        }


        .csv-preview-blur-line {
            height: 34px;

            margin: 0 12px 5px;

            border-radius: 6px;

            background:
                linear-gradient(
                    90deg,
                    rgba(100, 116, 139, 0.18) 0%,
                    rgba(148, 163, 184, 0.12) 35%,
                    rgba(100, 116, 139, 0.18) 70%,
                    rgba(148, 163, 184, 0.10) 100%
                );

            filter: blur(5px);
        }


        /*
         * 真正的毛玻璃覆盖层
         */
        .csv-preview-blur::before {
            content: "";

            position: absolute;

            inset: 0;

            z-index: 2;

            backdrop-filter: blur(9px);

            -webkit-backdrop-filter: blur(9px);

            background:
                rgba(255, 255, 255, 0.58);
        }


        /*
         * 中间提示文字
         */
        .csv-preview-blur-message {
            position: absolute;

            z-index: 3;

            top: 50%;

            left: 50%;

            transform:
                translate(-50%, -50%);

            width: 90%;

            text-align: center;

            color: var(--text-secondary);

            font-size: 13px;

            font-weight: 700;

            line-height: 1.7;

            pointer-events: none;
        }


        /* =========================
           Download
           ========================= */

        .download-area {
            margin-top: 18px;

            text-align: center;
        }


        .download-area .btn-primary {
            width: auto;

            min-width: 220px;
        }


        /* =========================
           CSV description
           ========================= */

        .csv-description {
            margin-bottom: 18px;

            padding: 14px 16px;

            border-radius: 9px;

            background: #eff6ff;

            color: #1e40af;

            font-size: 13px;

            line-height: 1.7;
        }


        .csv-limit-message {
            margin-top: 12px;

            color: var(--text-secondary);

            font-size: 13px;
        }


        /* =========================
           Ad
           ========================= */

        .ad-area {
            min-height: 90px;

            margin: 28px 0;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .adsense-slot {
            width: 100%;

            min-height: 90px;
        }


        /* =========================
           Error
           ========================= */

        .error-message {
            margin-bottom: 18px;

            padding: 12px 14px;

            border: 1px solid #fecaca;

            border-radius: 9px;

            background: #fef2f2;

            color: var(--danger);

            font-size: 13px;
        }


        /* =========================
           Footer
           ========================= */

        footer {
            padding: 30px 0;

            border-top: 1px solid var(--border);

            background: #ffffff;
        }


        .footer-inner {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        .footer-links {
            display: flex;

            flex-wrap: wrap;

            gap: 16px;

            color: var(--text-secondary);

            font-size: 13px;
        }


        .footer-links a:hover {
            color: var(--primary);
        }


        .copyright {
            color: var(--text-secondary);

            font-size: 12px;
        }


        /* =========================
           Mobile
           ========================= */

        @media (max-width: 700px) {

            .container {
                width: min(
                    100% - 20px,
                    1100px
                );
            }


            main {
                padding-top: 25px;
            }


            .header-inner {
                min-height: 68px;
            }


            .brand-title {
                font-size: 16px;
            }


            .brand-subtitle {
                font-size: 10px;
            }


            .brand-flag {
                font-size: 26px;
            }


            .language-select {
                padding: 7px 8px;

                font-size: 12px;
            }


            .card {
                padding: 18px;
            }


            .tabs {
                grid-template-columns: 1fr;

                gap: 4px;
            }


            .tab-button {
                padding: 10px;
            }


            .hero h1 {
                font-size: 26px;
            }


            .hero p {
                font-size: 13px;
            }


            .footer-inner {
                flex-direction: column;

                align-items: flex-start;
            }


            .download-area .btn-primary {
                width: 100%;
            }


            .csv-preview-blur {
                height: 145px;
            }

        }

    </style>

</head>


<body>


<header>

    <div class="container header-inner">

        <a
            href="{{ secure_url('/') }}"
            class="brand"
        >

            <div class="brand-flag">
                🇯🇵
            </div>

            <div>

                <div class="brand-title">
                    日本住所英語変換
                </div>

                <div class="brand-subtitle">
                    郵便番号・住所を英語表記に変換
                </div>

            </div>

        </a>


        <select
            id="languageSelect"
            class="language-select"
            aria-label="Language"
        >

            <option value="ja">
                日本語
            </option>

            <option value="en">
                English
            </option>

            <option value="zh">
                中文
            </option>

            <option value="ko">
                한국어
            </option>

            <option value="vi">
                Tiếng Việt
            </option>

        </select>

    </div>

</header>


<main>

    <div class="container">


        <section class="hero">

            <h1>
                日本住所英語変換
            </h1>

            <p>
                郵便番号・日本語住所を英語表記に変換できます
            </p>

        </section>


        <div class="card">


            <!-- Tabs -->

            <div class="tabs">

                <button
                    type="button"
                    class="tab-button active"
                    data-tab="postal"
                >
                    📮 郵便番号検索
                </button>


                <button
                    type="button"
                    class="tab-button"
                    data-tab="address"
                >
                    🏠 住所検索
                </button>


                <button
                    type="button"
                    class="tab-button"
                    data-tab="csv"
                >
                    📄 CSV一括変換
                </button>

            </div>



            <!-- =========================
                 郵便番号検索
                 ========================= -->

            <div
                id="postal"
                class="tab-content active"
            >

                <form
                    method="POST"
                    action="{{ secure_url('/search') }}"
                    id="postalForm"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            class="form-label"
                            for="postal_code"
                        >
                            郵便番号
                        </label>


                        <input
                            type="text"
                            id="postal_code"
                            name="postal_code"
                            class="form-control"
                            placeholder="例：100-0001"
                            maxlength="8"
                            inputmode="numeric"
                            autocomplete="postal-code"
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn-primary"
                    >
                        🔍 検索する
                    </button>

                </form>


                @if(isset($postalResults) && count($postalResults) > 0)

                    <div class="result-box">

                        <div class="result-header">

                            <h2>
                                検索結果
                            </h2>

                        </div>


                        @foreach($postalResults as $result)

                            <div class="address-result">

                                <div class="address-result-row">

                                    <span class="address-label">
                                        日本語住所
                                    </span>

                                    <div class="address-value">
                                        {{ $result['address'] ?? '' }}
                                    </div>

                                </div>


                                <div class="address-result-row">

                                    <span class="address-label">
                                        英語表記
                                    </span>

                                    <div class="address-value">
                                        {{ $result['international_address'] ?? '' }}
                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="copy-button"
                                    onclick="copyAddress(this)"
                                    data-copy="{{ $result['international_address'] ?? '' }}"
                                >
                                    📋 コピー
                                </button>

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>



            <!-- =========================
                 住所検索
                 ========================= -->

            <div
                id="address"
                class="tab-content"
            >

                <form
                    method="POST"
                    action="{{ secure_url('/search-address') }}"
                    id="addressForm"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            class="form-label"
                            for="address_input"
                        >
                            日本語住所
                        </label>


                        <input
                            type="text"
                            id="address_input"
                            name="address"
                            class="form-control"
                            placeholder="例：東京都千代田区千代田1-1"
                            autocomplete="street-address"
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn-primary"
                    >
                        🔍 住所を検索
                    </button>

                </form>


                @if(isset($addressResults) && count($addressResults) > 0)

                    <div class="result-box">

                        <div class="result-header">

                            <h2>
                                検索結果
                            </h2>

                        </div>


                        @foreach($addressResults as $result)

                            <div class="address-result">

                                <div class="address-result-row">

                                    <span class="address-label">
                                        日本語住所
                                    </span>

                                    <div class="address-value">
                                        {{ $result['address'] ?? '' }}
                                    </div>

                                </div>


                                <div class="address-result-row">

                                    <span class="address-label">
                                        英語表記
                                    </span>

                                    <div class="address-value">
                                        {{ $result['international_address'] ?? '' }}
                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="copy-button"
                                    onclick="copyAddress(this)"
                                    data-copy="{{ $result['international_address'] ?? '' }}"
                                >
                                    📋 コピー
                                </button>

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>



            <!-- =========================
                 CSV一括変換
                 ========================= -->

            <div
                id="csv"
                class="tab-content"
            >


                <div class="csv-description">

                    CSVファイルをアップロードして、
                    日本の住所を英語表記へ一括変換できます。

                    <br>

                    <strong>
                        CSV一括変換は100件まで無料です。
                        101件以上の変換については、有料サービスをご利用ください。
                    </strong>

                </div>


                <form
                    method="POST"
                    action="{{ secure_url('/convert-csv') }}"
                    enctype="multipart/form-data"
                    id="csvForm"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            class="form-label"
                            for="csv_file"
                        >
                            CSVファイル
                        </label>


                        <input
                            type="file"
                            id="csv_file"
                            name="csv_file"
                            class="form-control"
                            accept=".csv,text/csv"
                            required
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn-primary"
                    >
                        📄 CSVを変換
                    </button>

                </form>



                @if(isset($csvResults) && count($csvResults) > 0)

                    <!-- =========================
                         CSV変換結果
                         ========================= -->

                    <div class="result-box">


                        <div class="result-header">

                            <h2>
                                CSV変換結果
                            </h2>


                            <span class="result-count">

                                @if(isset($csvCount))

                                    {{ $csvCount }}件

                                @else

                                    {{ count($csvResults) }}件

                                @endif

                            </span>

                        </div>



                        <!--
                            ここでは全データを表示しない。
                            最初の5件だけ実際に表示する。
                        -->

                        <div class="table-scroll">


                            <table class="csv-table">


                                <thead>

                                    <tr>

                                        <th>
                                            郵便番号
                                        </th>

                                        <th>
                                            住所
                                        </th>

                                        <th>
                                            英語表記
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>


                                    @foreach($csvResults as $index => $result)

                                        @if($index < 5)

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

                                        @endif

                                    @endforeach


                                </tbody>

                            </table>



                            <!-- =========================
                                 6件目以降：毛玻璃
                                 ========================= -->

                            @if(count($csvResults) > 5)

                                <div class="csv-preview-blur">


                                    <div class="csv-preview-blur-lines">

                                        <div class="csv-preview-blur-line"></div>

                                        <div class="csv-preview-blur-line"></div>

                                        <div class="csv-preview-blur-line"></div>

                                        <div class="csv-preview-blur-line"></div>

                                    </div>


                                    <div class="csv-preview-blur-message">

                                        残り
                                        {{ count($csvResults) - 5 }}
                                        件のデータは省略して表示しています。

                                        <br>

                                        ダウンロードすると
                                        すべてのデータを取得できます。

                                    </div>


                                </div>

                            @endif


                        </div>



                        <!-- =========================
                             CSVダウンロード
                             ========================= -->

                        <form
                            method="POST"
                            action="{{ secure_url('/download-csv') }}"
                            class="download-area"
                        >

                            @csrf


                            <!--
                                注意：
                                ここは全データを送るため、
                                5件に制限しない。
                            -->

                            @foreach($csvResults as $index => $result)

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
                                class="btn-primary"
                            >
                                ⬇️ CSVをダウンロード
                            </button>

                        </form>


                    </div>

                @endif


            </div>


        </div>



        <!-- =========================
             AdSense
             ========================= -->

        <div class="ad-area">

            <ins
                class="adsbygoogle adsense-slot"
                style="display:block"
                data-ad-client="ca-pub-9772041946026515"
                data-ad-format="auto"
                data-full-width-responsive="true"
            ></ins>

        </div>


    </div>

</main>



<!-- =========================
     Footer
     ========================= -->

<footer>

    <div class="container footer-inner">


        <div class="footer-links">

            <a href="{{ secure_url('/about') }}">
                About
            </a>


            <a href="{{ secure_url('/privacy') }}">
                Privacy Policy
            </a>


            <a href="{{ secure_url('/terms') }}">
                Terms
            </a>


            <a href="{{ secure_url('/contact') }}">
                Contact
            </a>


            <a href="{{ secure_url('/cooperation') }}">
                Cooperation
            </a>

        </div>


        <div class="copyright">

            © {{ date('Y') }} Japan Address Converter

        </div>


    </div>

</footer>



<script>

    /* =========================
       Tab切替
       ========================= */

    document
        .querySelectorAll('.tab-button')
        .forEach(function(button) {

            button.addEventListener(
                'click',
                function() {

                    const tabName =
                        this.dataset.tab;


                    document
                        .querySelectorAll('.tab-button')
                        .forEach(function(btn) {

                            btn.classList.remove(
                                'active'
                            );

                        });


                    document
                        .querySelectorAll('.tab-content')
                        .forEach(function(content) {

                            content.classList.remove(
                                'active'
                            );

                        });


                    this.classList.add(
                        'active'
                    );


                    const target =
                        document.getElementById(
                            tabName
                        );


                    if (target) {

                        target.classList.add(
                            'active'
                        );

                    }

                }
            );

        });



    /* =========================
       郵便番号格式
       ========================= */

    const postalInput =
        document.getElementById(
            'postal_code'
        );


    if (postalInput) {

        postalInput.addEventListener(
            'input',
            function() {

                let value =
                    this.value.replace(
                        /[^0-9]/g,
                        ''
                    );


                if (value.length > 3) {

                    value =
                        value.substring(0, 3)
                        + '-'
                        + value.substring(3, 7);

                }


                this.value =
                    value;

            }
        );

    }



    /* =========================
       Copy
       ========================= */

    function copyAddress(button) {

        const text =
            button.dataset.copy || '';


        if (!text) {

            return;

        }


        navigator
            .clipboard
            .writeText(text)
            .then(function() {

                const original =
                    button.innerText;


                button.innerText =
                    '✓ コピーしました';


                setTimeout(
                    function() {

                        button.innerText =
                            original;

                    },
                    1500
                );

            })
            .catch(function() {

                alert(
                    'コピーに失敗しました。'
                );

            });

    }



    /* =========================
       Form Loading
       ========================= */

    function setupLoading(formId) {

        const form =
            document.getElementById(
                formId
            );


        if (!form) {

            return;

        }


        form.addEventListener(
            'submit',
            function() {

                const button =
                    form.querySelector(
                        'button[type="submit"]'
                    );


                if (!button) {

                    return;

                }


                button.disabled =
                    true;


                button.dataset.originalText =
                    button.innerText;


                button.innerText =
                    '処理中...';

            }
        );

    }


    setupLoading(
        'postalForm'
    );


    setupLoading(
        'addressForm'
    );


    setupLoading(
        'csvForm'
    );



    /* =========================
       CSVファイルチェック
       ========================= */

    const csvFile =
        document.getElementById(
            'csv_file'
        );


    if (csvFile) {

        csvFile.addEventListener(
            'change',
            function() {

                const file =
                    this.files[0];


                if (!file) {

                    return;

                }


                const fileName =
                    file.name.toLowerCase();


                if (
                    !fileName.endsWith(
                        '.csv'
                    )
                ) {

                    alert(
                        'CSVファイルを選択してください。'
                    );


                    this.value =
                        '';

                }

            }
        );

    }



    /* =========================
       Language
       ========================= */

    const translations = {

        ja: {

            title:
                '日本住所英語変換',

            subtitle:
                '郵便番号・日本語住所を英語表記に変換できます'

        },


        en: {

            title:
                'Japan Address Converter',

            subtitle:
                'Convert Japanese postal codes and addresses into English format'

        },


        zh: {

            title:
                '日本地址英文转换',

            subtitle:
                '将日本邮政编码和地址转换为英文格式'

        },


        ko: {

            title:
                '일본 주소 영어 변환',

            subtitle:
                '일본 우편번호와 주소를 영어 형식으로 변환합니다'

        },


        vi: {

            title:
                'Chuyển đổi địa chỉ Nhật Bản',

            subtitle:
                'Chuyển đổi mã bưu chính và địa chỉ Nhật Bản sang tiếng Anh'

        }

    };


    const languageSelect =
        document.getElementById(
            'languageSelect'
        );


    if (languageSelect) {

        languageSelect.addEventListener(
            'change',
            function() {

                const lang =
                    this.value;


                const data =
                    translations[lang];


                if (!data) {

                    return;

                }


                const brandTitle =
                    document.querySelector(
                        '.brand-title'
                    );


                const brandSubtitle =
                    document.querySelector(
                        '.brand-subtitle'
                    );


                const heroTitle =
                    document.querySelector(
                        '.hero h1'
                    );


                const heroSubtitle =
                    document.querySelector(
                        '.hero p'
                    );


                if (brandTitle) {

                    brandTitle.innerText =
                        data.title;

                }


                if (brandSubtitle) {

                    brandSubtitle.innerText =
                        data.subtitle;

                }


                if (heroTitle) {

                    heroTitle.innerText =
                        data.title;

                }


                if (heroSubtitle) {

                    heroSubtitle.innerText =
                        data.subtitle;

                }

            }
        );

    }



    /* =========================
       AdSense
       ========================= */

    try {

        (
            adsbygoogle =
                window.adsbygoogle || []
        ).push({});

    } catch (e) {

        console.log(e);

    }

</script>


</body>

</html>