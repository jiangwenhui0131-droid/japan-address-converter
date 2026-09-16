<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>運営者について｜Japan Address Converter</title>

    <meta
        name="description"
        content="Japan Address Converterの運営者情報をご案内します。"
    >

    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ secure_url('/about') }}">

    <meta property="og:title" content="運営者について｜Japan Address Converter">
    <meta
        property="og:description"
        content="Japan Address Converterの運営者情報をご案内します"
    >
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ secure_url('/about') }}">
    <meta property="og:site_name" content="Japan Address Converter">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                "Noto Sans JP",
                sans-serif;
            background: #f4f8f7;
            color: #263b39;
            line-height: 1.8;
        }

        .page {
            min-height: 100vh;
            padding: 30px 16px 50px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo {
            font-size: 42px;
            margin-bottom: 8px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #234c47;
        }

        .header p {
            margin: 8px 0 0;
            color: #71817e;
            font-size: 14px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 6px 24px rgba(36, 76, 71, 0.08);
        }

        .card h2 {
            margin: 0 0 24px;
            font-size: 22px;
            color: #234c47;
        }

        .card h3 {
            margin: 28px 0 8px;
            font-size: 17px;
            color: #315f59;
        }

        .card p {
            margin: 0 0 18px;
            color: #526461;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 30px;
        }

        .info-table th,
        .info-table td {
            border-bottom: 1px solid #e5eeec;
            padding: 14px 12px;
            text-align: left;
            vertical-align: top;
        }

        .info-table th {
            width: 30%;
            background: #f7fbfa;
            color: #315f59;
            font-weight: 600;
        }

        .info-table td {
            color: #526461;
        }

        .back-link {
            display: inline-block;
            margin-top: 10px;
            color: #2f746b;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 28px;
            color: #81908d;
            font-size: 13px;
        }

        .footer a {
            color: #5d7772;
            text-decoration: none;
            margin: 0 8px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .page {
                padding: 20px 12px 40px;
            }

            .card {
                padding: 22px 18px;
                border-radius: 14px;
            }

            .header h1 {
                font-size: 24px;
            }

            .info-table th,
            .info-table td {
                display: block;
                width: 100%;
                padding: 10px 8px;
            }

            .info-table th {
                border-bottom: none;
                padding-bottom: 4px;
            }

            .info-table td {
                padding-top: 4px;
            }
        }
    </style>
</head>

<body>

<div class="page">
    <div class="container">

        <header class="header">
            <div class="logo">🇯🇵</div>
            <h1>運営者について</h1>
            <p>Japan Address Converter</p>
        </header>

        <main class="card">

            <h2>運営者情報</h2>

            <table class="info-table">
                <tr>
                    <th>運営者</th>
                    <td>Liuweijie</td>
                </tr>

                <tr>
                    <th>サービス名</th>
                    <td>Japan Address Converter</td>
                </tr>

                <tr>
                    <th>運営形態</th>
                    <td>個人運営</td>
                </tr>

                <tr>
                    <th>連絡先</th>
                    <td>
                        <a href="mailto:jiangwenhui@gmail.com">
                            jiangwenhui@gmail.com
                        </a>
                    </td>
                </tr>
            </table>

            <h2>Japan Address Converterについて</h2>

            <p>
                Japan Address Converterは、日本の郵便番号や日本語住所を、
                海外向けに利用しやすい英語表記へ変換するためのWebサービスです。
            </p>

            <p>
                日本国内の住所を海外通販、国際配送、海外サービスへの登録などで
                利用する際に、住所を英語形式で入力する必要がある場合があります。
                本サービスでは、郵便番号または日本語住所を入力することで、
                英語表記の住所を簡単に確認できるようにしています。
            </p>

            <h2>サービスについて</h2>

            <p>
                本サービスは個人で運営しています。
                より使いやすく、シンプルに利用できる住所変換サービスを目指して、
                継続的に改善を行っています。
            </p>

            <h2>お問い合わせ</h2>

            <p>
                サービスに関するご質問、不具合のご報告、その他のお問い合わせは、
                以下のメールアドレスまでご連絡ください。
            </p>

            <p>
                <a href="mailto:jiangwenhui@gmail.com">
                    jiangwenhui@gmail.com
                </a>
            </p>

            <a class="back-link" href="{{ secure_url('/') }}">
                ← 日本住所英語変換に戻る
            </a>

        </main>

        <footer class="footer">
            <div>
                <a href="{{ secure_url('/terms') }}">利用規約</a>
                <a href="{{ secure_url('/privacy') }}">プライバシーポリシー</a>
                <a href="{{ secure_url('/contact') }}">お問い合わせ</a>
                <a href="{{ secure_url('/about') }}">運営者について</a>
                <a href="{{ secure_url('/cooperation') }}">協業・掲載について</a>
            </div>

            <div style="margin-top: 12px;">
                © {{ date('Y') }} Japan Address Converter
            </div>
        </footer>

    </div>
</div>

</body>
</html>