<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <title>日本住所英語変換｜郵便番号・住所を英語表記に変換</title>

    <meta
        name="description"
        content="日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。郵便番号検索、住所検索、CSV一括変換に対応しています。"
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
        content="日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。"
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
        content="日本住所英語変換"
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
        content="日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。"
    >

    <!-- Google AdSense -->

    <script
        async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9772041946026515"
        crossorigin="anonymous"
    ></script>


    <style>

        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html {
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;

            background: #f5f7f8;

            color: #17202a;

            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Helvetica Neue",
                "Hiragino Kaku Gothic ProN",
                "Hiragino Sans",
                "Yu Gothic",
                "YuGothic",
                Meiryo,
                Arial,
                sans-serif;

            line-height: 1.7;

            -webkit-text-size-adjust: 100%;
        }

        button,
        input,
        textarea {
            font: inherit;
        }

        button {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            color: inherit;
        }


        /* =========================================================
           VARIABLES
        ========================================================= */

        :root {

            --black: #111827;
            --black-hover: #000000;

            --green: #16856f;
            --green-dark: #126c5b;

            --green-light: #eaf7f3;

            --background: #f5f7f8;

            --white: #ffffff;

            --text: #17202a;
            --text-secondary: #667085;
            --text-light: #98a2b3;

            --border: #e4e7ec;

            --danger: #d92d20;

            --radius-large: 20px;
            --radius: 15px;
            --radius-small: 11px;

            --shadow:
                0 8px 30px rgba(16, 24, 40, 0.06);
        }


        /* =========================================================
           LAYOUT
        ========================================================= */

        .page {
            width: 100%;
        }

        .container {
            width: min(900px, calc(100% - 32px));

            margin: 0 auto;
        }


        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            padding: 50px 0 28px;

            text-align: center;
        }

        .logo {
            width: 64px;
            height: 64px;

            margin: 0 auto 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: var(--green-light);

            font-size: 32px;

            box-shadow:
                0 8px 24px rgba(22, 133, 111, 0.08);
        }

        .title {
            margin: 0;

            color: var(--text);

            font-size: clamp(28px, 5vw, 40px);

            font-weight: 800;

            line-height: 1.3;

            letter-spacing: -0.035em;
        }

        .subtitle {
            max-width: 620px;

            margin: 13px auto 0;

            color: var(--text-secondary);

            font-size: 15px;

            line-height: 1.7;
        }


        /* =========================================================
           AD
        ========================================================= */

        .ad-area {
            width: 100%;

            margin: 18px 0;
        }

        .adsense-slot {
            width: 100%;

            min-height: 90px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }


        /* =========================================================
           TOOL CARD
        ========================================================= */

        .tool-card {
            overflow: hidden;

            background: var(--white);

            border: 1px solid var(--border);

            border-radius: var(--radius-large);

            box-shadow: var(--shadow);
        }


        /* =========================================================
           TABS
        ========================================================= */

        .tabs-area {
            padding: 8px;

            background: #fafbfc;

            border-bottom: 1px solid var(--border);
        }

        .tabs {
            display: flex;

            gap: 6px;

            overflow-x: auto;

            scrollbar-width: none;
        }

        .tabs::-webkit-scrollbar {
            display: none;
        }

        .tab {
            flex: 1 0 auto;

            min-height: 48px;

            padding: 10px 18px;

            border: 0;

            border-radius: 12px;

            background: transparent;

            color: var(--text-secondary);

            font-size: 14px;

            font-weight: 700;

            white-space: nowrap;

            cursor: pointer;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.15s ease;
        }

        .tab:hover {
            background: #f0f2f4;
        }

        .tab:active {
            transform: scale(0.98);
        }

        .tab.active {
            background: var(--white);

            color: var(--text);

            box-shadow:
                0 2px 8px rgba(16, 24, 40, 0.08);
        }


        /* =========================================================
           PANEL
        ========================================================= */

        .panel {
            display: none;

            padding: 34px;
        }

        .panel.active {
            display: block;
        }

        .panel-header {
            margin-bottom: 23px;
        }

        .panel-title {
            margin: 0 0 5px;

            font-size: 21px;

            font-weight: 800;

            line-height: 1.4;
        }

        .panel-description {
            margin: 0;

            color: var(--text-secondary);

            font-size: 14px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        .form-group {
            margin-bottom: 18px;
        }

        .label {
            display: block;

            margin-bottom: 8px;

            font-size: 14px;

            font-weight: 700;
        }

        .input {
            display: block;

            width: 100%;

            min-height: 55px;

            padding: 13px 15px;

            border: 1px solid #d0d5dd;

            border-radius: 13px;

            background: #ffffff;

            color: var(--text);

            outline: none;

            font-size: 16px;

            line-height: 1.5;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .input::placeholder {
            color: #a7adb7;
        }

        .input:focus {
            border-color: var(--green);

            box-shadow:
                0 0 0 4px rgba(22, 133, 111, 0.10);
        }

        .help {
            margin-top: 7px;

            color: var(--text-light);

            font-size: 12px;
        }


        /* =========================================================
           PRIMARY BUTTON
        ========================================================= */

        .primary-button {
            width: 100%;

            min-height: 55px;

            padding: 13px 20px;

            border: 0;

            border-radius: 13px;

            background: var(--black);

            color: #ffffff;

            font-size: 15px;

            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 5px 15px rgba(17, 24, 39, 0.14);

            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        .primary-button:hover {
            background: var(--black-hover);

            box-shadow:
                0 8px 20px rgba(17, 24, 39, 0.18);
        }

        .primary-button:active {
            transform: translateY(1px);
        }

        .primary-button:disabled {
            opacity: 0.6;

            cursor: not-allowed;
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error-message {
            margin-bottom: 20px;

            padding: 13px 15px;

            border: 1px solid #f3b4ae;

            border-radius: 12px;

            background: #fff5f4;

            color: var(--danger);

            font-size: 13px;

            font-weight: 600;
        }


        /* =========================================================
           RESULTS
        ========================================================= */

        .results {
            margin-top: 28px;

            padding-top: 26px;

            border-top: 1px solid var(--border);
        }

        .results-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-bottom: 14px;
        }

        .results-title {
            margin: 0;

            font-size: 18px;

            font-weight: 800;
        }

        .count {
            min-width: 28px;
            height: 28px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 8px;

            border-radius: 999px;

            background: var(--green-light);

            color: var(--green);

            font-size: 12px;

            font-weight: 800;
        }


        /* =========================================================
           RESULT CARD
        ========================================================= */

        .result-card {
            margin-bottom: 14px;

            padding: 18px;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 15px;
        }

        .result-card:last-child {
            margin-bottom: 0;
        }

        .result-label {
            margin-bottom: 5px;

            color: var(--text-light);

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 0.05em;
        }

        .result-japanese {
            margin-bottom: 16px;

            color: var(--text);

            font-size: 14px;

            font-weight: 600;

            word-break: break-all;
        }

        .result-romaji {
            margin-bottom: 16px;

            color: var(--text-secondary);

            font-size: 13px;

            word-break: break-word;
        }

        .international {
            padding: 15px;

            background: var(--green-light);

            border: 1px solid #bfe7dc;

            border-radius: 12px;
        }

        .international-address {
            color: var(--green-dark);

            font-size: 15px;

            font-weight: 700;

            line-height: 1.7;

            word-break: break-word;
        }

        .copy-button {
            width: 100%;

            min-height: 47px;

            margin-top: 12px;

            padding: 10px 14px;

            border: 1px solid #d0d5dd;

            border-radius: 11px;

            background: #ffffff;

            color: var(--text);

            font-size: 14px;

            font-weight: 800;

            cursor: pointer;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                color 0.2s ease;
        }

        .copy-button:hover {
            background: #f8fafc;

            border-color: #aeb5bf;
        }

        .copy-button.copied {
            background: var(--green);

            border-color: var(--green);

            color: #ffffff;
        }


        /* =========================================================
           CSV INFO
        ========================================================= */

        .csv-info {
            margin-bottom: 20px;

            padding: 16px;

            background: #f8fafc;

            border: 1px solid var(--border);

            border-radius: 13px;
        }

        .csv-info-title {
            margin: 0 0 5px;

            font-size: 14px;

            font-weight: 800;
        }

        .csv-info-text {
            margin: 0;

            color: var(--text-secondary);

            font-size: 12px;

            line-height: 1.7;
        }

        .csv-example {
            margin-top: 12px;

            padding: 13px;

            overflow-x: auto;

            border-radius: 10px;

            background: #111827;

            color: #e5e7eb;

            font-family:
                ui-monospace,
                SFMono-Regular,
                Menlo,
                Monaco,
                Consolas,
                monospace;

            font-size: 11px;

            line-height: 1.7;

            white-space: pre;
        }


        /* =========================================================
           FILE INPUT
        ========================================================= */

        .file-input {
            display: block;

            width: 100%;

            padding: 15px;

            border: 1px dashed #b8c0ca;

            border-radius: 13px;

            background: #fafbfc;

            color: var(--text-secondary);

            font-size: 13px;

            cursor: pointer;
        }

        .file-input:hover {
            border-color: var(--green);

            background: #f7fcfa;
        }


        /* =========================================================
           CSV TABLE
        ========================================================= */

        .table-scroll {
            margin-top: 20px;

            overflow-x: auto;

            border: 1px solid var(--border);

            border-radius: 13px;

            -webkit-overflow-scrolling: touch;
        }

        .csv-table {
            width: 100%;

            min-width: 650px;

            border-collapse: collapse;

            font-size: 13px;
        }

        .csv-table th {
            padding: 12px;

            background: #f8fafc;

            border-bottom: 1px solid var(--border);

            text-align: left;

            font-weight: 800;

            white-space: nowrap;
        }

        .csv-table td {
            padding: 12px;

            border-bottom: 1px solid var(--border);

            vertical-align: top;

            word-break: break-word;
        }

        .csv-table tr:last-child td {
            border-bottom: 0;
        }

        .download-area {
            margin-top: 16px;
        }


        /* =========================================================
           GUIDE
        ========================================================= */

        .guide {
            margin-top: 28px;

            padding: 30px;

            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: var(--radius-large);

            box-shadow: var(--shadow);
        }

        .guide-title {
            margin: 0 0 18px;

            font-size: 20px;

            font-weight: 800;
        }

        .guide-item {
            padding: 15px 0;

            border-bottom: 1px solid var(--border);
        }

        .guide-item:last-child {
            border-bottom: 0;

            padding-bottom: 0;
        }

        .guide-question {
            margin: 0 0 6px;

            font-size: 14px;

            font-weight: 800;
        }

        .guide-answer {
            margin: 0;

            color: var(--text-secondary);

            font-size: 13px;

            line-height: 1.8;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            padding: 35px 0 45px;

            text-align: center;

            color: var(--text-secondary);

            font-size: 12px;
        }

        .footer-links {
            display: flex;

            align-items: center;
            justify-content: center;

            flex-wrap: wrap;

            gap: 10px 22px;

            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-secondary);

            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--text);

            text-decoration: underline;
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 640px) {

            .container {
                width: calc(100% - 20px);
            }

            .header {
                padding: 28px 0 18px;
            }

            .logo {
                width: 52px;
                height: 52px;

                margin-bottom: 12px;

                border-radius: 16px;

                font-size: 26px;
            }

            .title {
                font-size: 28px;
            }

            .subtitle {
                margin-top: 9px;

                padding: 0 6px;

                font-size: 13px;

                line-height: 1.7;
            }

            .ad-area {
                margin: 12px 0;
            }

            .adsense-slot {
                min-height: 70px;
            }

            .tool-card {
                border-radius: 16px;
            }

            .tabs-area {
                padding: 6px;
            }

            .tab {
                min-height: 45px;

                padding: 8px 14px;

                font-size: 13px;
            }

            .panel {
                padding: 23px 17px;
            }

            .panel-title {
                font-size: 19px;
            }

            .panel-description {
                font-size: 13px;
            }

            .input {
                min-height: 55px;

                font-size: 16px;
            }

            .primary-button {
                min-height: 55px;
            }

            .result-card {
                padding: 15px;
            }

            .international-address {
                font-size: 14px;
            }

            .guide {
                margin-top: 18px;

                padding: 23px 17px;

                border-radius: 16px;
            }

            .guide-title {
                font-size: 18px;
            }

            .footer {
                padding: 28px 0 35px;
            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 380px) {

            .container {
                width: calc(100% - 14px);
            }

            .title {
                font-size: 25px;
            }

            .tab {
                padding-left: 12px;
                padding-right: 12px;
            }

            .panel {
                padding-left: 14px;
                padding-right: 14px;
            }

        }


        /* =========================================================
           ACCESSIBILITY
        ========================================================= */

        :focus-visible {
            outline: 3px solid rgba(22, 133, 111, 0.25);

            outline-offset: 2px;
        }

    </style>

</head>


<body>

<div class="page">

    <div class="container">


        <!-- =====================================================
             HEADER
        ====================================================== -->

        <header class="header">

            <div
                class="logo"
                aria-hidden="true"
            >
                🇯🇵
            </div>

            <h1 class="title">
                日本住所英語変換
            </h1>

            <p class="subtitle">
                郵便番号や日本語住所を入力するだけで、<br>
                海外向けの住所表記に簡単に変換できます。
            </p>

        </header>


        <!-- =====================================================
             ADVERTISEMENT 1
        ====================================================== -->

        <div class="ad-area">

            <div class="adsense-slot">

                <!--
                    Google AdSense 広告コードをここに配置できます。
                -->

            </div>

        </div>


        <!-- =====================================================
             TOOL
        ====================================================== -->

        <main class="tool-card">


            <!-- =================================================
                 TABS
            ================================================== -->

            <div class="tabs-area">

                <div
                    class="tabs"
                    role="tablist"
                    aria-label="住所変換方法"
                >

                    <button
                        type="button"
                        class="tab active"
                        data-tab="postal"
                        role="tab"
                        aria-selected="true"
                    >
                        郵便番号
                    </button>

                    <button
                        type="button"
                        class="tab"
                        data-tab="address"
                        role="tab"
                        aria-selected="false"
                    >
                        日本語住所
                    </button>

                    <button
                        type="button"
                        class="tab"
                        data-tab="csv"
                        role="tab"
                        aria-selected="false"
                    >
                        CSV一括
                    </button>

                </div>

            </div>


            <!-- =================================================
                 POSTAL
            ================================================== -->

            <section
                id="panel-postal"
                class="panel active"
                role="tabpanel"
            >

                <div class="panel-header">

                    <h2 class="panel-title">
                        郵便番号から変換
                    </h2>

                    <p class="panel-description">
                        郵便番号を入力すると住所を検索して変換します。
                    </p>

                </div>


                @if(session('search_error'))

                    <div class="error-message">
                        {{ session('search_error') }}
                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ secure_url('/search') }}"
                    id="postal-form"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            for="postal_code"
                            class="label"
                        >
                            郵便番号
                        </label>


                        <input
                            type="text"
                            id="postal_code"
                            name="postal_code"
                            class="input"
                            value="{{ old('postal_code', $postalCode ?? '') }}"
                            placeholder="060-0041"
                            inputmode="numeric"
                            autocomplete="postal-code"
                            maxlength="8"
                            enterkeyhint="search"
                            required
                        >


                        <div class="help">
                            例：060-0041 または 0600041
                        </div>

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                    >
                        🔍 変換する
                    </button>

                </form>


                @if(isset($addresses) && ($searchType ?? '') === 'postal')

                    <div class="results">

                        <div class="results-header">

                            <h3 class="results-title">
                                変換結果
                            </h3>

                            <span class="count">
                                {{ count($addresses) }}
                            </span>

                        </div>


                        @foreach($addresses as $index => $address)

                            <div class="result-card">


                                <div class="result-label">
                                    日本語住所
                                </div>

                                <div class="result-japanese">

                                    {{ $address->prefecture }}
                                    {{ $address->city }}
                                    {{ $address->town }}

                                </div>


                                <div class="result-label">
                                    ROMAJI
                                </div>

                                <div class="result-romaji">

                                    {{ $address->town_romaji }},
                                    {{ $address->city_romaji }},
                                    {{ $address->prefecture_romaji }}

                                </div>


                                <div class="result-label">
                                    海外向け住所
                                </div>

                                <div class="international">

                                    <div
                                        class="international-address"
                                        id="postal-result-{{ $index }}"
                                    >

                                        {{ $address->international_town }},
                                        {{ $address->international_city }},
                                        {{ $address->international_prefecture }},
                                        {{ $address->formatted_postal_code }},
                                        Japan

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="copy-button"
                                    data-target="postal-result-{{ $index }}"
                                    onclick="copyAddress(this)"
                                >
                                    コピー
                                </button>

                            </div>

                        @endforeach

                    </div>

                @endif

            </section>


            <!-- =================================================
                 ADDRESS
            ================================================== -->

            <section
                id="panel-address"
                class="panel"
                role="tabpanel"
            >

                <div class="panel-header">

                    <h2 class="panel-title">
                        日本語住所から変換
                    </h2>

                    <p class="panel-description">
                        日本語の住所を入力して海外向け表記に変換します。
                    </p>

                </div>


                @if(session('search_error'))

                    <div class="error-message">
                        {{ session('search_error') }}
                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ secure_url('/search-address') }}"
                    id="address-form"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            for="input_address"
                            class="label"
                        >
                            日本語住所
                        </label>


                        <input
                            type="text"
                            id="input_address"
                            name="address"
                            class="input"
                            value="{{ old('address', $inputAddress ?? '') }}"
                            placeholder="北海道札幌市中央区大通東"
                            autocomplete="street-address"
                            enterkeyhint="search"
                            required
                        >


                        <div class="help">
                            例：北海道札幌市中央区大通東
                        </div>

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                    >
                        🔍 住所を変換する
                    </button>

                </form>


                @if(isset($addresses) && ($searchType ?? '') === 'address')

                    <div class="results">

                        <div class="results-header">

                            <h3 class="results-title">
                                変換結果
                            </h3>

                            <span class="count">
                                {{ count($addresses) }}
                            </span>

                        </div>


                        @foreach($addresses as $index => $address)

                            <div class="result-card">


                                <div class="result-label">
                                    日本語住所
                                </div>

                                <div class="result-japanese">

                                    {{ $address->prefecture }}
                                    {{ $address->city }}
                                    {{ $address->town }}

                                </div>


                                <div class="result-label">
                                    ROMAJI
                                </div>

                                <div class="result-romaji">

                                    {{ $address->town_romaji }},
                                    {{ $address->city_romaji }},
                                    {{ $address->prefecture_romaji }}

                                </div>


                                <div class="result-label">
                                    海外向け住所
                                </div>

                                <div class="international">

                                    <div
                                        class="international-address"
                                        id="address-result-{{ $index }}"
                                    >

                                        {{ $address->international_town }},
                                        {{ $address->international_city }},
                                        {{ $address->international_prefecture }},
                                        {{ $address->formatted_postal_code }},
                                        Japan

                                    </div>

                                </div>


                                <button
                                    type="button"
                                    class="copy-button"
                                    data-target="address-result-{{ $index }}"
                                    onclick="copyAddress(this)"
                                >
                                    コピー
                                </button>

                            </div>

                        @endforeach

                    </div>

                @endif

            </section>


            <!-- =================================================
                 CSV
            ================================================== -->

            <section
                id="panel-csv"
                class="panel"
                role="tabpanel"
            >

                <div class="panel-header">

                    <h2 class="panel-title">
                        CSV一括変換
                    </h2>

                    <p class="panel-description">
                        複数の住所をまとめて変換できます。
                    </p>

                </div>


                @if(session('csv_error'))

                    <div class="error-message">
                        {{ session('csv_error') }}
                    </div>

                @endif


                <div class="csv-info">

                    <p class="csv-info-title">
                        📄 CSVファイルの形式
                    </p>

                    <p class="csv-info-text">
                        最大10件まで変換できます。
                        1列目に郵便番号、2列目に住所を入力してください。
                    </p>


                    <div class="csv-example">郵便番号,住所
060-0041,北海道札幌市中央区大通東
080-0111,北海道河東郡音更町木野大通東</div>

                </div>


                <form
                    method="POST"
                    action="{{ secure_url('/convert-csv') }}"
                    enctype="multipart/form-data"
                    id="csv-form"
                >

                    @csrf


                    <div class="form-group">

                        <label
                            for="csv_file"
                            class="label"
                        >
                            CSVファイル
                        </label>


                        <input
                            type="file"
                            id="csv_file"
                            name="csv_file"
                            class="file-input"
                            accept=".csv,.txt,text/csv,text/plain"
                            required
                        >

                    </div>


                    <button
                        type="submit"
                        class="primary-button"
                        id="csv-button"
                    >
                        📄 CSVを変換する
                    </button>

                </form>


                @if(isset($csvResults) && count($csvResults) > 0)

                    <div class="results">

                        <div class="results-header">

                            <h3 class="results-title">
                                CSV変換結果
                            </h3>

                            <span class="count">
                                {{ $csvCount ?? count($csvResults) }}
                            </span>

                        </div>


                        <div class="table-scroll">

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

                                    @foreach($csvResults as $result)

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
                            method="POST"
                            action="{{ secure_url('/download-csv') }}"
                            class="download-area"
                        >

                            @csrf


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
                                class="primary-button"
                            >
                                ⬇️ CSVをダウンロード
                            </button>

                        </form>

                    </div>

                @endif

            </section>

        </main>


        <!-- =====================================================
             ADVERTISEMENT 2
        ====================================================== -->

        <div class="ad-area">

            <div class="adsense-slot">

            </div>

        </div>


        <!-- =====================================================
             GUIDE
        ====================================================== -->

        <section class="guide">

            <h2 class="guide-title">
                日本住所英語変換の使い方
            </h2>


            <div class="guide-item">

                <h3 class="guide-question">
                    郵便番号から住所を変換する
                </h3>

                <p class="guide-answer">
                    郵便番号を入力して「変換する」を押してください。
                    日本語住所と海外向けの住所表記が表示されます。
                </p>

            </div>


            <div class="guide-item">

                <h3 class="guide-question">
                    ハイフンなしの郵便番号も使えますか？
                </h3>

                <p class="guide-answer">
                    はい。「060-0041」と「0600041」のどちらでも入力できます。
                </p>

            </div>


            <div class="guide-item">

                <h3 class="guide-question">
                    日本語住所から検索できますか？
                </h3>

                <p class="guide-answer">
                    はい。都道府県、市区町村、町名などの日本語住所を入力して検索できます。
                </p>

            </div>


            <div class="guide-item">

                <h3 class="guide-question">
                    CSVで一括変換できますか？
                </h3>

                <p class="guide-answer">
                    はい。CSVファイルをアップロードして、
                    最大10件の住所をまとめて変換できます。
                </p>

            </div>


            <div class="guide-item">

                <h3 class="guide-question">
                    変換した住所はコピーできますか？
                </h3>

                <p class="guide-answer">
                    変換結果の「コピー」ボタンを押すと、
                    海外向け住所をそのままコピーできます。
                </p>

            </div>

        </section>


        <!-- =====================================================
             ADVERTISEMENT 3
        ====================================================== -->

        <div class="ad-area">

            <div class="adsense-slot">

            </div>

        </div>


        <!-- =====================================================
             FOOTER
        ====================================================== -->

        <footer class="footer">

            <nav
                class="footer-links"
                aria-label="フッターナビゲーション"
            >

                <a href="{{ secure_url('/terms') }}">
                    利用規約
                </a>

                <a href="{{ secure_url('/privacy') }}">
                    プライバシーポリシー
                </a>

                <a href="{{ secure_url('/contact') }}">
                    お問い合わせ
                </a>

            </nav>


            <div>
                © {{ date('Y') }} 日本住所英語変換
            </div>

        </footer>


    </div>

</div>


<script>

    /* =========================================================
       TAB
    ========================================================= */

    document.addEventListener('DOMContentLoaded', function () {

        const tabs =
            document.querySelectorAll('.tab');

        const panels =
            document.querySelectorAll('.panel');


        tabs.forEach(function (tab) {

            tab.addEventListener('click', function () {

                const target =
                    tab.getAttribute('data-tab');


                tabs.forEach(function (item) {

                    item.classList.remove('active');

                    item.setAttribute(
                        'aria-selected',
                        'false'
                    );

                });


                panels.forEach(function (panel) {

                    panel.classList.remove('active');

                });


                tab.classList.add('active');

                tab.setAttribute(
                    'aria-selected',
                    'true'
                );


                const targetPanel =
                    document.getElementById(
                        'panel-' + target
                    );


                if (targetPanel) {

                    targetPanel.classList.add('active');

                }

            });

        });


        /* =====================================================
           POSTAL FORMAT
        ====================================================== */

        const postalInput =
            document.getElementById(
                'postal_code'
            );


        if (postalInput) {

            postalInput.addEventListener(
                'input',
                function () {

                    let value =
                        this.value.replace(
                            /\D/g,
                            ''
                        );


                    if (value.length > 7) {

                        value =
                            value.substring(
                                0,
                                7
                            );

                    }


                    if (value.length > 3) {

                        value =
                            value.substring(
                                0,
                                3
                            )
                            + '-'
                            + value.substring(3);

                    }


                    this.value = value;

                }
            );

        }


        /* =====================================================
           POSTAL FORM
        ====================================================== */

        const postalForm =
            document.getElementById(
                'postal-form'
            );


        if (postalForm) {

            postalForm.addEventListener(
                'submit',
                function () {

                    const button =
                        this.querySelector(
                            '.primary-button'
                        );


                    if (button) {

                        button.disabled = true;

                        button.textContent =
                            '検索しています…';

                    }

                }
            );

        }


        /* =====================================================
           ADDRESS FORM
        ====================================================== */

        const addressForm =
            document.getElementById(
                'address-form'
            );


        if (addressForm) {

            addressForm.addEventListener(
                'submit',
                function () {

                    const button =
                        this.querySelector(
                            '.primary-button'
                        );


                    if (button) {

                        button.disabled = true;

                        button.textContent =
                            '検索しています…';

                    }

                }
            );

        }


        /* =====================================================
           CSV FORM
        ====================================================== */

        const csvForm =
            document.getElementById(
                'csv-form'
            );


        if (csvForm) {

            csvForm.addEventListener(
                'submit',
                function () {

                    const button =
                        document.getElementById(
                            'csv-button'
                        );


                    if (button) {

                        button.disabled = true;

                        button.textContent =
                            '変換しています…';

                    }

                }
            );

        }


        /* =====================================================
           OPEN CURRENT RESULT TAB
        ====================================================== */

        const searchType =
            "{{ $searchType ?? '' }}";


        if (searchType === 'address') {

            activateTab('address');

        } else if (searchType === 'postal') {

            activateTab('postal');

        }


        @if(isset($csvResults) && count($csvResults) > 0)

            activateTab('csv');

        @endif

    });


    /* =========================================================
       ACTIVATE TAB
    ========================================================= */

    function activateTab(target) {

        const tabs =
            document.querySelectorAll('.tab');

        const panels =
            document.querySelectorAll('.panel');


        tabs.forEach(function (tab) {

            const active =
                tab.getAttribute('data-tab')
                === target;


            tab.classList.toggle(
                'active',
                active
            );


            tab.setAttribute(
                'aria-selected',
                active ? 'true' : 'false'
            );

        });


        panels.forEach(function (panel) {

            panel.classList.toggle(
                'active',
                panel.id === 'panel-' + target
            );

        });

    }


    /* =========================================================
       COPY ADDRESS
    ========================================================= */

    async function copyAddress(button) {

        const targetId =
            button.getAttribute(
                'data-target'
            );


        const target =
            document.getElementById(
                targetId
            );


        if (!target) {

            return;

        }


        const text =
            target.innerText.trim();


        const originalText =
            button.getAttribute(
                'data-original'
            )
            || button.textContent;


        button.setAttribute(
            'data-original',
            originalText
        );


        try {

            if (
                navigator.clipboard
                &&
                window.isSecureContext
            ) {

                await navigator.clipboard.writeText(
                    text
                );

            } else {

                copyFallback(text);

            }


            button.classList.add('copied');

            button.textContent =
                '✓ コピーしました';


            setTimeout(function () {

                button.classList.remove(
                    'copied'
                );

                button.textContent =
                    originalText;

            }, 1800);


        } catch (error) {

            try {

                copyFallback(text);


                button.classList.add(
                    'copied'
                );

                button.textContent =
                    '✓ コピーしました';


                setTimeout(function () {

                    button.classList.remove(
                        'copied'
                    );

                    button.textContent =
                        originalText;

                }, 1800);


            } catch (fallbackError) {

                alert(
                    'コピーできませんでした。'
                );

            }

        }

    }


    /* =========================================================
       COPY FALLBACK
    ========================================================= */

    function copyFallback(text) {

        const textarea =
            document.createElement(
                'textarea'
            );


        textarea.value = text;

        textarea.style.position =
            'fixed';

        textarea.style.top =
            '0';

        textarea.style.left =
            '-9999px';

        textarea.style.opacity =
            '0';


        document.body.appendChild(
            textarea
        );


        textarea.focus();

        textarea.select();


        const successful =
            document.execCommand(
                'copy'
            );


        document.body.removeChild(
            textarea
        );


        if (!successful) {

            throw new Error(
                'Copy failed'
            );

        }

    }

</script>


</body>

</html>