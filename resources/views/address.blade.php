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

    <!-- Structured Data -->
    <script type="application/ld+json">
    @json([
        '@context' => 'https://schema.org',
        '@type' => 'WebApplication',
        'name' => '日本住所英語変換',
        'url' => secure_url('/'),
        'description' => '日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。',
        'applicationCategory' => 'UtilitiesApplication',
        'operatingSystem' => 'Web Browser',
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    </script>

    <style>

        /* =========================================================
           Base
        ========================================================= */

        :root {
            --primary: #111827;
            --primary-hover: #000000;

            --accent: #16856f;
            --accent-light: #eaf7f3;
            --accent-border: #bfe7dc;

            --background: #f5f7f8;
            --card: #ffffff;

            --text: #17202a;
            --text-secondary: #667085;
            --text-light: #98a2b3;

            --border: #e4e7ec;
            --danger: #d92d20;
            --success: #16856f;

            --radius: 18px;
            --radius-small: 12px;

            --shadow:
                0 8px 30px rgba(16, 24, 40, 0.06);

            --shadow-hover:
                0 12px 35px rgba(16, 24, 40, 0.10);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;

            background: var(--background);
            color: var(--text);

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

        .container {
            width: min(900px, calc(100% - 32px));
            margin: 0 auto;
        }


        /* =========================================================
           Header
        ========================================================= */

        .site-header {
            padding: 48px 0 26px;
            text-align: center;
        }

        .brand-icon {
            width: 58px;
            height: 58px;

            margin: 0 auto 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 18px;

            background: var(--accent-light);

            font-size: 29px;

            box-shadow:
                0 6px 20px rgba(22, 133, 111, 0.08);
        }

        .site-title {
            margin: 0;

            font-size: clamp(27px, 4vw, 38px);
            line-height: 1.3;

            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .site-description {
            max-width: 620px;

            margin: 12px auto 0;

            color: var(--text-secondary);

            font-size: 15px;
        }


        /* =========================================================
           Ad Area
        ========================================================= */

        .ad-area {
            width: 100%;

            margin: 22px 0;

            padding: 8px 0;
        }

        .adsense-slot {
            width: 100%;
            min-height: 90px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #b0b7c3;

            font-size: 11px;

            overflow: hidden;
        }


        /* =========================================================
           Main Card
        ========================================================= */

        .main-card {
            background: var(--card);

            border: 1px solid var(--border);

            border-radius: var(--radius);

            box-shadow: var(--shadow);

            overflow: hidden;
        }


        /* =========================================================
           Tabs
        ========================================================= */

        .tabs-wrapper {
            padding: 8px;

            border-bottom: 1px solid var(--border);

            background: #fafbfc;
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

        .tab-button {
            flex: 1 0 auto;

            min-height: 48px;

            padding: 10px 18px;

            border: 0;
            border-radius: 12px;

            background: transparent;

            color: var(--text-secondary);

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;

            white-space: nowrap;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.15s ease;
        }

        .tab-button:hover {
            background: #f0f2f4;
        }

        .tab-button:active {
            transform: scale(0.98);
        }

        .tab-button.active {
            background: #ffffff;

            color: var(--text);

            box-shadow:
                0 2px 8px rgba(16, 24, 40, 0.08);
        }


        /* =========================================================
           Panels
        ========================================================= */

        .tab-panel {
            display: none;

            padding: 32px;
        }

        .tab-panel.active {
            display: block;
        }

        .panel-heading {
            margin-bottom: 22px;
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
           Form
        ========================================================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            font-size: 14px;
            font-weight: 700;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;

            min-height: 54px;

            padding: 13px 16px;

            border: 1px solid #d0d5dd;

            border-radius: 13px;

            outline: none;

            background: #ffffff;

            color: var(--text);

            font-size: 16px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .form-input::placeholder {
            color: #a7adb7;
        }

        .form-input:focus {
            border-color: var(--accent);

            box-shadow:
                0 0 0 4px rgba(22, 133, 111, 0.10);
        }

        textarea.form-input {
            min-height: 120px;

            resize: vertical;
        }

        .input-help {
            margin-top: 7px;

            color: var(--text-light);

            font-size: 12px;
        }


        /* =========================================================
           Buttons
        ========================================================= */

        .primary-button {
            width: 100%;

            min-height: 54px;

            padding: 13px 20px;

            border: 0;

            border-radius: 13px;

            background: var(--primary);

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
            background: var(--primary-hover);

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
           Error
        ========================================================= */

        .error-message {
            margin: 0 0 22px;

            padding: 14px 16px;

            border: 1px solid #f3b4ae;

            border-radius: 12px;

            background: #fff5f4;

            color: var(--danger);

            font-size: 14px;
            font-weight: 600;
        }


        /* =========================================================
           Results
        ========================================================= */

        .results-section {
            margin-top: 26px;

            padding-top: 26px;

            border-top: 1px solid var(--border);
        }

        .results-heading {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 12px;

            margin-bottom: 14px;
        }

        .results-title {
            margin: 0;

            font-size: 17px;
            font-weight: 800;
        }

        .result-count {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 28px;
            height: 28px;

            padding: 0 8px;

            border-radius: 99px;

            background: var(--accent-light);

            color: var(--accent);

            font-size: 12px;
            font-weight: 800;
        }

        .result-card {
            position: relative;

            margin-bottom: 14px;

            padding: 18px;

            border: 1px solid var(--border);

            border-radius: 14px;

            background: #ffffff;

            transition:
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .result-card:hover {
            border-color: #d8dde5;

            box-shadow: var(--shadow-hover);
        }

        .result-card:last-child {
            margin-bottom: 0;
        }

        .result-label {
            margin-bottom: 5px;

            color: var(--text-light);

            font-size: 11px;
            font-weight: 800;

            letter-spacing: 0.04em;
        }

        .result-japanese {
            margin-bottom: 15px;

            font-size: 14px;
            font-weight: 600;

            word-break: break-all;
        }

        .result-romaji {
            margin-bottom: 15px;

            color: var(--text-secondary);

            font-size: 13px;

            word-break: break-word;
        }

        .international-box {
            padding: 14px;

            border-radius: 12px;

            background: var(--accent-light);

            border: 1px solid var(--accent-border);
        }

        .international-address {
            color: #145f51;

            font-size: 15px;
            font-weight: 700;

            line-height: 1.65;

            word-break: break-word;
        }

        .copy-button {
            width: 100%;

            min-height: 46px;

            margin-top: 13px;

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
            border-color: var(--accent);

            background: var(--accent);

            color: #ffffff;
        }


        /* =========================================================
           CSV
        ========================================================= */

        .csv-info {
            margin-bottom: 20px;

            padding: 15px;

            border-radius: 13px;

            background: #f8fafc;

            border: 1px solid var(--border);
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
        }

        .csv-example {
            margin-top: 12px;

            padding: 12px;

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

        .file-input-wrapper {
            position: relative;

            margin-bottom: 18px;
        }

        .file-input {
            width: 100%;

            padding: 13px;

            border: 1px dashed #b8c0ca;

            border-radius: 13px;

            background: #fafbfc;

            color: var(--text-secondary);

            cursor: pointer;

            font-size: 13px;
        }

        .file-input:hover {
            border-color: var(--accent);

            background: #f7fcfa;
        }

        .csv-result-wrapper {
            margin-top: 20px;

            overflow-x: auto;

            border: 1px solid var(--border);

            border-radius: 13px;
        }

        .csv-result-table {
            width: 100%;

            min-width: 650px;

            border-collapse: collapse;

            font-size: 13px;
        }

        .csv-result-table th {
            padding: 12px;

            background: #f8fafc;

            border-bottom: 1px solid var(--border);

            text-align: left;

            font-weight: 800;

            white-space: nowrap;
        }

        .csv-result-table td {
            padding: 12px;

            border-bottom: 1px solid var(--border);

            vertical-align: top;

            word-break: break-word;
        }

        .csv-result-table tr:last-child td {
            border-bottom: 0;
        }

        .csv-download {
            margin-top: 16px;
        }


        /* =========================================================
           Guide Section
        ========================================================= */

        .guide-section {
            margin-top: 28px;

            padding: 28px;

            border-radius: var(--radius);

            background: #ffffff;

            border: 1px solid var(--border);

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
        }


        /* =========================================================
           Footer
        ========================================================= */

        .site-footer {
            margin-top: 40px;

            padding: 30px 0 45px;

            text-align: center;

            color: var(--text-secondary);

            font-size: 12px;
        }

        .footer-links {
            display: flex;

            align-items: center;
            justify-content: center;

            flex-wrap: wrap;

            gap: 8px 20px;

            margin-bottom: 14px;
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
           Mobile
        ========================================================= */

        @media (max-width: 640px) {

            .container {
                width: min(100% - 20px, 900px);
            }

            .site-header {
                padding: 28px 0 18px;
            }

            .brand-icon {
                width: 50px;
                height: 50px;

                margin-bottom: 11px;

                border-radius: 15px;

                font-size: 25px;
            }

            .site-title {
                font-size: 27px;
            }

            .site-description {
                margin-top: 9px;

                padding: 0 8px;

                font-size: 13px;

                line-height: 1.65;
            }

            .ad-area {
                margin: 15px 0;
            }

            .adsense-slot {
                min-height: 70px;
            }

            .main-card {
                border-radius: 15px;
            }

            .tabs-wrapper {
                padding: 6px;
            }

            .tabs {
                gap: 4px;
            }

            .tab-button {
                min-height: 45px;

                padding: 8px 14px;

                font-size: 13px;
            }

            .tab-panel {
                padding: 23px 17px;
            }

            .panel-title {
                font-size: 19px;
            }

            .panel-description {
                font-size: 13px;
            }

            .form-input {
                min-height: 54px;

                padding: 13px 14px;

                font-size: 16px;
            }

            .primary-button {
                min-height: 54px;

                font-size: 15px;
            }

            .result-card {
                padding: 15px;
            }

            .international-address {
                font-size: 14px;
            }

            .guide-section {
                margin-top: 18px;

                padding: 22px 17px;

                border-radius: 15px;
            }

            .guide-title {
                font-size: 18px;
            }

            .site-footer {
                margin-top: 28px;

                padding-bottom: 35px;
            }

            .footer-links {
                gap: 10px 18px;
            }
        }


        /* =========================================================
           Very Small Devices
        ========================================================= */

        @media (max-width: 380px) {

            .container {
                width: calc(100% - 14px);
            }

            .site-title {
                font-size: 24px;
            }

            .tab-button {
                padding-left: 12px;
                padding-right: 12px;
            }

            .tab-panel {
                padding-left: 14px;
                padding-right: 14px;
            }
        }


        /* =========================================================
           Accessibility
        ========================================================= */

        :focus-visible {
            outline: 3px solid rgba(22, 133, 111, 0.25);

            outline-offset: 2px;
        }

    </style>
</head>


<body>

<div class="container">

    <!-- =========================================================
         Header
    ========================================================== -->

    <header class="site-header">

        <div class="brand-icon" aria-hidden="true">
            🇯🇵
        </div>

        <h1 class="site-title">
            日本住所英語変換
        </h1>

        <p class="site-description">
            郵便番号や日本語住所を入力するだけで、<br>
            海外向けの住所表記に簡単に変換できます。
        </p>

    </header>


    <!-- =========================================================
         Ad Area 1
    ========================================================== -->

    <div class="ad-area">

        <div class="adsense-slot">

            <!--
                Google AdSense 広告ユニットを使用する場合は、
                ここに Google から発行された広告コードを入れてください。
            -->

        </div>

    </div>


    <!-- =========================================================
         Main Tool
    ========================================================== -->

    <main class="main-card">


        <!-- Tabs -->

        <div class="tabs-wrapper">

            <div
                class="tabs"
                role="tablist"
                aria-label="住所変換方法"
            >

                <button
                    type="button"
                    class="tab-button active"
                    data-tab="postal"
                    role="tab"
                    aria-selected="true"
                >
                    郵便番号から変換
                </button>

                <button
                    type="button"
                    class="tab-button"
                    data-tab="address"
                    role="tab"
                    aria-selected="false"
                >
                    住所から変換
                </button>

                <button
                    type="button"
                    class="tab-button"
                    data-tab="csv"
                    role="tab"
                    aria-selected="false"
                >
                    CSV一括変換
                </button>

            </div>

        </div>


        <!-- =====================================================
             Postal Search
        ====================================================== -->

        <section
            id="tab-postal"
            class="tab-panel active"
            role="tabpanel"
        >

            <div class="panel-heading">

                <h2 class="panel-title">
                    郵便番号から変換
                </h2>

                <p class="panel-description">
                    7桁の郵便番号を入力してください。
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
                id="postalSearchForm"
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
                        class="form-input"
                        value="{{ old('postal_code', $postalCode ?? '') }}"
                        placeholder="060-0041"
                        inputmode="numeric"
                        autocomplete="postal-code"
                        maxlength="8"
                        enterkeyhint="search"
                        required
                    >

                    <div class="input-help">
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

                <div class="results-section">

                    <div class="results-heading">

                        <h3 class="results-title">
                            変換結果
                        </h3>

                        <span class="result-count">
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

                            <div class="international-box">

                                <div
                                    class="international-address"
                                    id="address-postal-{{ $index }}"
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
                                data-copy-target="address-postal-{{ $index }}"
                                onclick="copyAddress(this)"
                            >
                                コピー
                            </button>

                        </div>

                    @endforeach

                </div>

            @endif

        </section>


        <!-- =====================================================
             Address Search
        ====================================================== -->

        <section
            id="tab-address"
            class="tab-panel"
            role="tabpanel"
        >

            <div class="panel-heading">

                <h2 class="panel-title">
                    日本語住所から変換
                </h2>

                <p class="panel-description">
                    都道府県・市区町村・町名などを入力してください。
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
                id="addressSearchForm"
            >

                @csrf

                <div class="form-group">

                    <label
                        class="form-label"
                        for="input_address"
                    >
                        日本語住所
                    </label>

                    <input
                        type="text"
                        id="input_address"
                        name="address"
                        class="form-input"
                        value="{{ old('address', $inputAddress ?? '') }}"
                        placeholder="北海道札幌市中央区大通東"
                        autocomplete="street-address"
                        enterkeyhint="search"
                        required
                    >

                    <div class="input-help">
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

                <div class="results-section">

                    <div class="results-heading">

                        <h3 class="results-title">
                            変換結果
                        </h3>

                        <span class="result-count">
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

                            <div class="international-box">

                                <div
                                    class="international-address"
                                    id="address-search-{{ $index }}"
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
                                data-copy-target="address-search-{{ $index }}"
                                onclick="copyAddress(this)"
                            >
                                コピー
                            </button>

                        </div>

                    @endforeach

                </div>

            @endif

        </section>


        <!-- =====================================================
             CSV
        ====================================================== -->

        <section
            id="tab-csv"
            class="tab-panel"
            role="tabpanel"
        >

            <div class="panel-heading">

                <h2 class="panel-title">
                    CSV一括変換
                </h2>

                <p class="panel-description">
                    複数の住所をまとめて海外向け表記に変換できます。
                </p>

            </div>


            @if(session('csv_error'))

                <div class="error-message">
                    {{ session('csv_error') }}
                </div>

            @endif


            <div class="csv-info">

                <p class="csv-info-title">
                    📄 CSVファイルについて
                </p>

                <p class="csv-info-text">
                    最大10件まで変換できます。
                    CSVの1列目に郵便番号、2列目に住所を入力してください。
                </p>


                <div class="csv-example">郵便番号,住所
060-0041,北海道札幌市中央区大通東
080-0111,北海道河東郡音更町木野大通東</div>

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

                    <div class="file-input-wrapper">

                        <input
                            type="file"
                            id="csv_file"
                            name="csv_file"
                            class="file-input"
                            accept=".csv,.txt,text/csv,text/plain"
                            required
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="primary-button"
                    id="csvSubmitButton"
                >
                    📄 CSVを変換する
                </button>

            </form>


            @if(isset($csvResults) && count($csvResults) > 0)

                <div class="results-section">

                    <div class="results-heading">

                        <h3 class="results-title">
                            CSV変換結果
                        </h3>

                        <span class="result-count">
                            {{ $csvCount ?? count($csvResults) }}
                        </span>

                    </div>


                    <div class="csv-result-wrapper">

                        <table class="csv-result-table">

                            <thead>

                                <tr>
                                    <th>郵便番号</th>
                                    <th>日本語住所</th>
                                    <th>海外向け住所</th>
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
                        class="csv-download"
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


    <!-- =========================================================
         Ad Area 2
    ========================================================== -->

    <div class="ad-area">

        <div class="adsense-slot">

        </div>

    </div>


    <!-- =========================================================
         Guide / FAQ
    ========================================================== -->

    <section class="guide-section">

        <h2 class="guide-title">
            日本住所英語変換について
        </h2>


        <div class="guide-item">

            <h3 class="guide-question">
                郵便番号から住所を検索できますか？
            </h3>

            <p class="guide-answer">
                はい。7桁の郵便番号を入力すると、
                登録されている日本語住所を検索し、
                海外向けの英語表記に変換できます。
            </p>

        </div>


        <div class="guide-item">

            <h3 class="guide-question">
                「0600041」のようにハイフンなしでも入力できますか？
            </h3>

            <p class="guide-answer">
                はい。郵便番号は「060-0041」のようなハイフン付き、
                または「0600041」のようなハイフンなしでも入力できます。
            </p>

        </div>


        <div class="guide-item">

            <h3 class="guide-question">
                海外向け住所はどのように表示されますか？
            </h3>

            <p class="guide-answer">
                町名、市区町村、都道府県、郵便番号、Japan の順で、
                海外向けに利用しやすい形式で表示します。
            </p>

        </div>


        <div class="guide-item">

            <h3 class="guide-question">
                CSVを使ってまとめて変換できますか？
            </h3>

            <p class="guide-answer">
                はい。CSVファイルをアップロードすると、
                最大10件までまとめて変換できます。
            </p>

        </div>

    </section>


    <!-- =========================================================
         Ad Area 3
    ========================================================== -->

    <div class="ad-area">

        <div class="adsense-slot">

        </div>

    </div>


    <!-- =========================================================
         Footer
    ========================================================== -->

    <footer class="site-footer">

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


<!-- =============================================================
     JavaScript
============================================================= -->

<script>

    /* =========================================================
       Tab Switching
    ========================================================= */

    document.addEventListener('DOMContentLoaded', function () {

        const tabButtons =
            document.querySelectorAll('.tab-button');

        const tabPanels =
            document.querySelectorAll('.tab-panel');


        tabButtons.forEach(function (button) {

            button.addEventListener('click', function () {

                const target =
                    button.dataset.tab;


                tabButtons.forEach(function (item) {

                    item.classList.remove('active');

                    item.setAttribute(
                        'aria-selected',
                        'false'
                    );

                });


                tabPanels.forEach(function (panel) {

                    panel.classList.remove('active');

                });


                button.classList.add('active');

                button.setAttribute(
                    'aria-selected',
                    'true'
                );


                const targetPanel =
                    document.getElementById(
                        'tab-' + target
                    );


                if (targetPanel) {

                    targetPanel.classList.add('active');

                }

            });

        });


        /* =====================================================
           Postal Code Formatting
        ====================================================== */

        const postalInput =
            document.getElementById('postal_code');


        if (postalInput) {

            postalInput.addEventListener(
                'input',
                function () {

                    let value =
                        this.value.replace(/\D/g, '');

                    if (value.length > 7) {

                        value =
                            value.substring(0, 7);

                    }


                    if (value.length > 3) {

                        value =
                            value.substring(0, 3)
                            + '-'
                            + value.substring(3);

                    }


                    this.value = value;

                }
            );

        }


        /* =====================================================
           CSV Submit Loading
        ====================================================== */

        const csvForm =
            document.getElementById('csvForm');

        const csvSubmitButton =
            document.getElementById('csvSubmitButton');


        if (csvForm && csvSubmitButton) {

            csvForm.addEventListener(
                'submit',
                function () {

                    csvSubmitButton.disabled = true;

                    csvSubmitButton.textContent =
                        '変換しています…';

                }
            );

        }


        /* =====================================================
           Search Submit Loading
        ====================================================== */

        const postalForm =
            document.getElementById(
                'postalSearchForm'
            );


        if (postalForm) {

            postalForm.addEventListener(
                'submit',
                function () {

                    const button =
                        this.querySelector(
                            'button[type="submit"]'
                        );


                    if (button) {

                        button.disabled = true;

                        button.textContent =
                            '検索しています…';

                    }

                }
            );

        }


        const addressForm =
            document.getElementById(
                'addressSearchForm'
            );


        if (addressForm) {

            addressForm.addEventListener(
                'submit',
                function () {

                    const button =
                        this.querySelector(
                            'button[type="submit"]'
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
           Automatically Open Correct Tab
        ====================================================== */

        const searchType =
            @json($searchType ?? null);


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
       Activate Tab
    ========================================================= */

    function activateTab(target) {

        const buttons =
            document.querySelectorAll('.tab-button');

        const panels =
            document.querySelectorAll('.tab-panel');


        buttons.forEach(function (button) {

            const isActive =
                button.dataset.tab === target;

            button.classList.toggle(
                'active',
                isActive
            );

            button.setAttribute(
                'aria-selected',
                isActive ? 'true' : 'false'
            );

        });


        panels.forEach(function (panel) {

            panel.classList.toggle(
                'active',
                panel.id === 'tab-' + target
            );

        });

    }


    /* =========================================================
       Copy Address
    ========================================================= */

    async function copyAddress(button) {

        const targetId =
            button.dataset.copyTarget;

        const target =
            document.getElementById(targetId);


        if (!target) {

            return;

        }


        const text =
            target.innerText.trim();


        try {

            await navigator.clipboard.writeText(text);


            const originalText =
                button.dataset.originalText
                || button.textContent;


            button.dataset.originalText =
                originalText;


            button.classList.add('copied');

            button.textContent =
                '✓ コピーしました';


            setTimeout(function () {

                button.classList.remove('copied');

                button.textContent =
                    originalText;

            }, 1800);


        } catch (error) {

            /*
             * Clipboard API が利用できない環境向け
             */

            try {

                const textarea =
                    document.createElement('textarea');

                textarea.value = text;

                textarea.style.position =
                    'fixed';

                textarea.style.left =
                    '-9999px';

                document.body.appendChild(
                    textarea
                );

                textarea.select();

                document.execCommand(
                    'copy'
                );

                document.body.removeChild(
                    textarea
                );


                const originalText =
                    button.dataset.originalText
                    || button.textContent;


                button.dataset.originalText =
                    originalText;


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


            } catch (fallbackError) {

                alert(
                    'コピーできませんでした。住所を手動でコピーしてください。'
                );

            }

        }

    }

</script>

</body>

</html>