<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プライバシーポリシー｜日本住所変換ツール</title>
    <meta name="description" content="日本住所変換ツールのプライバシーポリシーです。">
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

    <h1>プライバシーポリシー</h1>

    <p>
        日本住所変換ツール（以下「本サービス」）では、
        利用者の個人情報を適切に取り扱うよう努めています。
    </p>

    <h2>1. 取得する情報</h2>

    <p>
        本サービスでは、サービス提供のために、利用者が入力した
        郵便番号、住所などの情報を取り扱う場合があります。
    </p>

    <p>
        また、アクセス状況の確認やサービス改善のため、
        IPアドレス、ブラウザ情報、アクセス日時などの情報が
        自動的に記録される場合があります。
    </p>

    <h2>2. 利用目的</h2>

    <p>
        取得した情報は、以下の目的で利用します。
    </p>

    <ul>
        <li>住所変換サービスの提供</li>
        <li>サービスの改善・品質向上</li>
        <li>不正利用や障害の調査</li>
        <li>お問い合わせへの対応</li>
    </ul>

    <h2>3. CSVファイルについて</h2>

    <p>
        CSV一括変換機能では、利用者がアップロードしたファイルを
        住所変換処理のために使用します。
    </p>

    <p>
        アップロードされたデータの取り扱いについては、
        本サービスのシステム構成および運用状況に応じて適切に管理します。
    </p>

    <h2>4. Cookie等について</h2>

    <p>
        本サービスでは、サービスの正常な動作や利用状況の把握、
        サービス改善などを目的としてCookie等を利用する場合があります。
    </p>

    <h2>5. 第三者への提供</h2>

    <p>
        法令に基づく場合を除き、利用者の情報を本人の同意なく
        第三者へ提供することは原則として行いません。
    </p>

    <h2>6. 安全管理</h2>

    <p>
        利用者の情報について、適切な安全管理措置を講じ、
        不正アクセス、漏えい、紛失等の防止に努めます。
    </p>

    <h2>7. プライバシーポリシーの変更</h2>

    <p>
        本ポリシーは、必要に応じて変更することがあります。
        変更後の内容は、本ページに掲載した時点から適用されます。
    </p>

    <h2>8. お問い合わせ</h2>

    <p>
        本サービスに関するお問い合わせについては、
        <a href="{{ route('contact') }}">お問い合わせページ</a>
        をご確認ください。
    </p>

    <div class="back">
        <a href="{{ url('/') }}">← トップページへ戻る</a>
    </div>

</div>

</body>
</html>