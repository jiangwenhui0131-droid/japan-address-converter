<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        日本住所変換ツール｜郵便番号・住所を英語表記に変換
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
        content="日本住所変換ツール｜郵便番号・住所を英語表記に変換"
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
        content="日本住所変換ツール｜郵便番号・住所を英語表記に変換"
    >

    <meta
        name="twitter:description"
        content="日本の郵便番号や住所を海外向けの英語表記に変換できます。"
    >

    <style>

        /*
         * ============================================================
         * 基本設定
         * ============================================================
         */

        * {
            box-sizing: border-box;
        }

        html {
            background: #f4f6f8;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f4f6f8;
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

        button,
        input {
            font-family: inherit;
        }

        /*
         * ============================================================
         * メイン
         * ============================================================
         */

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 50px 20px 30px;
        }

        /*
         * ============================================================
         * ヘッダー
         * ============================================================
         */

        .site-header {
            margin-bottom: 28px;
            text-align: center;
        }

        h1 {
            margin: 0 0 12px;
            color: #1f2933;
            font-size: 34px;
            font-weight: 700;
            line-height: 1.4;
            letter-spacing: 0.02em;
        }

        .description {
            max-width: 650px;
            margin: 0 auto;
            color: #68737d;
            font-size: 15px;
            line-height: 1.8;
        }

        /*
         * ============================================================
         * 広告エリア
         *
         * 将来 Google AdSense をここに入れる
         *
         * 広告がまだない状態でもページレイアウトが
         * 大きく崩れないようにしている。
         * ============================================================
         */

        .ad-area {
            width: 100%;
            margin: 0 auto 26px;
            text-align: center;
        }

        .ad-label {
            margin-bottom: 7px;
            color: #a0a6ac;
            font-size: 10px;
            line-height: 1.4;
            letter-spacing: 0.05em;
        }

        .adsense-slot {
            width: 100%;
            min-height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /*
         * ============================================================
         * エラー
         * ============================================================
         */

        .error-message {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #f0cccc;
            border-radius: 10px;
            background: #fff5f5;
            color: #b33;
            font-size: 14px;
            line-height: 1.7;
        }

        /*
         * ============================================================
         * 機能カード
         * ============================================================
         */

        .feature-card {
            margin-bottom: 24px;
            padding: 30px;
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 14px;
            box-shadow:
                0 4px 18px rgba(31, 41, 51, 0.06);
        }

        .feature-card h2 {
            margin: 0 0 20px;
            color: #202a33;
            font-size: 21px;
            font-weight: 700;
            line-height: 1.5;
        }

        /*
         * ============================================================
         * 検索フォーム
         * ============================================================
         */

        .search-form {
            display: flex;
            width: 100%;
            gap: 10px;
            align-items: stretch;
        }

        .search-form input[type="text"] {
            flex: 1;
            min-width: 0;
            height: 48px;
            padding: 0 15px;
            border: 1px solid #ccd2d8;
            border-radius: 8px;
            outline: none;
            background: #fff;
            color: #333;
            font-size: 16px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .search-form input[type="text"]:focus {
            border-color: #4b5563;
            box-shadow:
                0 0 0 3px rgba(75, 85, 99, 0.08);
        }

        .search-form input[type="text"]::placeholder {
            color: #a0a7ae;
        }

        .search-form button {
            flex-shrink: 0;
            height: 48px;
            min-width: 100px;
            padding: 0 24px;
            border: none;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition:
                background 0.2s ease,
                transform 0.1s ease;
        }

        .search-form button:hover {
            background: #3a3a3a;
        }

        .search-form button:active {
            transform: translateY(1px);
        }

        /*
         * ============================================================
         * 検索結果
         * ============================================================
         */

        .result-area {
            margin-top: 26px;
            padding-top: 24px;
            border-top: 1px solid #edf0f2;
        }

        .result-title {
            margin: 0 0 16px;
            color: #303942;
            font-size: 17px;
            font-weight: 700;
        }

        .result-card {
            margin-bottom: 14px;
            padding: 20px;
            border: 1px solid #e3e7ea;
            border-radius: 10px;
            background: #fafbfc;
        }

        .result-card:last-child {
            margin-bottom: 0;
        }

        .result-row {
            margin-bottom: 19px;
        }

        .result-row:last-child {
            margin-bottom: 0;
        }

        .result-label {
            margin-bottom: 7px;
            color: #727b84;
            font-size: 13px;
            font-weight: 700;
        }

        .result-value {
            color: #303942;
            font-size: 15px;
            line-height: 1.8;
            word-break: break-word;
        }

        /*
         * ============================================================
         * 海外向け住所
         * ============================================================
         */

        .international-address {
            position: relative;
            min-height: 110px;
            padding: 15px 115px 15px 15px;
            border: 1px solid #dfe4e8;
            border-radius: 8px;
            background: #fff;
            color: #252b31;
            font-size: 15px;
            line-height: 1.8;
            word-break: break-word;
        }

        .copy-button {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 36px;
            padding: 0 14px;
            border: 1px solid #d1d6da;
            border-radius: 7px;
            background: #fff;
            color: #333;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition:
                background 0.2s ease,
                border-color 0.2s ease;
        }

        .copy-button:hover {
            background: #f5f6f7;
            border-color: #b8bec4;
        }

        /*
         * ============================================================
         * 結果なし
         * ============================================================
         */

        .no-result {
            margin: 0;
            padding: 15px;
            border: 1px solid #e5e7e9;
            border-radius: 8px;
            background: #f8f9fa;
            color: #777;
            font-size: 14px;
            line-height: 1.7;
        }

        /*
         * ============================================================
         * CSV
         * ============================================================
         */

        .csv-description {
            margin: 0 0 18px;
            color: #68737d;
            font-size: 14px;
            line-height: 1.8;
        }

        .csv-example {
            margin: 0 0 20px;
            padding: 16px;
            border: 1px solid #e4e7ea;
            border-radius: 9px;
            background: #f7f8f9;
            overflow-x: auto;
        }

        .csv-example-title {
            margin: 0 0 9px;
            color: #555d65;
            font-size: 13px;
            font-weight: 700;
        }

        .csv-example pre {
            margin: 0;
            color: #454b52;
            font-family:
                ui-monospace,
                SFMono-Regular,
                Menlo,
                Monaco,
                Consolas,
                "Liberation Mono",
                "Courier New",
                monospace;
            font-size: 13px;
            line-height: 1.7;
            white-space: pre-wrap;
        }

        .csv-upload-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .csv-file-input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccd2d8;
            border-radius: 8px;
            background: #fff;
            color: #444;
            font-size: 14px;
        }

        .csv-upload-button {
            align-self: flex-start;
            height: 46px;
            padding: 0 24px;
            border: none;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition:
                background 0.2s ease,
                transform 0.1s ease;
        }

        .csv-upload-button:hover {
            background: #3a3a3a;
        }

        .csv-upload-button:active {
            transform: translateY(1px);
        }

        /*
         * ============================================================
         * CSV結果
         * ============================================================
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
            color: #737b83;
            font-size: 14px;
        }

        .csv-table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #dfe3e6;
            border-radius: 8px;
        }

        .csv-table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
            background: #fff;
        }

        .csv-table th,
        .csv-table td {
            padding: 13px;
            border-bottom: 1px solid #edf0f2;
            text-align: left;
            vertical-align: top;
            font-size: 13px;
            line-height: 1.6;
        }

        .csv-table th {
            background: #f7f8f9;
            color: #555d65;
            font-weight: 700;
            white-space: nowrap;
        }

        .csv-table td {
            color: #3f474f;
        }

        .csv-table tr:last-child td {
            border-bottom: none;
        }

        .csv-download-form {
            margin-top: 18px;
        }

        .csv-download-button {
            height: 46px;
            padding: 0 24px;
            border: none;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition:
                background 0.2s ease,
                transform 0.1s ease;
        }

        .csv-download-button:hover {
            background: #3a3a3a;
        }

        .csv-download-button:active {
            transform: translateY(1px);
        }

        /*
         * ============================================================
         * フッター
         * ============================================================
         */

        .site-footer {
            margin-top: 32px;
            padding: 25px 15px 10px;
            text-align: center;
            color: #888f96;
            font-size: 13px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #707880;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: #222;
            text-decoration: underline;
        }

        .copyright {
            margin: 12px 0 0;
            color: #a0a6ac;
            font-size: 12px;
        }

        /*
         * ============================================================
         * タブレット
         * ============================================================
         */

        @media (max-width: 768px) {

            .container {
                max-width: 720px;
                padding-top: 40px;
            }

            h1 {
                font-size: 30px;
            }

            .feature-card {
                padding: 26px;
            }

            .adsense-slot {
                min-height: 80px;
            }

        }

        /*
         * ============================================================
         * スマートフォン
         * ============================================================
         */

        @media (max-width: 600px) {

            .container {
                width: 100%;
                max-width: 100%;
                padding: 28px 12px 20px;
            }

            /*
             * ヘッダー
             */

            .site-header {
                margin-bottom: 24px;
                padding: 0 8px;
            }

            h1 {
                margin-bottom: 10px;
                font-size: 25px;
                line-height: 1.45;
            }

            .description {
                font-size: 14px;
                line-height: 1.7;
            }

            /*
             * 広告
             */

            .ad-area {
                margin-bottom: 20px;
            }

            .ad-label {
                font-size: 9px;
            }

            .adsense-slot {
                min-height: 70px;
            }

            /*
             * カード
             */

            .feature-card {
                margin-bottom: 16px;
                padding: 20px 16px;
                border-radius: 12px;
            }

            .feature-card h2 {
                margin-bottom: 17px;
                font-size: 19px;
            }

            /*
             * 検索フォーム
             */

            .search-form {
                flex-direction: column;
                gap: 10px;
            }

            .search-form input[type="text"] {
                width: 100%;
                height: 46px;
                font-size: 16px;
            }

            .search-form button {
                width: 100%;
                height: 46px;
                min-width: 0;
            }

            /*
             * 結果
             */

            .result-area {
                margin-top: 22px;
                padding-top: 20px;
            }

            .result-title {
                margin-bottom: 14px;
                font-size: 16px;
            }

            .result-card {
                padding: 16px;
                border-radius: 9px;
            }

            .result-row {
                margin-bottom: 17px;
            }

            .result-label {
                font-size: 12px;
            }

            .result-value {
                font-size: 14px;
                line-height: 1.75;
            }

            /*
             * 海外向け住所
             */

            .international-address {
                min-height: 0;
                padding: 14px 14px 58px;
                font-size: 14px;
                line-height: 1.8;
            }

            .copy-button {
                top: auto;
                right: 10px;
                bottom: 10px;
                width: calc(100% - 20px);
                height: 36px;
            }

            /*
             * CSV
             */

            .csv-description {
                font-size: 13px;
                line-height: 1.8;
            }

            .csv-example {
                padding: 13px;
            }

            .csv-example pre {
                font-size: 12px;
            }

            .csv-upload-form {
                gap: 12px;
            }

            .csv-file-input {
                padding: 10px;
                font-size: 13px;
            }

            .csv-upload-button {
                width: 100%;
                height: 46px;
            }

            .csv-result-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }

            .csv-table-wrapper {
                border-radius: 7px;
            }

            .csv-download-button {
                width: 100%;
                height: 46px;
            }

            /*
             * エラー
             */

            .error-message {
                margin-bottom: 16px;
                padding: 13px 14px;
                font-size: 13px;
            }

            /*
             * フッター
             */

            .site-footer {
                margin-top: 22px;
                padding: 18px 5px 8px;
            }

            .footer-links {
                gap: 3px;
                font-size: 12px;
                line-height: 1.8;
            }

            .copyright {
                margin-top: 10px;
                font-size: 11px;
            }

        }

        /*
         * ============================================================
         * 小型スマートフォン
         * ============================================================
         */

        @media (max-width: 380px) {

            .container {
                padding-left: 10px;
                padding-right: 10px;
            }

            h1 {
                font-size: 23px;
            }

            .feature-card {
                padding: 18px 14px;
            }

            .feature-card h2 {
                font-size: 18px;
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
         広告エリア①
         ヘッダー下
         ============================================================ -->

    <div class="ad-area">

        <div class="ad-label">
            広告
        </div>

        <div class="adsense-slot">

            <!--
                Google AdSense の広告コードを
                将来ここに入れる。

                例：

                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-XXXXXXXXXXXX"
                     data-ad-slot="XXXXXXXXXX"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            -->

        </div>

    </div>


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
         広告エリア②
         2つの検索機能の間
         ============================================================ -->

    <div class="ad-area">

        <div class="ad-label">
            広告
        </div>

        <div class="adsense-slot">

            <!--
                Google AdSense 広告コードを
                将来ここに入れる。
            -->

        </div>

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


        <div class="csv-example">

            <p class="csv-example-title">
                CSV形式の例
            </p>

            <pre>郵便番号,住所
060-0041,北海道札幌市中央区大通東
080-0111,北海道河東郡音更町木野大通東</pre>

        </div>


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
         広告エリア③
         CSVの下・フッターの上
         ============================================================ -->

    <div class="ad-area">

        <div class="ad-label">
            広告
        </div>

        <div class="adsense-slot">

            <!--
                Google AdSense 広告コードを
                将来ここに入れる。
            -->

        </div>

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

        if (
            navigator.clipboard &&
            navigator.clipboard.writeText
        ) {

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

        } else {

            alert(
                'このブラウザではコピー機能を利用できません。'
            );

        }

    }

</script>

</body>

</html>