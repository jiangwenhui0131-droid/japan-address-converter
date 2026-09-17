<!DOCTYPE html>

<html lang="ja">

<head>

<meta charset="UTF-8">
<link rel="icon" href="{{ asset('images/favicon.png') }}?v=2" type="image/png">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, viewport-fit=cover"
>

<title>日本住所英語変換｜郵便番号・住所を英語表記に変換</title>

<meta
    name="description"
    content="日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。郵便番号検索、住所検索、CSV一括変換に対応しています。"
>

<link
    rel="canonical"
    href="https://japanaddresses.com/"
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
    content="日本の郵便番号や住所を海外向けの英語表記に変換できる無料ツールです。郵便番号検索、住所検索、CSV一括変換に対応しています。"
>

<!-- Google AdSense -->

<script
    async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9772041946026515"
    crossorigin="anonymous"
></script>

<link
    rel="stylesheet"
    href="{{ asset('css/address-converter.css') }}"
>

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

            @if(!empty($csv_error))

                <div class="error-message">
                    {{ $csv_error }}
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
         GUIDE
    ====================================================== -->

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


    <!-- =================================================
         INTERNATIONAL SHIPPING FAQ
    ================================================== -->

    <h2
        class="guide-title"
        data-i18n="guideFaqTitle"
    >
        海外発送・住所表記 FAQ
    </h2>


    <div class="guide-item">

        <h3
            class="guide-question"
            data-i18n="guide6Question"
        >
            海外に荷物を送るとき、住所はどう書けばいいですか？
        </h3>

        <p
            class="guide-answer"
            data-i18n="guide6Answer"
        >
            日本の住所を海外向けに書く場合は、
            番地・町名から市区町村、都道府県、郵便番号、国名の順に並べる形式がよく使われます。
            このサイトでは、日本語住所を入力して海外向けの住所表記を確認できます。
        </p>

    </div>


    <div class="guide-item">

        <h3
            class="guide-question"
            data-i18n="guide7Question"
        >
            海外発送では「Japan」を付ける必要がありますか？
        </h3>

        <p
            class="guide-answer"
            data-i18n="guide7Answer"
        >
            海外向けの宛先では国名を明記することが一般的です。
            日本の住所を海外向けに使用する場合は、
            最後に「Japan」を付けると国が分かりやすくなります。
        </p>

    </div>


    <div class="guide-item">

        <h3
            class="guide-question"
            data-i18n="guide8Question"
        >
            EMS・国際郵便・海外配送の住所入力に使えますか？
        </h3>

        <p
            class="guide-answer"
            data-i18n="guide8Answer"
        >
            はい。EMS、国際郵便、海外通販サイトなどで
            日本の住所を英語・ローマ字表記にする際の参考として利用できます。
            ただし、入力形式や必要項目はサービスによって異なるため、
            発送時は利用する配送会社やサービスの案内も確認してください。
        </p>

    </div>


    <div class="guide-item">

        <h3
            class="guide-question"
            data-i18n="guide9Question"
        >
            代購・越境EC・業務用にも利用できますか？
        </h3>

        <p
            class="guide-answer"
            data-i18n="guide9Answer"
        >
            はい。代購、越境EC、海外発送業務など、
            複数の日本住所を海外向けに整理する場面でも利用できます。
            複数件を処理する場合はCSV一括変換が便利です。
        </p>

    </div>


    <div class="guide-item">

        <h3
            class="guide-question"
            data-i18n="guide10Question"
        >
            海外発送では住所以外に何を確認すればいいですか？
        </h3>

        <p
            class="guide-answer"
            data-i18n="guide10Answer"
        >
            国際配送では、宛名、電話番号、内容品、数量、重量、価格などの情報が必要になる場合があります。
            税関申告などの手続きもあるため、住所だけでなく、
            利用する配送会社・サービスの最新の案内を確認してください。
        </p>

    </div>

</section>


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
    window.addressConverterConfig = {
        searchType: @json($searchType ?? ''),
        hasCsvResults: @json(isset($csvResults) && count($csvResults) > 0),
        hasCsvError: @json(!empty($csv_error))
    };
</script>

<script src="{{ asset('js/address-converter.js') }}"></script>

</body>

</html>