<!DOCTYPE html>

<html lang="ja">

<head>

<meta charset="UTF-8">
<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

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
       LANGUAGE
    ========================================================= */

    .language-selector {
        display: flex;
        justify-content: center;
        margin-top: 18px;
    }

    .language-select {
        min-height: 38px;
        padding: 7px 12px;
        border: 1px solid var(--border);
        border-radius: 10px;
        background: #ffffff;
        color: var(--text-secondary);
        font-size: 13px;
        cursor: pointer;
        outline: none;
    }

    .language-select:focus {
        border-color: var(--green);
        box-shadow:
            0 0 0 3px rgba(22, 133, 111, 0.10);
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

        .language-select {
            max-width: 180px;
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


        <h1
            class="title"
            data-i18n="title"
        >
            日本住所英語変換
        </h1>


        <p
            class="subtitle"
            data-i18n="subtitle"
        >
            郵便番号や日本語住所を入力するだけで、<br>
            海外向けの住所表記に簡単に変換できます。
        </p>


        <!-- LANGUAGE -->

        <div class="language-selector">

            <select
                id="language-select"
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
                    data-i18n="postalTab"
                >
                    郵便番号
                </button>


                <button
                    type="button"
                    class="tab"
                    data-tab="address"
                    role="tab"
                    aria-selected="false"
                    data-i18n="addressTab"
                >
                    日本語住所
                </button>


                <button
                    type="button"
                    class="tab"
                    data-tab="csv"
                    role="tab"
                    aria-selected="false"
                    data-i18n="csvTab"
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

                <h2
                    class="panel-title"
                    data-i18n="postalTitle"
                >
                    郵便番号から変換
                </h2>


                <p
                    class="panel-description"
                    data-i18n="postalDescription"
                >
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
                        data-i18n="postalLabel"
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


                    <div
                        class="help"
                        data-i18n="postalHelp"
                    >
                        例：060-0041 または 0600041
                    </div>

                </div>


                <button
                    type="submit"
                    class="primary-button"
                    data-i18n="postalButton"
                >
                    🔍 変換する
                </button>

            </form>


            @if(isset($addresses) && ($searchType ?? '') === 'postal')

                <div
                    class="results"
                    id="postal-results"
                >

                    <div class="results-header">

                        <h3
                            class="results-title"
                            data-i18n="resultsTitle"
                        >
                            変換結果
                        </h3>


                        <span class="count">
                            {{ count($addresses) }}
                        </span>

                    </div>


                    @foreach($addresses as $index => $address)

                        <div class="result-card">

                            <div
                                class="result-label"
                                data-i18n="japaneseAddress"
                            >
                                日本語住所
                            </div>


                            <div class="result-japanese">

                                {{ $address->prefecture }}
                                {{ $address->city }}
                                {{ $address->town }}

                            </div>


                            <div
                                class="result-label"
                                data-i18n="romaji"
                            >
                                ROMAJI
                            </div>


                            <div class="result-romaji">

                                {{ $address->town_romaji }},
                                {{ $address->city_romaji }},
                                {{ $address->prefecture_romaji }}

                            </div>


                            <div
                                class="result-label"
                                data-i18n="internationalAddress"
                            >
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
                                data-i18n="copy"
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

                <h2
                    class="panel-title"
                    data-i18n="addressTitle"
                >
                    日本語住所から変換
                </h2>


                <p
                    class="panel-description"
                    data-i18n="addressDescription"
                >
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
                        data-i18n="addressLabel"
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


                    <div
                        class="help"
                        data-i18n="addressHelp"
                    >
                        例：北海道札幌市中央区大通東
                    </div>

                </div>


                <button
                    type="submit"
                    class="primary-button"
                    data-i18n="addressButton"
                >
                    🔍 住所を変換する
                </button>

            </form>


            @if(isset($addresses) && ($searchType ?? '') === 'address')

                <div
                    class="results"
                    id="address-results"
                >

                    <div class="results-header">

                        <h3
                            class="results-title"
                            data-i18n="resultsTitle"
                        >
                            変換結果
                        </h3>


                        <span class="count">
                            {{ count($addresses) }}
                        </span>

                    </div>


                    @foreach($addresses as $index => $address)

                        <div class="result-card">

                            <div
                                class="result-label"
                                data-i18n="japaneseAddress"
                            >
                                日本語住所
                            </div>


                            <div class="result-japanese">

                                {{ $address->prefecture }}
                                {{ $address->city }}
                                {{ $address->town }}

                            </div>


                            <div
                                class="result-label"
                                data-i18n="romaji"
                            >
                                ROMAJI
                            </div>


                            <div class="result-romaji">

                                {{ $address->town_romaji }},
                                {{ $address->city_romaji }},
                                {{ $address->prefecture_romaji }}

                            </div>


                            <div
                                class="result-label"
                                data-i18n="internationalAddress"
                            >
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
                                data-i18n="copy"
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

                <h2
                    class="panel-title"
                    data-i18n="csvTitle"
                >
                    CSV一括変換
                </h2>


                <p
                    class="panel-description"
                    data-i18n="csvDescription"
                >
                    複数の住所をまとめて変換できます。
                </p>

            </div>


            @if(session('csv_error'))

                <div class="error-message">
                    {{ session('csv_error') }}
                </div>

            @endif


            <div class="csv-info">

                <p
                    class="csv-info-title"
                    data-i18n="csvFormatTitle"
                >
                    📄 CSVファイルの形式
                </p>


                <p
                    class="csv-info-text"
                    data-i18n="csvFormatText"
                >
                    100件まで無料で変換できます。
                    101件以上の変換については、有料サービスをご利用ください。
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
                        data-i18n="csvFileLabel"
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
                    data-i18n="csvButton"
                >
                    📄 CSVを変換する
                </button>

            </form>


            @if(isset($csvResults) && count($csvResults) > 0)

                <div
                    class="results"
                    id="csv-results"
                >

                    <div class="results-header">

                        <h3
                            class="results-title"
                            data-i18n="csvResultsTitle"
                        >
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

                                    <th data-i18n="postalLabel">
                                        郵便番号
                                    </th>

                                    <th data-i18n="japaneseAddress">
                                        日本語住所
                                    </th>

                                    <th data-i18n="internationalAddress">
                                        海外向け住所
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach(array_slice($csvResults, 0, 5) as $result)

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


                    @if(($csvCount ?? count($csvResults)) > 5)

                        <p
                            style="text-align:center; margin:16px 0 0; color:#667085; font-size:13px;"
                        >
                            全 {{ $csvCount ?? count($csvResults) }} 件转换成功。画面には先頭5件のみ表示しています。
                        </p>

                    @endif


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
                            data-i18n="downloadCsv"
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

        <h2
            class="guide-title"
            data-i18n="guideTitle"
        >
            日本住所英語変換の使い方
        </h2>


        <div class="guide-item">

            <h3
                class="guide-question"
                data-i18n="guide1Question"
            >
                郵便番号から住所を変換する
            </h3>

            <p
                class="guide-answer"
                data-i18n="guide1Answer"
            >
                郵便番号を入力して「変換する」を押してください。
                日本語住所と海外向けの住所表記が表示されます。
            </p>

        </div>


        <div class="guide-item">

            <h3
                class="guide-question"
                data-i18n="guide2Question"
            >
                ハイフンなしの郵便番号も使えますか？
            </h3>

            <p
                class="guide-answer"
                data-i18n="guide2Answer"
            >
                はい。「060-0041」と「0600041」のどちらでも入力できます。
            </p>

        </div>


        <div class="guide-item">

            <h3
                class="guide-question"
                data-i18n="guide3Question"
            >
                日本語住所から検索できますか？
            </h3>

            <p
                class="guide-answer"
                data-i18n="guide3Answer"
            >
                はい。都道府県、市区町村、町名などの日本語住所を入力して検索できます。
            </p>

        </div>


        <div class="guide-item">

            <h3
                class="guide-question"
                data-i18n="guide4Question"
            >
                CSVで一括変換できますか？
            </h3>

            <p
                class="guide-answer"
                data-i18n="guide4Answer"
            >
                はい。CSVファイルをアップロードして、
                100件まで無料でまとめて変換できます。
                101件以上の変換については、有料サービスをご利用ください。
            </p>

        </div>


        <div class="guide-item">

            <h3
                class="guide-question"
                data-i18n="guide5Question"
            >
                変換した住所はコピーできますか？
            </h3>

            <p
                class="guide-answer"
                data-i18n="guide5Answer"
            >
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

            <a
                href="{{ secure_url('/terms') }}"
                data-i18n="terms"
            >
                利用規約
            </a>


            <a
                href="{{ secure_url('/privacy') }}"
                data-i18n="privacy"
            >
                プライバシーポリシー
            </a>


            <a
                href="{{ secure_url('/contact') }}"
                data-i18n="contact"
            >
                お問い合わせ
            </a>


            <a
                href="{{ secure_url('/about') }}"
                data-i18n="about"
            >
                運営者について
            </a>


            <a
                href="{{ secure_url('/cooperation') }}"
                data-i18n="cooperation"
            >
                協業・掲載について
            </a>

        </nav>


        <div>
            <span data-i18n="operator">
                運営者：Liuweijie
            </span>
        </div>


        <div>
            <span data-i18n="serviceName">
                サービス名：Japan Address Converter
            </span>
        </div>


        <div>
            <span data-i18n="operationType">
                運営形態：個人運営
            </span>
        </div>


        <div>

            <span data-i18n="contactLabel">
                連絡先：
            </span>

            <a href="mailto:jiangwenhui@gmail.com">
                jiangwenhui@gmail.com
            </a>

        </div>


        <div>
            © {{ date('Y') }}
            <span data-i18n="copyright">
                日本住所英語変換
            </span>
        </div>

    </footer>


</div>


</div>

<script>

    /* =========================================================
       LANGUAGE DATA
    ========================================================= */

    const translations = {

        ja: {

            title: '日本住所英語変換',

            subtitle:
                '郵便番号や日本語住所を入力するだけで、<br>海外向けの住所表記に簡単に変換できます。',

            postalTab: '郵便番号',
            addressTab: '日本語住所',
            csvTab: 'CSV一括',

            postalTitle: '郵便番号から変換',
            postalDescription:
                '郵便番号を入力すると住所を検索して変換します。',

            postalLabel: '郵便番号',
            postalHelp:
                '例：060-0041 または 0600041',

            postalButton: '🔍 変換する',

            addressTitle: '日本語住所から変換',
            addressDescription:
                '日本語の住所を入力して海外向け表記に変換します。',

            addressLabel: '日本語住所',
            addressHelp:
                '例：北海道札幌市中央区大通東',

            addressButton: '🔍 住所を変換する',

            resultsTitle: '変換結果',

            japaneseAddress: '日本語住所',
            romaji: 'ROMAJI',
            internationalAddress: '海外向け住所',

            copy: 'コピー',

            csvTitle: 'CSV一括変換',
            csvDescription:
                '複数の住所をまとめて変換できます。',

            csvFormatTitle:
                '📄 CSVファイルの形式',

            csvFormatText:
                '100件まで無料で変換できます。101件以上の変換については、有料サービスをご利用ください。1列目に郵便番号、2列目に住所を入力してください。',

            csvFileLabel: 'CSVファイル',

            csvButton:
                '📄 CSVを変換する',

            csvResultsTitle:
                'CSV変換結果',

            downloadCsv:
                '⬇️ CSVをダウンロード',

            guideTitle:
                '日本住所英語変換の使い方',

            guide1Question:
                '郵便番号から住所を変換する',

            guide1Answer:
                '郵便番号を入力して「変換する」を押してください。日本語住所と海外向けの住所表記が表示されます。',

            guide2Question:
                'ハイフンなしの郵便番号も使えますか？',

            guide2Answer:
                'はい。「060-0041」と「0600041」のどちらでも入力できます。',

            guide3Question:
                '日本語住所から検索できますか？',

            guide3Answer:
                'はい。都道府県、市区町村、町名などの日本語住所を入力して検索できます。',

            guide4Question:
                'CSVで一括変換できますか？',

            guide4Answer:
                'はい。CSVファイルをアップロードして、100件まで無料でまとめて変換できます。101件以上の変換については、有料サービスをご利用ください。',

            guide5Question:
                '変換した住所はコピーできますか？',

            guide5Answer:
                '変換結果の「コピー」ボタンを押すと、海外向け住所をそのままコピーできます。',

            terms: '利用規約',
            privacy: 'プライバシーポリシー',
            contact: 'お問い合わせ',
            about: '運営者について',
            cooperation: '協業・掲載について',

            operator:
                '運営者：Liuweijie',

            serviceName:
                'サービス名：Japan Address Converter',

            operationType:
                '運営形態：個人運営',

            contactLabel:
                '連絡先：',

            copyright:
                '日本住所英語変換',

            searching:
                '検索しています…',

            converting:
                '変換しています…',

            copied:
                '✓ コピーしました',

            copyFailed:
                'コピーできませんでした。'

        },


        en: {

            title: 'Japanese Address Converter',

            subtitle:
                'Convert Japanese postal codes and addresses into international address format.',

            postalTab: 'Postal Code',
            addressTab: 'Japanese Address',
            csvTab: 'CSV Batch',

            postalTitle: 'Convert from Postal Code',
            postalDescription:
                'Enter a Japanese postal code to search and convert the address.',

            postalLabel: 'Postal Code',
            postalHelp:
                'Example: 060-0041 or 0600041',

            postalButton: '🔍 Convert',

            addressTitle: 'Convert from Japanese Address',
            addressDescription:
                'Enter a Japanese address and convert it to international format.',

            addressLabel: 'Japanese Address',
            addressHelp:
                'Example: 北海道札幌市中央区大通東',

            addressButton: '🔍 Convert Address',

            resultsTitle: 'Conversion Result',

            japaneseAddress: 'Japanese Address',
            romaji: 'ROMAJI',
            internationalAddress: 'International Address',

            copy: 'Copy',

            csvTitle: 'CSV Batch Conversion',
            csvDescription:
                'Convert multiple addresses at once.',

            csvFormatTitle:
                '📄 CSV File Format',

            csvFormatText:
                'Up to 100 addresses are free. Converting more than 100 addresses requires a paid service. Enter the postal code in the first column and the address in the second column.',

            csvFileLabel: 'CSV File',

            csvButton:
                '📄 Convert CSV',

            csvResultsTitle:
                'CSV Conversion Results',

            downloadCsv:
                '⬇️ Download CSV',

            guideTitle:
                'How to Use Japanese Address Converter',

            guide1Question:
                'How do I convert an address from a postal code?',

            guide1Answer:
                'Enter a postal code and click "Convert". The Japanese address and international address format will be displayed.',

            guide2Question:
                'Can I enter a postal code without a hyphen?',

            guide2Answer:
                'Yes. Both "060-0041" and "0600041" are supported.',

            guide3Question:
                'Can I search using a Japanese address?',

            guide3Answer:
                'Yes. You can search using Japanese prefecture, city, ward, town, and other address information.',

            guide4Question:
                'Can I convert multiple addresses with CSV?',

            guide4Answer:
                'Yes. Upload a CSV file to convert up to 100 addresses for free. Converting more than 100 addresses requires a paid service.',

            guide5Question:
                'Can I copy the converted address?',

            guide5Answer:
                'Click the "Copy" button to copy the international address.',

            terms: 'Terms of Use',
            privacy: 'Privacy Policy',
            contact: 'Contact',
            about: 'About the Operator',
            cooperation: 'Cooperation & Listing',

            operator:
                'Operator: Liuweijie',

            serviceName:
                'Service: Japan Address Converter',

            operationType:
                'Operation: Individually operated',

            contactLabel:
                'Contact: ',

            copyright:
                'Japanese Address Converter',

            searching:
                'Searching…',

            converting:
                'Converting…',

            copied:
                '✓ Copied',

            copyFailed:
                'Unable to copy.'

        },


        zh: {

            title: '日本地址英文转换',

            subtitle:
                '输入日本邮编或日文地址，即可转换为适合海外使用的英文地址格式。',

            postalTab: '日本邮编',
            addressTab: '日本地址',
            csvTab: 'CSV 批量',

            postalTitle: '通过邮编转换',
            postalDescription:
                '输入日本邮政编码，搜索并转换对应地址。',

            postalLabel: '邮政编码',
            postalHelp:
                '例如：060-0041 或 0600041',

            postalButton: '🔍 转换',

            addressTitle: '通过日本地址转换',
            addressDescription:
                '输入日文地址，转换为适合海外使用的地址格式。',

            addressLabel: '日本地址',
            addressHelp:
                '例如：北海道札幌市中央区大通東',

            addressButton: '🔍 转换地址',

            resultsTitle: '转换结果',

            japaneseAddress: '日文地址',
            romaji: '罗马字',
            internationalAddress: '海外地址',

            copy: '复制',

            csvTitle: 'CSV 批量转换',
            csvDescription:
                '可以一次转换多个日本地址。',

            csvFormatTitle:
                '📄 CSV 文件格式',

            csvFormatText:
                '100 个地址以内免费转换。超过 100 个地址需要使用付费服务。第一列填写邮编，第二列填写地址。',

            csvFileLabel: 'CSV 文件',

            csvButton:
                '📄 转换 CSV',

            csvResultsTitle:
                'CSV 转换结果',

            downloadCsv:
                '⬇️ 下载 CSV',

            guideTitle:
                '日本地址英文转换使用方法',

            guide1Question:
                '如何通过邮编转换日本地址？',

            guide1Answer:
                '输入日本邮编并点击“转换”，即可显示日文地址以及海外使用的英文地址格式。',

            guide2Question:
                '可以输入不带连字符的邮编吗？',

            guide2Answer:
                '可以。“060-0041”和“0600041”两种格式都支持。',

            guide3Question:
                '可以通过日文地址搜索吗？',

            guide3Answer:
                '可以。可以输入都道府县、市区町村、町名等日文地址信息进行搜索。',

            guide4Question:
                '可以使用 CSV 批量转换吗？',

            guide4Answer:
                '可以。上传 CSV 文件后，可以一次免费转换最多 100 个地址。超过 100 个地址需要使用付费服务。',

            guide5Question:
                '可以复制转换后的地址吗？',

            guide5Answer:
                '点击“复制”按钮即可复制海外使用的英文地址。',

            terms: '使用条款',
            privacy: '隐私政策',
            contact: '联系我们',
            about: '关于运营者',
            cooperation: '合作与掲載',

            operator:
                '运营者：Liuweijie',

            serviceName:
                '服务名称：Japan Address Converter',

            operationType:
                '运营形式：个人运营',

            contactLabel:
                '联系方式：',

            copyright:
                '日本地址英文转换',

            searching:
                '正在搜索…',

            converting:
                '正在转换…',

            copied:
                '✓ 已复制',

            copyFailed:
                '复制失败。'

        },


        ko: {

            title: '일본 주소 영문 변환',

            subtitle:
                '일본 우편번호 또는 일본어 주소를 입력하여 해외용 영문 주소 형식으로 변환할 수 있습니다.',

            postalTab: '우편번호',
            addressTab: '일본 주소',
            csvTab: 'CSV 일괄',

            postalTitle: '우편번호로 변환',
            postalDescription:
                '일본 우편번호를 입력하면 주소를 검색하여 변환합니다.',

            postalLabel: '우편번호',
            postalHelp:
                '예: 060-0041 또는 0600041',

            postalButton: '🔍 변환',

            addressTitle: '일본어 주소로 변환',
            addressDescription:
                '일본어 주소를 입력하여 해외용 주소 형식으로 변환합니다.',

            addressLabel: '일본어 주소',
            addressHelp:
                '예: 北海道札幌市中央区大通東',

            addressButton: '🔍 주소 변환',

            resultsTitle: '변환 결과',

            japaneseAddress: '일본어 주소',
            romaji: 'ROMAJI',
            internationalAddress: '해외용 주소',

            copy: '복사',

            csvTitle: 'CSV 일괄 변환',
            csvDescription:
                '여러 주소를 한 번에 변환할 수 있습니다.',

            csvFormatTitle:
                '📄 CSV 파일 형식',

            csvFormatText:
                '최대 100개의 주소까지 무료로 변환할 수 있습니다. 101개 이상의 주소를 변환하려면 유료 서비스를 이용해야 합니다. 첫 번째 열에 우편번호, 두 번째 열에 주소를 입력하세요.',

            csvFileLabel: 'CSV 파일',

            csvButton:
                '📄 CSV 변환',

            csvResultsTitle:
                'CSV 변환 결과',

            downloadCsv:
                '⬇️ CSV 다운로드',

            guideTitle:
                '일본 주소 영문 변환 사용 방법',

            guide1Question:
                '우편번호로 주소를 어떻게 변환하나요?',

            guide1Answer:
                '우편번호를 입력하고 "변환"을 누르면 일본어 주소와 해외용 영문 주소가 표시됩니다.',

            guide2Question:
                '하이픈 없는 우편번호도 사용할 수 있나요?',

            guide2Answer:
                '네. "060-0041"과 "0600041" 모두 사용할 수 있습니다.',

            guide3Question:
                '일본어 주소로 검색할 수 있나요?',

            guide3Answer:
                '네. 도도부현, 시구정촌, 지명 등의 일본어 주소로 검색할 수 있습니다.',

            guide4Question:
                'CSV로 여러 주소를 변환할 수 있나요?',

            guide4Answer:
                '네. CSV 파일을 업로드하면 최대 100개의 주소를 무료로 한 번에 변환할 수 있습니다. 101개 이상의 주소를 변환하려면 유료 서비스를 이용해야 합니다.',

            guide5Question:
                '변환된 주소를 복사할 수 있나요?',

            guide5Answer:
                '"복사" 버튼을 누르면 해외용 주소를 복사할 수 있습니다.',

            terms: '이용약관',
            privacy: '개인정보처리방침',
            contact: '문의하기',
            about: '운영자 소개',
            cooperation: '협업 및 게재',

            operator:
                '운영자: Liuweijie',

            serviceName:
                '서비스명: Japan Address Converter',

            operationType:
                '운영 형태: 개인 운영',

            contactLabel:
                '연락처: ',

            copyright:
                '일본 주소 영문 변환',

            searching:
                '검색 중…',

            converting:
                '변환 중…',

            copied:
                '✓ 복사 완료',

            copyFailed:
                '복사할 수 없습니다.'

        },


        vi: {

            title: 'Chuyển địa chỉ Nhật sang tiếng Anh',

            subtitle:
                'Nhập mã bưu điện hoặc địa chỉ tiếng Nhật để chuyển sang định dạng địa chỉ quốc tế.',

            postalTab: 'Mã bưu điện',
            addressTab: 'Địa chỉ Nhật',
            csvTab: 'CSV hàng loạt',

            postalTitle: 'Chuyển đổi từ mã bưu điện',
            postalDescription:
                'Nhập mã bưu điện Nhật để tìm kiếm và chuyển đổi địa chỉ.',

            postalLabel: 'Mã bưu điện',
            postalHelp:
                'Ví dụ: 060-0041 hoặc 0600041',

            postalButton: '🔍 Chuyển đổi',

            addressTitle: 'Chuyển đổi từ địa chỉ Nhật',
            addressDescription:
                'Nhập địa chỉ tiếng Nhật để chuyển sang định dạng quốc tế.',

            addressLabel: 'Địa chỉ Nhật',
            addressHelp:
                'Ví dụ: 北海道札幌市中央区大通東',

            addressButton: '🔍 Chuyển đổi địa chỉ',

            resultsTitle: 'Kết quả chuyển đổi',

            japaneseAddress: 'Địa chỉ tiếng Nhật',
            romaji: 'ROMAJI',
            internationalAddress: 'Địa chỉ quốc tế',

            copy: 'Sao chép',

            csvTitle: 'Chuyển đổi CSV hàng loạt',
            csvDescription:
                'Có thể chuyển đổi nhiều địa chỉ cùng lúc.',

            csvFormatTitle:
                '📄 Định dạng tệp CSV',

            csvFormatText:
                'Có thể chuyển đổi miễn phí tối đa 100 địa chỉ. Việc chuyển đổi hơn 100 địa chỉ yêu cầu dịch vụ trả phí. Nhập mã bưu điện ở cột đầu tiên và địa chỉ ở cột thứ hai.',

            csvFileLabel: 'Tệp CSV',

            csvButton:
                '📄 Chuyển đổi CSV',

            csvResultsTitle:
                'Kết quả chuyển đổi CSV',

            downloadCsv:
                '⬇️ Tải CSV',

            guideTitle:
                'Cách sử dụng công cụ chuyển địa chỉ Nhật sang tiếng Anh',

            guide1Question:
                'Làm thế nào để chuyển địa chỉ từ mã bưu điện?',

            guide1Answer:
                'Nhập mã bưu điện và nhấn "Chuyển đổi". Địa chỉ tiếng Nhật và địa chỉ quốc tế sẽ được hiển thị.',

            guide2Question:
                'Có thể nhập mã bưu điện không có dấu gạch ngang không?',

            guide2Answer:
                'Có. Cả "060-0041" và "0600041" đều được hỗ trợ.',

            guide3Question:
                'Có thể tìm kiếm bằng địa chỉ tiếng Nhật không?',

            guide3Answer:
                'Có. Bạn có thể tìm kiếm bằng thông tin tỉnh, thành phố, quận, khu vực và tên địa phương bằng tiếng Nhật.',

            guide4Question:
                'Có thể chuyển đổi nhiều địa chỉ bằng CSV không?',

            guide4Answer:
                'Có. Tải tệp CSV lên để chuyển đổi miễn phí tối đa 100 địa chỉ cùng lúc. Việc chuyển đổi hơn 100 địa chỉ yêu cầu dịch vụ trả phí.',

            guide5Question:
                'Có thể sao chép địa chỉ đã chuyển đổi không?',

            guide5Answer:
                'Nhấn nút "Sao chép" để sao chép địa chỉ quốc tế.',

            terms: 'Điều khoản sử dụng',
            privacy: 'Chính sách bảo mật',
            contact: 'Liên hệ',
            about: 'Về người vận hành',
            cooperation: 'Hợp tác & đăng tải',

            operator:
                'Người vận hành: Liuweijie',

            serviceName:
                'Dịch vụ: Japan Address Converter',

            operationType:
                'Hình thức vận hành: Cá nhân',

            contactLabel:
                'Liên hệ: ',

            copyright:
                'Chuyển địa chỉ Nhật sang tiếng Anh',

            searching:
                'Đang tìm kiếm…',

            converting:
                'Đang chuyển đổi…',

            copied:
                '✓ Đã sao chép',

            copyFailed:
                'Không thể sao chép.'

        }

    };


    /* =========================================================
       LANGUAGE SWITCH
    ========================================================= */

    function applyLanguage(language) {

        const data =
            translations[language]
            || translations.ja;


        document.documentElement.lang =
            language;


        document
            .querySelectorAll('[data-i18n]')
            .forEach(function (element) {

                const key =
                    element.getAttribute(
                        'data-i18n'
                    );


                if (
                    data[key] !== undefined
                ) {

                    element.innerHTML =
                        data[key];

                }

            });


        const title =
            document.querySelector('.title');


        if (title) {

            document.title =
                data.title;

        }


        const languageSelect =
            document.getElementById(
                'language-select'
            );


        if (
            languageSelect
            &&
            languageSelect.value !== language
        ) {

            languageSelect.value =
                language;

        }


        localStorage.setItem(
            'addressConverterLanguage',
            language
        );

    }


    /* =========================================================
       DETECT LANGUAGE
    ========================================================= */

    function getInitialLanguage() {

        const savedLanguage =
            localStorage.getItem(
                'addressConverterLanguage'
            );


        if (
            savedLanguage
            &&
            translations[savedLanguage]
        ) {

            return savedLanguage;

        }


        const browserLanguage =
            (
                navigator.language
                ||
                'ja'
            ).toLowerCase();


        if (
            browserLanguage.startsWith('ja')
        ) {

            return 'ja';

        }


        if (
            browserLanguage.startsWith('zh')
        ) {

            return 'zh';

        }


        if (
            browserLanguage.startsWith('ko')
        ) {

            return 'ko';

        }


        if (
            browserLanguage.startsWith('vi')
        ) {

            return 'vi';

        }


        if (
            browserLanguage.startsWith('en')
        ) {

            return 'en';

        }


        return 'ja';

    }


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
                tab.getAttribute(
                    'data-tab'
                ) === target;


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
                panel.id ===
                'panel-' + target
            );

        });

    }


    /* =========================================================
       SCROLL TO SEARCH RESULT
    ========================================================= */

    function scrollToResults() {

        const result =
            document.querySelector(
                '.results'
            );


        if (!result) {

            return;

        }


        setTimeout(function () {

            const headerOffset = 20;

            const elementPosition =
                result.getBoundingClientRect()
                .top;

            const offsetPosition =
                elementPosition
                + window.pageYOffset
                - headerOffset;


            window.scrollTo({

                top: offsetPosition,

                behavior: 'smooth'

            });

        }, 250);

    }


    /* =========================================================
       TAB
    ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            /* ---------------------------------------------
               LANGUAGE
            --------------------------------------------- */

            const languageSelect =
                document.getElementById(
                    'language-select'
                );


            const initialLanguage =
                getInitialLanguage();


            applyLanguage(
                initialLanguage
            );


            if (languageSelect) {

                languageSelect.addEventListener(
                    'change',
                    function () {

                        applyLanguage(
                            this.value
                        );

                    }
                );

            }


            /* ---------------------------------------------
               TABS
            --------------------------------------------- */

            const tabs =
                document.querySelectorAll('.tab');


            const panels =
                document.querySelectorAll('.panel');


            tabs.forEach(function (tab) {

                tab.addEventListener(
                    'click',
                    function () {

                        const target =
                            tab.getAttribute(
                                'data-tab'
                            );


                        tabs.forEach(
                            function (item) {

                                item.classList.remove(
                                    'active'
                                );

                                item.setAttribute(
                                    'aria-selected',
                                    'false'
                                );

                            }
                        );


                        panels.forEach(
                            function (panel) {

                                panel.classList.remove(
                                    'active'
                                );

                            }
                        );


                        tab.classList.add(
                            'active'
                        );


                        tab.setAttribute(
                            'aria-selected',
                            'true'
                        );


                        const targetPanel =
                            document.getElementById(
                                'panel-' + target
                            );


                        if (targetPanel) {

                            targetPanel.classList.add(
                                'active'
                            );

                        }

                    }
                );

            });


            /* ---------------------------------------------
               POSTAL FORMAT
            --------------------------------------------- */

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


                        if (
                            value.length > 7
                        ) {

                            value =
                                value.substring(
                                    0,
                                    7
                                );

                        }


                        if (
                            value.length > 3
                        ) {

                            value =
                                value.substring(
                                    0,
                                    3
                                )
                                + '-'
                                + value.substring(3);

                        }


                        this.value =
                            value;

                    }
                );

            }


            /* ---------------------------------------------
               POSTAL FORM
            --------------------------------------------- */

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

                            button.disabled =
                                true;


                            const language =
                                localStorage.getItem(
                                    'addressConverterLanguage'
                                )
                                ||
                                'ja';


                            button.textContent =
                                translations[
                                    language
                                ].searching;

                        }

                    }
                );

            }


            /* ---------------------------------------------
               ADDRESS FORM
            --------------------------------------------- */

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

                            button.disabled =
                                true;


                            const language =
                                localStorage.getItem(
                                    'addressConverterLanguage'
                                )
                                ||
                                'ja';


                            button.textContent =
                                translations[
                                    language
                                ].searching;

                        }

                    }
                );

            }


            /* ---------------------------------------------
               CSV FORM
            --------------------------------------------- */

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

                            button.disabled =
                                true;


                            const language =
                                localStorage.getItem(
                                    'addressConverterLanguage'
                                )
                                ||
                                'ja';


                            button.textContent =
                                translations[
                                    language
                                ].converting;

                        }

                    }
                );

            }


            /* ---------------------------------------------
               OPEN CURRENT RESULT TAB
            --------------------------------------------- */

            const searchType =
                "{{ $searchType ?? '' }}";


            if (
                searchType === 'address'
            ) {

                activateTab(
                    'address'
                );

            } else if (
                searchType === 'postal'
            ) {

                activateTab(
                    'postal'
                );

            }


            @if(isset($csvResults) && count($csvResults) > 0)

                activateTab('csv');

            @elseif(session()->has('csv_error'))

                activateTab('csv');

            @endif


            /* ---------------------------------------------
               SCROLL TO RESULT
            --------------------------------------------- */

            const hasSearchResult =
                document.querySelector(
                    '.results'
                );


            if (hasSearchResult) {

                scrollToResults();

            }

        }
    );


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
            ||
            button.textContent;


        button.setAttribute(
            'data-original',
            originalText
        );


        const language =
            localStorage.getItem(
                'addressConverterLanguage'
            )
            ||
            'ja';


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


            button.classList.add(
                'copied'
            );


            button.textContent =
                translations[
                    language
                ].copied;


            setTimeout(
                function () {

                    button.classList.remove(
                        'copied'
                    );


                    button.textContent =
                        originalText;

                },
                1800
            );


        } catch (error) {

            try {

                copyFallback(text);


                button.classList.add(
                    'copied'
                );


                button.textContent =
                    translations[
                        language
                    ].copied;


                setTimeout(
                    function () {

                        button.classList.remove(
                            'copied'
                        );


                        button.textContent =
                            originalText;

                    },
                    1800
                );


            } catch (fallbackError) {

                alert(
                    translations[
                        language
                    ].copyFailed
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


        textarea.value =
            text;


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

