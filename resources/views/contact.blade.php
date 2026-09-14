<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ｜日本住所変換ツール</title>
    <meta name="description" content="日本住所変換ツールへのお問い合わせページです。">
    <style>
        body {
            margin: 0;
            padding: 40px 20px;
            background: #f5f7f8;
            color: #333;
            font-family: Arial, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;
            line-height: 1.8;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-sizing: border-box;
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
        }

        h2 {
            margin-top: 32px;
            font-size: 20px;
            border-left: 4px solid #2f7d72;
            padding-left: 12px;
        }

        a {
            color: #2f7d72;
        }

        .notice {
            background: #f5f7f8;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .back {
            margin-top: 40px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .container {
                padding: 24px 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h1>お問い合わせ</h1>

    <p>
        日本住所変換ツールをご利用いただきありがとうございます。
    </p>

    <div class="notice">
        <p>
            お問い合わせ窓口は現在準備中です。
        </p>

        <p>
            サービスに関するご意見、不具合の報告、その他のお問い合わせについては、
            今後お問い合わせ窓口を整備する予定です。
        </p>
    </div>

    <h2>お問い合わせの際にお知らせいただきたい内容</h2>

    <ul>
        <li>お問い合わせ内容</li>
        <li>発生している問題の内容</li>
        <li>可能であれば、使用しているブラウザや端末</li>
    </ul>

    <p>
        個人情報やパスワードなど、必要以上の情報は送信しないでください。
    </p>

    <div class="back">
        <a href="{{ url('/') }}">← トップページへ戻る</a>
    </div>

</div>

</body>
</html>