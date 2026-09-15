<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>運営者について｜Japan Address Converter</title>

    <meta
        name="description"
        content="Japan Address Converterの運営者情報です。日本住所を海外向け住所表記へ変換するオンラインサービスを運営しています。"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <link
        rel="canonical"
        href="{{ secure_url('/about') }}"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7f8;
            color: #263733;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                "Noto Sans JP",
                Arial,
                sans-serif;
            line-height: 1.8;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(760px, calc(100% - 30px));
            margin: 0 auto;
        }

        header {
            background: #ffffff;
            border-bottom: 1px solid #e7eceb;
            padding: 18px 0;
        }

        .back-link {
            color: #16856f;
            font-weight: 800;
            font-size: 14px;
        }

        main {
            padding: 35px 0 60px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e7eceb;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .04);
        }

        h1 {
            margin: 0 0 20px;
            color: #173f37;
            font-size: 28px;
        }

        h2 {
            margin: 30px 0 8px;
            color: #28463f;
            font-size: 19px;
        }

        p {
            margin: 8px 0;
            color: #66736f;
            font-size: 14px;
        }

        .operator-box {
            margin-top: 20px;
            padding: 18px;
            background: #eaf6f3;
            border-radius: 12px;
        }

        .operator-row {
            display: flex;
            gap: 20px;
            padding: 7px 0;
            font-size: 14px;
        }

        .operator-label {
            width: 100px;
            flex-shrink: 0;
            color: #65736f;
            font-weight: 700;
        }

        .operator-value {
            color: #23423b;
            font-weight: 700;
            word-break: break-word;
        }

        .operator-value a {
            color: #16856f;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 17px;
            border-radius: 10px;
            background: #16856f;
            color: #ffffff;
            font-size: 13px;
            font-weight: 800;
        }

        footer {
            background: #173f37;
            color: #ffffff;
            text-align: center;
            padding: 30px 15px;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px 18px;
            margin-top: 10px;
        }

        .footer-links a {
            color: #dce9e6;
        }

        .copyright {
            margin-top: 15px;
            color: #9fb5af;
        }

        @media (max-width: 640px) {

            .card {
                padding: 21px;
                border-radius: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .operator-row {
                display: block;
            }

            .operator-label {
                width: auto;
                margin-bottom: 2px;
            }
        }
    </style>
</head>

<body>

<header>

    <div class="container">

        <a
            href="{{ secure_url('/') }}"
            class="back-link"
        >
            ← Japan Address Converter
        </a>

    </div>

</header>


<main>

    <div class="container">

        <article class="card">

            <h1>運営者について</h1>

            <p>
                Japan Address Converterは、日本の住所を海外向けの英語表記へ変換するためのオンラインサービスです。
            </p>

            <p>
                日本の郵便番号や住所を入力することで、海外通販、国際配送、海外サービスなどで利用しやすい住所表記を確認できます。
            </p>


            <h2>運営者情報</h2>

            <div class="operator-box">

                <div class="operator-row">

                    <div class="operator-label">
                        運営者
                    </div>

                    <div class="operator-value">
                        Liuweijie
                    </div>

                </div>


                <div class="operator-row">

                    <div class="operator-label">
                        サービス名
                    </div>

                    <div class="operator-value">
                        Japan Address Converter
                    </div>

                </div>


                <div class="operator-row">

                    <div class="operator-label">
                        運営形態
                    </div>

                    <div class="operator-value">
                        個人運営
                    </div>

                </div>


                <div class="operator-row">

                    <div class="operator-label">
                        連絡先
                    </div>

                    <div class="operator-value">

                        <a href="mailto:jiangwenhui@gmail.com">
                            jiangwenhui@gmail.com
                        </a>

                    </div>

                </div>

            </div>


            <h2>サービスについて</h2>

            <p>
                Japan Address Converterは、日本の住所を海外で利用しやすい形式に変換することを目的として開発しています。
            </p>

            <p>
                郵便番号検索、日本語住所検索、CSV一括変換などの機能を提供しています。
            </p>


            <h2>お問い合わせ</h2>

            <p>
                サービスに関するご質問、改善提案、不具合のご報告、協業に関するお問い合わせは、メールでお気軽にご連絡ください。
            </p>

            <a
                href="mailto:jiangwenhui@gmail.com"
                class="button"
            >
                お問い合わせ →
            </a>

        </article>

    </div>

</main>


<footer>

    <div>
        Japan Address Converter
    </div>

    <div class="footer-links">

        <a href="{{ secure_url('/') }}">
            ホーム
        </a>

        <a href="{{ route('terms') }}">
            利用規約
        </a>

        <a href="{{ route('privacy') }}">
            プライバシーポリシー
        </a>

        <a href="{{ route('contact') }}">
            お問い合わせ
        </a>

        <a href="{{ secure_url('/cooperation') }}">
            協業・掲載について
        </a>

    </div>

    <div class="copyright">
        © 2026 Japan Address Converter
    </div>

</footer>

</body>
</html>