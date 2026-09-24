/* =========================================================
 * TRANSLATIONS
 * ========================================================= */

const translations = {

  ja: {

    title:
      "日本住所英語変換",

    subtitle:
      "郵便番号や日本語住所を入力するだけで、<br>海外向けの住所表記に簡単に変換できます。",

    postalTab:
      "郵便番号",

    addressTab:
      "日本語住所",

    csvTab:
      "CSV一括",

    postalTitle:
      "郵便番号から変換",

    postalDescription:
      "郵便番号を入力すると住所を検索して変換します。",

    postalLabel:
      "郵便番号",

    postalHelp:
      "例：060-0041 または 0600041",

    postalButton:
      "🔍 変換する",

    addressTitle:
      "日本語住所から変換",

    addressDescription:
      "日本語の住所を入力して海外向け表記に変換します。",

    addressLabel:
      "日本語住所",

    addressHelp:
      "例：北海道札幌市中央区大通東",

    addressButton:
      "🔍 住所を変換する",

    resultsTitle:
      "変換結果",

    japaneseAddress:
      "日本語住所",

    romaji:
      "ROMAJI",

    internationalAddress:
      "海外向け住所",

    copy:
      "コピー",

    csvTitle:
      "CSV一括変換",

    csvDescription:
      "複数の住所をまとめて変換できます。",

    csvFormatTitle:
      "📄 CSVファイルの形式",

    csvFormatText:
      "100件まで無料で変換できます。101件以上の変換については、有料サービスをご利用ください。1列目に郵便番号、2列目に住所を入力してください。",

    csvExampleLabel:
      "CSV例",

    csvFileLabel:
      "CSVファイル",

    csvHelp:
      "CSVファイルは100件まで無料で変換できます。",

    csvButton:
      "📄 CSVを変換する",

    csvResultsTitle:
      "CSV変換結果",

    csvResultNotePrefix:
      "全",

    csvResultNoteSuffix:
      "件変換成功。画面には先頭5件のみ表示しています。",

    downloadCsv:
      "⬇️ CSVをダウンロード",

    guideTitle:
      "日本住所英語変換の使い方",

    guide1Question:
      "郵便番号から住所を変換する",

    guide1Answer:
      "郵便番号を入力して「変換する」を押してください。日本語住所と海外向けの住所表記が表示されます。",

    guide2Question:
      "ハイフンなしの郵便番号も使えますか？",

    guide2Answer:
      "はい。「060-0041」と「0600041」のどちらでも入力できます。",

    guide3Question:
      "日本語住所から検索できますか？",

    guide3Answer:
      "はい。都道府県、市区町村、町名などの日本語住所を入力して検索できます。",

    guide4Question:
      "CSVで一括変換できますか？",

    guide4Answer:
      "はい。CSVファイルをアップロードして、100件まで無料でまとめて変換できます。101件以上の変換については、有料サービスをご利用ください。",

    guide5Question:
      "変換した住所はコピーできますか？",

    guide5Answer:
      "変換結果の「コピー」ボタンを押すと、海外向け住所をそのままコピーできます。",

    guideKnowledgeTitle:
      "日本住所を英語で書くときの基本",

    guide11Question:
      "日本の住所は英語ではどのような順番で書きますか？",

    guide11Answer:
      "日本語の住所は大きな地域から小さな地域へ書くことが多い一方、海外向けの住所では番地や町名などの詳細な情報から始め、市区町村、都道府県、郵便番号、国名などを続ける形式がよく使われます。ただし、配送会社や入力フォームによって指定される順番が異なる場合があります。",

    guide12Question:
      "「丁目・番・号」は英語ではどう扱いますか？",

    guide12Answer:
      "日本の住所にある丁目・番・号は、日本語の住所構造を表す重要な情報です。海外向け表記では、住所を分かりやすくするために数字を使った表記へ整理することがあります。具体的な表記方法は住所や配送サービスによって異なるため、変換結果を入力先の形式と合わせて確認してください。",

    guide13Question:
      "マンション名や部屋番号はどこに書きますか？",

    guide13Answer:
      "建物名や部屋番号は、受取人が建物を特定するために重要な情報です。海外向け住所では、部屋番号と建物名を住所の一部として記載する方法が一般的です。ECサイトや配送会社の入力欄が分かれている場合は、それぞれ指定された欄に入力してください。",

    guide14Question:
      "ローマ字表記と英語表記は同じですか？",

    guide14Answer:
      "完全に同じ意味ではありません。日本の地名をアルファベットで表す場合はローマ字表記が中心になりますが、海外向けの住所では、住所の各要素を読みやすい順番に整理して記載することがあります。このサイトでは、日本語住所を海外向けに整理するための参考情報を提供しています。",

    guide15Question:
      "変換結果はそのまま海外発送に使えますか？",

    guide15Answer:
      "変換結果は海外向け住所を作成する際の参考として利用してください。配送会社、ECサイト、金融機関、行政機関などによって必要な入力形式が異なる場合があります。実際に使用する前に、入力先が指定している住所形式も確認することをおすすめします。",

    guideFaqTitle:
      "海外発送・住所表記 FAQ",

    guide6Question:
      "海外に荷物を送るとき、住所はどう書けばいいですか？",

    guide6Answer:
      "日本の住所を海外向けに使用する場合は、番地・町名、市区町村、都道府県、郵便番号、国名などの情報を、利用する配送会社やサービスの指定形式に合わせて記載します。このサイトでは、日本語住所を海外向けの住所表記に変換できます。",

    guide7Question:
      "海外発送では「Japan」を付ける必要がありますか？",

    guide7Answer:
      "海外向けの宛先では国名を明記することが一般的です。日本の住所を海外向けに使用する場合は、最後に「Japan」を付けると配送先の国を分かりやすくできます。",

    guide8Question:
      "EMS・国際郵便・海外配送の住所入力に使えますか？",

    guide8Answer:
      "はい。EMS、国際郵便、海外通販サイトなどで、日本の住所を英語・ローマ字表記にする際の参考として利用できます。ただし、入力形式や必要項目はサービスによって異なるため、発送時は利用する配送会社やサービスの最新案内も確認してください。",

    guide9Question:
      "代購・越境EC・業務用にも利用できますか？",

    guide9Answer:
      "はい。代購、越境EC、海外発送業務など、複数の日本住所を海外向けに整理する場面でも利用できます。複数件を処理する場合はCSV一括変換が便利です。",

    guide10Question:
      "海外発送では住所以外に何を確認すればいいですか？",

    guide10Answer:
      "国際配送では、宛名、電話番号、内容品、数量、重量、価格などの情報が必要になる場合があります。税関申告などの手続きもあるため、住所だけでなく、利用する配送会社・サービスの最新案内を確認してください。",

    guideServiceTitle:
      "この住所変換ツールについて",

    guide16Question:
      "このサイトでは何ができますか？",

    guide16Answer:
      "日本の郵便番号から住所を検索する機能、日本語住所から海外向け表記へ変換する機能、複数の住所をCSVでまとめて変換する機能を提供しています。海外通販、国際郵便、住所登録などで日本の住所をアルファベット表記にする際の参考として利用できます。",

    guide17Question:
      "変換できない住所がある場合はどうすればいいですか？",

    guide17Answer:
      "日本の住所には、市区町村の変更、特殊な地名、建物名、番地表記など、自動変換だけでは正確に判断しにくいケースがあります。その場合は、変換結果だけをそのまま使用せず、元の日本語住所と照らし合わせて内容を確認してください。",

    guide18Question:
      "個人でもこのツールを利用できますか？",

    guide18Answer:
      "はい。日本に住んでいる外国人、留学生、海外の家族へ荷物を送る方、海外通販サイトに日本の住所を登録する方など、個人でも利用できます。",

    terms:
      "利用規約",

    privacy:
      "プライバシーポリシー",

    contact:
      "お問い合わせ",

    about:
      "運営者について",

    cooperation:
      "協業・掲載について",

    operator:
      "運営者：Liuweijie",

    serviceName:
      "サービス名：Japan Address Converter",

    operationType:
      "運営形態：個人運営",

    contactLabel:
      "連絡先：",

    copyright:
      "日本住所英語変換",

    searching:
      "検索しています…",

    converting:
      "変換しています…",

    copied:
      "✓ コピーしました",

    copyFailed:
      "コピーできませんでした。",

    postalInvalid:
      "郵便番号は7桁で入力してください。",

    addressRequired:
      "日本語住所を入力してください。",

    csvRequired:
      "CSVファイルを選択してください。",

    csvInvalid:
      "CSVまたはTXTファイルを選択してください。",

    csvTooLarge:
      "ファイルサイズが大きすぎます。128MB以下のCSVファイルを選択してください。"
  },


  en: {

    title:
      "Japanese Address Converter",

    subtitle:
      "Convert Japanese postal codes and addresses into an international address format.",

    postalTab:
      "Postal Code",

    addressTab:
      "Japanese Address",

    csvTab:
      "CSV Batch",

    postalTitle:
      "Convert from Postal Code",

    postalDescription:
      "Enter a Japanese postal code to search and convert the address.",

    postalLabel:
      "Postal Code",

    postalHelp:
      "Example: 060-0041 or 0600041",

    postalButton:
      "🔍 Convert",

    addressTitle:
      "Convert from Japanese Address",

    addressDescription:
      "Enter a Japanese address and convert it to an international format.",

    addressLabel:
      "Japanese Address",

    addressHelp:
      "Example: 北海道札幌市中央区大通東",

    addressButton:
      "🔍 Convert Address",

    resultsTitle:
      "Conversion Result",

    japaneseAddress:
      "Japanese Address",

    romaji:
      "ROMAJI",

    internationalAddress:
      "International Address",

    copy:
      "Copy",

    csvTitle:
      "CSV Batch Conversion",

    csvDescription:
      "Convert multiple addresses at once.",

    csvFormatTitle:
      "📄 CSV File Format",

    csvFormatText:
      "Up to 100 addresses are free. Converting more than 100 addresses requires a paid service. Enter the postal code in the first column and the address in the second column.",

    csvExampleLabel:
      "CSV Example",

    csvFileLabel:
      "CSV File",

    csvHelp:
      "Up to 100 addresses can be converted for free.",

    csvButton:
      "📄 Convert CSV",

    csvResultsTitle:
      "CSV Conversion Results",

    csvResultNotePrefix:
      "Successfully converted ",

    csvResultNoteSuffix:
      " addresses. Only the first 5 are displayed.",

    downloadCsv:
      "⬇️ Download CSV",

    guideTitle:
      "How to Use Japanese Address Converter",

    guide1Question:
      "How do I convert an address from a postal code?",

    guide1Answer:
      'Enter a postal code and click "Convert". The Japanese address and international address format will be displayed.',

    guide2Question:
      "Can I enter a postal code without a hyphen?",

    guide2Answer:
      'Yes. Both "060-0041" and "0600041" are supported.',

    guide3Question:
      "Can I search using a Japanese address?",

    guide3Answer:
      "Yes. You can search using Japanese prefecture, city, ward, town, and other address information.",

    guide4Question:
      "Can I convert multiple addresses with CSV?",

    guide4Answer:
      "Yes. Upload a CSV file to convert up to 100 addresses for free. Converting more than 100 addresses requires a paid service.",

    guide5Question:
      "Can I copy the converted address?",

    guide5Answer:
      'Click the "Copy" button to copy the international address.',

    guideKnowledgeTitle:
      "Basics of Writing Japanese Addresses in English",

    guide11Question:
      "What order should I use when writing a Japanese address in English?",

    guide11Answer:
      "Japanese addresses are commonly written from larger areas to smaller areas in Japanese. For international use, addresses are often organized from detailed information such as the street or town toward the city, prefecture, postal code, and country. The required order may vary depending on the shipping company or online form.",

    guide12Question:
      "How should chome, ban, and go be handled in an English address?",

    guide12Answer:
      "Chome, ban, and go are important parts of the Japanese address structure. When preparing an international format, these numbers may be reorganized into a format that is easier to read. The exact format can vary, so check the converted result against the requirements of the service where you will enter it.",

    guide13Question:
      "Where should I write an apartment or room number?",

    guide13Answer:
      "The building name and room number are important for identifying the destination. In international addresses, the room number and building name are often included as part of the address. If an online form provides separate fields, use the fields specified by that service.",

    guide14Question:
      "Are romaji and English address formats the same?",

    guide14Answer:
      "Not exactly. Japanese place names written with the Latin alphabet are generally represented using romaji, while an international address may also reorganize the individual address elements into a more familiar order. This site provides a reference format for organizing Japanese addresses for international use.",

    guide15Question:
      "Can I use the converted result directly for international shipping?",

    guide15Answer:
      "Use the converted result as a reference when preparing an international address. Shipping companies, e-commerce websites, financial institutions, and government services may have different input requirements. Check the format required by the service before using the address.",

    guideFaqTitle:
      "International Shipping & Address FAQ",

    guide6Question:
      "How should I write a Japanese address when shipping overseas?",

    guide6Answer:
      "When using a Japanese address for international shipping, include the relevant address information such as the street or town, city or ward, prefecture, postal code, and country according to the format required by the shipping company or service. This site helps you convert a Japanese address into an international format for reference.",

    guide7Question:
      'Should I include "Japan" in an international address?',

    guide7Answer:
      'It is generally recommended to clearly include the country name for international destinations. Adding "Japan" at the end makes the destination country easier to identify.',

    guide8Question:
      "Can I use this for EMS, international mail, or overseas shipping?",

    guide8Answer:
      "Yes. You can use the converted address as a reference when entering Japanese addresses in English or romaji for EMS, international mail, overseas shopping sites, and similar services. Required formats and information may vary, so please also check the latest instructions from the shipping company or service you use.",

    guide9Question:
      "Can this be used for proxy buying, cross-border e-commerce, or business purposes?",

    guide9Answer:
      "Yes. It can be useful when organizing multiple Japanese addresses for proxy buying, cross-border e-commerce, or overseas shipping operations. CSV batch conversion can be convenient when processing multiple addresses.",

    guide10Question:
      "What should I check besides the address when shipping overseas?",

    guide10Answer:
      "International shipments may require information such as the recipient name, phone number, contents, quantity, weight, and value. Customs declarations and other procedures may also apply, so please check the latest requirements of the shipping company or service you use.",

    guideServiceTitle:
      "About This Address Conversion Tool",

    guide16Question:
      "What can I do with this website?",

    guide16Answer:
      "The website provides Japanese postal code lookup, Japanese address conversion into an international format, and CSV batch conversion for multiple addresses. It can be used as a reference when preparing Japanese addresses for overseas shopping, international mail, address registration, and similar situations.",

    guide17Question:
      "What should I do if an address cannot be converted correctly?",

    guide17Answer:
      "Some Japanese addresses can be difficult to interpret automatically because of municipal changes, unusual place names, building names, or address numbering. If this happens, compare the converted result with the original Japanese address instead of relying on the converted result alone.",

    guide18Question:
      "Can individuals use this tool?",

    guide18Answer:
      "Yes. It can be useful for foreign residents in Japan, international students, people sending packages to family overseas, and people registering a Japanese address on international shopping websites.",

    terms:
      "Terms of Use",

    privacy:
      "Privacy Policy",

    contact:
      "Contact",

    about:
      "About the Operator",

    cooperation:
      "Cooperation & Listing",

    operator:
      "Operator: Liuweijie",

    serviceName:
      "Service: Japan Address Converter",

    operationType:
      "Operation: Individually operated",

    contactLabel:
      "Contact: ",

    copyright:
      "Japanese Address Converter",

    searching:
      "Searching…",

    converting:
      "Converting…",

    copied:
      "✓ Copied",

    copyFailed:
      "Unable to copy.",

    postalInvalid:
      "Please enter a 7-digit postal code.",

    addressRequired:
      "Please enter a Japanese address.",

    csvRequired:
      "Please select a CSV file.",

    csvInvalid:
      "Please select a CSV or TXT file.",

    csvTooLarge:
      "The file is too large. Please select a CSV file no larger than 128MB."
  },


  zh: {

    title:
      "日本地址英文转换",

    subtitle:
      "输入日本邮编或日文地址，即可转换为适合海外使用的英文地址格式。",

    postalTab:
      "日本邮编",

    addressTab:
      "日本地址",

    csvTab:
      "CSV 批量",

    postalTitle:
      "通过邮编转换",

    postalDescription:
      "输入日本邮政编码，搜索并转换对应地址。",

    postalLabel:
      "邮政编码",

    postalHelp:
      "例如：060-0041 或 0600041",

    postalButton:
      "🔍 转换",

    addressTitle:
      "通过日本地址转换",

    addressDescription:
      "输入日文地址，转换为适合海外使用的地址格式。",

    addressLabel:
      "日本地址",

    addressHelp:
      "例如：北海道札幌市中央区大通東",

    addressButton:
      "🔍 转换地址",

    resultsTitle:
      "转换结果",

    japaneseAddress:
      "日文地址",

    romaji:
      "罗马字",

    internationalAddress:
      "海外地址",

    copy:
      "复制",

    csvTitle:
      "CSV 批量转换",

    csvDescription:
      "可以一次转换多个日本地址。",

    csvFormatTitle:
      "📄 CSV 文件格式",

    csvFormatText:
      "100 个地址以内免费转换。超过 100 个地址需要使用付费服务。第一列填写邮编，第二列填写地址。",

    csvExampleLabel:
      "CSV 示例",

    csvFileLabel:
      "CSV 文件",

    csvHelp:
      "100 个地址以内可以免费转换。",

    csvButton:
      "📄 转换 CSV",

    csvResultsTitle:
      "CSV 转换结果",

    csvResultNotePrefix:
      "共成功转换 ",

    csvResultNoteSuffix:
      " 个地址，页面仅显示前 5 个。",

    downloadCsv:
      "⬇️ 下载 CSV",

    guideTitle:
      "日本地址英文转换使用方法",

    guide1Question:
      "如何通过邮编转换日本地址？",

    guide1Answer:
      "输入日本邮编并点击“转换”，即可显示日文地址以及海外使用的英文地址格式。",

    guide2Question:
      "可以输入不带连字符的邮编吗？",

    guide2Answer:
      "可以。“060-0041”和“0600041”两种格式都支持。",

    guide3Question:
      "可以通过日文地址搜索吗？",

    guide3Answer:
      "可以。可以输入都道府县、市区町村、町名等日文地址信息进行搜索。",

    guide4Question:
      "可以使用 CSV 批量转换吗？",

    guide4Answer:
      "可以。上传 CSV 文件后，可以一次免费转换最多 100 个地址。超过 100 个地址需要使用付费服务。",

    guide5Question:
      "可以复制转换后的地址吗？",

    guide5Answer:
      "点击“复制”按钮即可复制海外使用的英文地址。",

    guideKnowledgeTitle:
      "日本地址英文书写基本规则",

    guide11Question:
      "日本地址转换成英文后通常按照什么顺序填写？",

    guide11Answer:
      "日文地址通常按照从较大地区到较小地区的顺序表示，而用于海外的地址通常会从番地、町名等较详细的信息开始，再写市区町村、都道府县、邮政编码和国家。具体顺序可能因配送公司或网站表单而不同。",

    guide12Question:
      "日本地址中的“丁目・番・号”应该怎么写？",

    guide12Answer:
      "丁目、番、号是日本地址结构中的重要信息。转换为海外使用的格式时，这些数字可能会重新整理成更容易阅读的形式。具体写法可能因地址和配送服务不同而变化，因此建议将转换结果与实际填写平台的格式要求进行确认。",

    guide13Question:
      "公寓名称和房间号应该写在哪里？",

    guide13Answer:
      "建筑物名称和房间号对于准确识别收件地址非常重要。海外地址中通常会把房间号和建筑物名称作为地址的一部分填写。如果购物网站或配送公司的表单提供单独的填写栏，请按照对方指定的位置填写。",

    guide14Question:
      "罗马字和英文地址是一样的吗？",

    guide14Answer:
      "并不完全相同。日本地名使用拉丁字母表示时通常属于罗马字，而海外地址还可能需要按照海外常见的顺序重新整理地址中的各个部分。本网站主要帮助用户整理适合海外使用的地址格式。",

    guide15Question:
      "转换后的地址可以直接用于海外寄送吗？",

    guide15Answer:
      "建议把转换结果作为准备海外地址时的参考。配送公司、购物网站、金融机构以及政府机构可能有不同的填写要求。实际使用之前，请确认你所使用服务指定的地址格式。",

    guideFaqTitle:
      "海外邮寄・地址填写 FAQ",

    guide6Question:
      "寄东西到海外时，日本地址应该怎么填写？",

    guide6Answer:
      "将日本地址用于海外寄送时，需要根据配送公司或服务要求填写街道、町名、市区町村、都道府县、邮政编码和国家等信息。本网站可以帮助你将日本地址转换为适合海外使用的格式，转换结果可作为填写地址时的参考。",

    guide7Question:
      "海外地址中需要填写“Japan”吗？",

    guide7Answer:
      "国际寄送时通常需要明确填写国家名称。在地址最后添加“Japan”，可以让收件国家更加清楚。",

    guide8Question:
      "可以用于 EMS、国际邮便和海外配送吗？",

    guide8Answer:
      "可以。使用 EMS、国际邮便、海外购物网站等服务时，如果需要将日本地址填写为英文或罗马字，可以参考本网站的转换结果。但不同配送公司和服务的填写格式及必要信息可能不同，实际寄送时请同时确认相关配送公司的最新要求。",

    guide9Question:
      "代购、跨境电商或企业业务可以使用吗？",

    guide9Answer:
      "可以。对于代购、跨境电商、海外发货等业务，需要整理多个日本地址时也可以使用。需要处理多个地址时，可以使用 CSV 批量转换功能。",

    guide10Question:
      "海外寄送时，除了地址还需要确认什么？",

    guide10Answer:
      "国际配送可能还需要收件人姓名、电话号码、物品内容、数量、重量、价格等信息。同时可能涉及海关申报等手续，因此除了确认地址之外，也请确认所使用的配送公司或服务的最新要求。",

    guideServiceTitle:
      "关于这个地址转换工具",

    guide16Question:
      "这个网站可以做什么？",

    guide16Answer:
      "本网站提供日本邮政编码查询、日本地址转换为海外地址格式，以及多个地址 CSV 批量转换功能。可以在海外购物、国际邮便、地址登记等场景中，将日本地址整理为字母表记时作为参考。",

    guide17Question:
      "如果有地址无法正确转换怎么办？",

    guide17Answer:
      "日本地址中可能存在市区町村变更、特殊地名、建筑物名称以及复杂番地等自动转换比较困难的情况。如果出现这种情况，不建议只依赖转换结果，应同时与原始日文地址进行核对。",

    guide18Question:
      "个人用户可以使用这个工具吗？",

    guide18Answer:
      "可以。居住在日本的外国人、留学生、需要给海外家人寄东西的人，以及需要在海外购物网站登记日本地址的人都可以使用。",

    terms:
      "使用条款",

    privacy:
      "隐私政策",

    contact:
      "联系我们",

    about:
      "关于运营者",

    cooperation:
      "合作与刊登",

    operator:
      "运营者：Liuweijie",

    serviceName:
      "服务名称：Japan Address Converter",

    operationType:
      "运营形式：个人运营",

    contactLabel:
      "联系方式：",

    copyright:
      "日本地址英文转换",

    searching:
      "正在搜索…",

    converting:
      "正在转换…",

    copied:
      "✓ 已复制",

    copyFailed:
      "复制失败。",

    postalInvalid:
      "请输入7位日本邮政编码。",

    addressRequired:
      "请输入日本地址。",

    csvRequired:
      "请选择 CSV 文件。",

    csvInvalid:
      "请选择 CSV 或 TXT 文件。",

    csvTooLarge:
      "文件太大。请选择不超过 128MB 的 CSV 文件。"
  },


  ko: {

    title:
      "일본 주소 영문 변환",

    subtitle:
      "일본 우편번호나 주소를 입력하여 해외에서 사용할 수 있는 영문 주소 형식으로 변환합니다.",

    postalTab:
      "우편번호",

    addressTab:
      "일본 주소",

    csvTab:
      "CSV 일괄",

    postalTitle:
      "우편번호로 변환",

    postalDescription:
      "일본 우편번호를 입력하면 주소를 검색하여 변환합니다.",

    postalLabel:
      "우편번호",

    postalHelp:
      "예: 060-0041 또는 0600041",

    postalButton:
      "🔍 변환",

    addressTitle:
      "일본 주소로 변환",

    addressDescription:
      "일본어 주소를 입력하여 해외용 주소 형식으로 변환합니다.",

    addressLabel:
      "일본 주소",

    addressHelp:
      "예: 北海道札幌市中央区大通東",

    addressButton:
      "🔍 주소 변환",

    resultsTitle:
      "변환 결과",

    japaneseAddress:
      "일본어 주소",

    romaji:
      "로마자",

    internationalAddress:
      "해외용 주소",

    copy:
      "복사",

    csvTitle:
      "CSV 일괄 변환",

    csvDescription:
      "여러 주소를 한 번에 변환할 수 있습니다.",

    csvFormatTitle:
      "📄 CSV 파일 형식",

    csvFormatText:
      "최대 100개의 주소를 무료로 변환할 수 있습니다. 100개를 초과하는 경우 유료 서비스를 이용해야 합니다. 첫 번째 열에는 우편번호, 두 번째 열에는 주소를 입력하세요.",

    csvExampleLabel:
      "CSV 예시",

    csvFileLabel:
      "CSV 파일",

    csvHelp:
      "최대 100개의 주소를 무료로 변환할 수 있습니다.",

    csvButton:
      "📄 CSV 변환",

    csvResultsTitle:
      "CSV 변환 결과",

    csvResultNotePrefix:
      "총 ",

    csvResultNoteSuffix:
      "건 변환 완료. 화면에는 처음 5건만 표시됩니다.",

    downloadCsv:
      "⬇️ CSV 다운로드",

    guideTitle:
      "일본 주소 영문 변환 사용 방법",

    guide1Question:
      "우편번호로 일본 주소를 변환하려면 어떻게 하나요?",

    guide1Answer:
      "일본 우편번호를 입력하고 변환 버튼을 누르면 일본어 주소와 해외용 주소 형식이 표시됩니다.",

    guide2Question:
      "하이픈 없는 우편번호도 사용할 수 있나요?",

    guide2Answer:
      "네. 060-0041과 0600041 모두 사용할 수 있습니다.",

    guide3Question:
      "일본어 주소로 검색할 수 있나요?",

    guide3Answer:
      "네. 도도부현, 시구정촌, 지명 등의 일본어 주소를 입력하여 검색할 수 있습니다.",

    guide4Question:
      "CSV로 여러 주소를 한 번에 변환할 수 있나요?",

    guide4Answer:
      "네. CSV 파일을 업로드하면 최대 100건까지 무료로 일괄 변환할 수 있습니다. 100건을 초과하는 경우 유료 서비스를 이용해야 합니다.",

    guide5Question:
      "변환한 주소를 복사할 수 있나요?",

    guide5Answer:
      "복사 버튼을 누르면 해외용 주소를 바로 복사할 수 있습니다.",

    guideKnowledgeTitle:
      "일본 주소를 영어로 작성하는 기본 방법",

    guide11Question:
      "일본 주소를 영어로 작성할 때 어떤 순서로 쓰나요?",

    guide11Answer:
      "일본어 주소는 일반적으로 큰 지역에서 작은 지역 순서로 작성합니다. 해외용 주소에서는 번지나 지역과 같은 상세 정보부터 시구정촌, 도도부현, 우편번호, 국가 순으로 정리하는 방식이 많이 사용됩니다. 다만 배송 회사나 입력 양식에 따라 순서가 다를 수 있습니다.",

    guide12Question:
      "일본 주소의 丁目・番・号는 영어로 어떻게 작성하나요?",

    guide12Answer:
      "丁目, 番, 号는 일본 주소 구조를 나타내는 중요한 정보입니다. 해외용 주소에서는 읽기 쉽도록 숫자 정보를 다시 정리할 수 있습니다. 구체적인 형식은 주소와 배송 서비스에 따라 달라질 수 있으므로 실제 입력처의 형식도 확인하세요.",

    guide13Question:
      "아파트 이름과 방 번호는 어디에 작성하나요?",

    guide13Answer:
      "건물 이름과 방 번호는 배송지를 정확하게 확인하기 위해 중요한 정보입니다. 해외 주소에서는 방 번호와 건물 이름을 주소의 일부로 작성하는 경우가 많습니다. 온라인 양식에 별도의 입력란이 있다면 해당 서비스가 지정한 위치에 입력하세요.",

    guide14Question:
      "로마자 표기와 영어 주소는 같은 것인가요?",

    guide14Answer:
      "완전히 같은 의미는 아닙니다. 일본 지명을 알파벳으로 표시하는 경우 로마자 표기가 중심이지만, 해외용 주소에서는 각 주소 요소를 해외에서 이해하기 쉬운 순서로 정리할 수도 있습니다. 이 사이트는 일본 주소를 해외용 형식으로 정리할 때 참고할 수 있는 정보를 제공합니다.",

    guide15Question:
      "변환된 주소를 해외 배송에 그대로 사용할 수 있나요?",

    guide15Answer:
      "변환 결과는 해외 주소를 작성할 때 참고용으로 사용하세요. 배송 회사, 쇼핑 사이트, 금융기관, 행정기관 등에 따라 필요한 입력 형식이 다를 수 있습니다. 실제 사용하기 전에 해당 서비스의 주소 작성 방법을 확인하는 것을 권장합니다.",

    guideFaqTitle:
      "해외 배송 및 주소 작성 FAQ",

    guide6Question:
      "해외로 물건을 보낼 때 일본 주소는 어떻게 작성하나요?",

    guide6Answer:
      "해외 배송에서는 배송 회사나 서비스에서 요구하는 형식에 따라 번지, 지역, 시구정촌, 도도부현, 우편번호, 국가 등의 정보를 작성합니다. 이 사이트에서는 일본어 주소를 해외에서 사용할 수 있는 주소 형식으로 변환할 수 있습니다.",

    guide7Question:
      '해외 주소에 "Japan"을 입력해야 하나요?',

    guide7Answer:
      '국제 배송 주소에는 국가명을 명확하게 표시하는 것이 일반적입니다. 주소 마지막에 "Japan"을 추가하면 목적지 국가를 쉽게 확인할 수 있습니다.',

    guide8Question:
      "EMS나 국제우편, 해외 배송에 사용할 수 있나요?",

    guide8Answer:
      "네. EMS, 국제우편, 해외 쇼핑 사이트 등에서 일본 주소를 영어 또는 로마자로 입력할 때 참고할 수 있습니다. 다만 서비스마다 필요한 형식과 정보가 다를 수 있으므로 실제 배송 시에는 해당 배송 회사의 최신 안내를 확인하세요.",

    guide9Question:
      "구매대행, 해외 판매 및 업무용으로 사용할 수 있나요?",

    guide9Answer:
      "네. 구매대행, 크로스보더 전자상거래, 해외 배송 업무 등 여러 일본 주소를 정리해야 하는 경우에도 사용할 수 있습니다. 여러 주소를 처리할 때는 CSV 일괄 변환 기능을 이용할 수 있습니다.",

    guide10Question:
      "해외 배송 시 주소 외에 무엇을 확인해야 하나요?",

    guide10Answer:
      "국제 배송에서는 수취인 이름, 전화번호, 물품 내용, 수량, 무게, 가격 등의 정보가 필요할 수 있습니다. 통관 신고 등의 절차가 있을 수 있으므로 사용하는 배송 회사의 최신 안내를 확인하세요.",

    guideServiceTitle:
      "이 주소 변환 도구에 대하여",

    guide16Question:
      "이 웹사이트에서는 무엇을 할 수 있나요?",

    guide16Answer:
      "일본 우편번호 검색, 일본어 주소를 해외용 주소 형식으로 변환하는 기능, 여러 주소를 CSV로 일괄 변환하는 기능을 제공합니다. 해외 쇼핑, 국제우편, 주소 등록 등에서 일본 주소를 알파벳으로 작성할 때 참고할 수 있습니다.",

    guide17Question:
      "주소가 정확하게 변환되지 않는 경우에는 어떻게 하나요?",

    guide17Answer:
      "일본 주소에는 행정구역 변경, 특수한 지명, 건물명, 복잡한 번지 등 자동 변환만으로 판단하기 어려운 경우가 있습니다. 이런 경우에는 변환 결과만 사용하지 말고 원래의 일본어 주소와 함께 확인하세요.",

    guide18Question:
      "개인도 이 도구를 사용할 수 있나요?",

    guide18Answer:
      "네. 일본에 거주하는 외국인, 유학생, 해외 가족에게 물건을 보내는 사람, 해외 쇼핑 사이트에 일본 주소를 등록하는 사람 등 개인도 이용할 수 있습니다.",

    terms:
      "이용약관",

    privacy:
      "개인정보처리방침",

    contact:
      "문의",

    about:
      "운영자 정보",

    cooperation:
      "협업 및 게재",

    operator:
      "운영자: Liuweijie",

    serviceName:
      "서비스: Japan Address Converter",

    operationType:
      "운영 형태: 개인 운영",

    contactLabel:
      "연락처: ",

    copyright:
      "일본 주소 영문 변환",

    searching:
      "검색 중…",

    converting:
      "변환 중…",

    copied:
      "✓ 복사했습니다",

    copyFailed:
      "복사하지 못했습니다.",

    postalInvalid:
      "우편번호는 7자리로 입력해주세요.",

    addressRequired:
      "일본 주소를 입력해주세요.",

    csvRequired:
      "CSV 파일을 선택해주세요.",

    csvInvalid:
      "CSV 또는 TXT 파일을 선택해주세요.",

    csvTooLarge:
      "파일이 너무 큽니다. 128MB 이하의 CSV 파일을 선택해주세요."
  },


  vi: {

    title:
      "Chuyển đổi địa chỉ Nhật Bản sang tiếng Anh",

    subtitle:
      "Nhập mã bưu điện hoặc địa chỉ tiếng Nhật để chuyển sang định dạng địa chỉ quốc tế.",

    postalTab:
      "Mã bưu điện",

    addressTab:
      "Địa chỉ Nhật Bản",

    csvTab:
      "CSV hàng loạt",

    postalTitle:
      "Chuyển đổi bằng mã bưu điện",

    postalDescription:
      "Nhập mã bưu điện Nhật Bản để tìm và chuyển đổi địa chỉ.",

    postalLabel:
      "Mã bưu điện",

    postalHelp:
      "Ví dụ: 060-0041 hoặc 0600041",

    postalButton:
      "🔍 Chuyển đổi",

    addressTitle:
      "Chuyển đổi địa chỉ tiếng Nhật",

    addressDescription:
      "Nhập địa chỉ tiếng Nhật để chuyển sang định dạng quốc tế.",

    addressLabel:
      "Địa chỉ Nhật Bản",

    addressHelp:
      "Ví dụ: 北海道札幌市中央区大通東",

    addressButton:
      "🔍 Chuyển đổi địa chỉ",

    resultsTitle:
      "Kết quả chuyển đổi",

    japaneseAddress:
      "Địa chỉ tiếng Nhật",

    romaji:
      "ROMAJI",

    internationalAddress:
      "Địa chỉ quốc tế",

    copy:
      "Sao chép",

    csvTitle:
      "Chuyển đổi CSV hàng loạt",

    csvDescription:
      "Có thể chuyển đổi nhiều địa chỉ cùng lúc.",

    csvFormatTitle:
      "📄 Định dạng tệp CSV",

    csvFormatText:
      "Có thể chuyển đổi miễn phí tối đa 100 địa chỉ. Trên 100 địa chỉ cần sử dụng dịch vụ trả phí. Nhập mã bưu điện ở cột đầu tiên và địa chỉ ở cột thứ hai.",

    csvExampleLabel:
      "Ví dụ CSV",

    csvFileLabel:
      "Tệp CSV",

    csvHelp:
      "Có thể chuyển đổi miễn phí tối đa 100 địa chỉ.",

    csvButton:
      "📄 Chuyển đổi CSV",

    csvResultsTitle:
      "Kết quả CSV",

    csvResultNotePrefix:
      "Đã chuyển đổi thành công ",

    csvResultNoteSuffix:
      " địa chỉ. Chỉ hiển thị 5 địa chỉ đầu tiên.",

    downloadCsv:
      "⬇️ Tải CSV",

    guideTitle:
      "Cách sử dụng công cụ chuyển đổi địa chỉ Nhật Bản",

    guide1Question:
      "Làm thế nào để chuyển đổi địa chỉ bằng mã bưu điện?",

    guide1Answer:
      "Nhập mã bưu điện Nhật Bản và nhấn nút chuyển đổi. Địa chỉ tiếng Nhật và định dạng địa chỉ quốc tế sẽ được hiển thị.",

    guide2Question:
      "Có thể nhập mã bưu điện không có dấu gạch ngang không?",

    guide2Answer:
      "Có. Cả 060-0041 và 0600041 đều được hỗ trợ.",

    guide3Question:
      "Có thể tìm kiếm bằng địa chỉ tiếng Nhật không?",

    guide3Answer:
      "Có. Bạn có thể nhập tỉnh, thành phố, quận, khu vực và các thông tin địa chỉ khác bằng tiếng Nhật.",

    guide4Question:
      "Có thể chuyển đổi nhiều địa chỉ bằng CSV không?",

    guide4Answer:
      "Có. Bạn có thể tải tệp CSV lên và chuyển đổi miễn phí tối đa 100 địa chỉ. Trên 100 địa chỉ cần sử dụng dịch vụ trả phí.",

    guide5Question:
      "Có thể sao chép địa chỉ đã chuyển đổi không?",

    guide5Answer:
      "Nhấn nút sao chép để sao chép địa chỉ quốc tế.",

    guideKnowledgeTitle:
      "Cách viết địa chỉ Nhật Bản bằng tiếng Anh",

    guide11Question:
      "Địa chỉ Nhật Bản nên được viết theo thứ tự nào bằng tiếng Anh?",

    guide11Answer:
      "Địa chỉ tiếng Nhật thường được viết từ khu vực lớn đến khu vực nhỏ. Khi sử dụng quốc tế, địa chỉ thường được sắp xếp từ thông tin chi tiết như số nhà và khu vực, sau đó đến thành phố hoặc quận, tỉnh, mã bưu điện và quốc gia. Thứ tự cụ thể có thể khác nhau tùy công ty vận chuyển hoặc biểu mẫu trực tuyến.",

    guide12Question:
      "丁目・番・号 trong địa chỉ Nhật Bản được xử lý như thế nào?",

    guide12Answer:
      "丁目, 番 và 号 là những phần quan trọng trong cấu trúc địa chỉ Nhật Bản. Khi chuyển sang định dạng quốc tế, các thông tin số có thể được sắp xếp lại để dễ đọc hơn. Cách viết cụ thể có thể khác nhau tùy địa chỉ và dịch vụ vận chuyển.",

    guide13Question:
      "Tên tòa nhà và số phòng nên viết ở đâu?",

    guide13Answer:
      "Tên tòa nhà và số phòng rất quan trọng để xác định chính xác nơi nhận hàng. Trong địa chỉ quốc tế, số phòng và tên tòa nhà thường được đưa vào phần địa chỉ. Nếu biểu mẫu có ô riêng, hãy nhập theo yêu cầu của dịch vụ.",

    guide14Question:
      "Romaji và địa chỉ tiếng Anh có giống nhau không?",

    guide14Answer:
      "Không hoàn toàn giống nhau. Tên địa danh Nhật Bản viết bằng chữ Latin thường sử dụng romaji, trong khi địa chỉ quốc tế có thể sắp xếp lại các thành phần theo thứ tự dễ hiểu hơn đối với người nước ngoài. Công cụ này cung cấp định dạng tham khảo.",

    guide15Question:
      "Có thể sử dụng trực tiếp địa chỉ đã chuyển đổi để gửi hàng quốc tế không?",

    guide15Answer:
      "Hãy sử dụng kết quả chuyển đổi như một tài liệu tham khảo. Công ty vận chuyển, trang thương mại điện tử, tổ chức tài chính hoặc cơ quan hành chính có thể có yêu cầu khác nhau. Hãy kiểm tra định dạng được yêu cầu trước khi sử dụng.",

    guideFaqTitle:
      "FAQ về gửi hàng quốc tế và địa chỉ",

    guide6Question:
      "Khi gửi hàng ra nước ngoài, địa chỉ Nhật Bản nên được viết như thế nào?",

    guide6Answer:
      "Khi sử dụng địa chỉ Nhật Bản cho việc gửi hàng quốc tế, hãy điền các thông tin như số nhà, khu vực, thành phố hoặc quận, tỉnh, mã bưu điện và quốc gia theo định dạng được yêu cầu bởi công ty vận chuyển hoặc dịch vụ bạn sử dụng. Công cụ này giúp chuyển địa chỉ tiếng Nhật sang định dạng quốc tế để tham khảo.",

    guide7Question:
      'Có cần thêm "Japan" vào địa chỉ quốc tế không?',

    guide7Answer:
      'Đối với địa chỉ quốc tế, việc ghi rõ tên quốc gia là thông thường. Thêm "Japan" ở cuối địa chỉ giúp xác định quốc gia nhận hàng rõ ràng hơn.',

    guide8Question:
      "Có thể sử dụng cho EMS, bưu điện quốc tế hoặc gửi hàng ra nước ngoài không?",

    guide8Answer:
      "Có. Bạn có thể sử dụng kết quả chuyển đổi làm tài liệu tham khảo khi nhập địa chỉ Nhật Bản bằng tiếng Anh hoặc romaji cho EMS, bưu điện quốc tế và các trang mua sắm quốc tế. Tuy nhiên, định dạng và thông tin cần thiết có thể khác nhau tùy dịch vụ, vì vậy hãy kiểm tra hướng dẫn mới nhất của công ty vận chuyển.",

    guide9Question:
      "Có thể sử dụng cho mua hộ, thương mại điện tử xuyên biên giới hoặc công việc kinh doanh không?",

    guide9Answer:
      "Có. Công cụ có thể được sử dụng khi xử lý nhiều địa chỉ Nhật Bản cho dịch vụ mua hộ, thương mại điện tử xuyên biên giới hoặc hoạt động gửi hàng quốc tế. CSV hàng loạt thuận tiện khi xử lý nhiều địa chỉ.",

    guide10Question:
      "Ngoài địa chỉ, cần kiểm tra gì khi gửi hàng quốc tế?",

    guide10Answer:
      "Gửi hàng quốc tế có thể yêu cầu tên người nhận, số điện thoại, nội dung hàng hóa, số lượng, trọng lượng và giá trị. Có thể cũng cần khai báo hải quan, vì vậy hãy kiểm tra các yêu cầu mới nhất của công ty vận chuyển hoặc dịch vụ bạn sử dụng.",

    guideServiceTitle:
      "Về công cụ chuyển đổi địa chỉ này",

    guide16Question:
      "Trang web này có thể làm gì?",

    guide16Answer:
      "Trang web cung cấp chức năng tra cứu mã bưu điện Nhật Bản, chuyển địa chỉ tiếng Nhật sang định dạng quốc tế và chuyển đổi nhiều địa chỉ bằng CSV. Có thể sử dụng làm tài liệu tham khảo khi chuẩn bị địa chỉ Nhật Bản cho mua sắm quốc tế, thư quốc tế và đăng ký địa chỉ.",

    guide17Question:
      "Nếu địa chỉ không thể chuyển đổi chính xác thì phải làm gì?",

    guide17Answer:
      "Một số địa chỉ Nhật Bản có thể khó xử lý tự động do thay đổi đơn vị hành chính, tên địa danh đặc biệt, tên tòa nhà hoặc cách đánh số phức tạp. Trong trường hợp này, hãy kiểm tra kết quả cùng với địa chỉ tiếng Nhật ban đầu.",

    guide18Question:
      "Cá nhân có thể sử dụng công cụ này không?",

    guide18Answer:
      "Có. Công cụ phù hợp với người nước ngoài sống tại Nhật Bản, du học sinh, người gửi hàng cho gia đình ở nước ngoài và người cần đăng ký địa chỉ Nhật Bản trên các trang mua sắm quốc tế.",

    terms:
      "Điều khoản sử dụng",

    privacy:
      "Chính sách bảo mật",

    contact:
      "Liên hệ",

    about:
      "Thông tin người vận hành",

    cooperation:
      "Hợp tác & đăng tải",

    operator:
      "Người vận hành: Liuweijie",

    serviceName:
      "Dịch vụ: Japan Address Converter",

    operationType:
      "Hình thức: Cá nhân vận hành",

    contactLabel:
      "Liên hệ: ",

    copyright:
      "Chuyển đổi địa chỉ Nhật Bản",

    searching:
      "Đang tìm kiếm…",

    converting:
      "Đang chuyển đổi…",

    copied:
      "✓ Đã sao chép",

    copyFailed:
      "Không thể sao chép.",

    postalInvalid:
      "Vui lòng nhập mã bưu điện gồm 7 chữ số.",

    addressRequired:
      "Vui lòng nhập địa chỉ Nhật Bản.",

    csvRequired:
      "Vui lòng chọn tệp CSV.",

    csvInvalid:
      "Vui lòng chọn tệp CSV hoặc TXT.",

    csvTooLarge:
      "Tệp quá lớn. Vui lòng chọn tệp CSV không quá 128MB."
  }

};


/* =========================================================
 * LANGUAGE
 * ========================================================= */

function getInitialLanguage() {

  const browserLanguage = (
    navigator.language ||
    navigator.userLanguage ||
    ""
  ).toLowerCase();

  if (browserLanguage.startsWith("ja")) {
    return "ja";
  }

  if (browserLanguage.startsWith("zh")) {
    return "zh";
  }

  if (browserLanguage.startsWith("ko")) {
    return "ko";
  }

  if (browserLanguage.startsWith("vi")) {
    return "vi";
  }

  if (browserLanguage.startsWith("en")) {
    return "en";
  }

  return "ja";
}


function getCurrentLanguage() {

  try {

    const savedLanguage =
      localStorage.getItem(
        "addressConverterLanguage"
      );

    if (
      savedLanguage &&
      Object.prototype.hasOwnProperty.call(
        translations,
        savedLanguage
      )
    ) {
      return savedLanguage;
    }

  } catch (error) {
    // Ignore localStorage errors.
  }

  return getInitialLanguage();
}


function applyLanguage(language) {

  if (
    !language ||
    !Object.prototype.hasOwnProperty.call(
      translations,
      language
    )
  ) {
    language = "ja";
  }

  const data =
    translations[language];

  document.documentElement.lang =
    language;

  document
    .querySelectorAll("[data-i18n]")
    .forEach((element) => {

      const key =
        element.getAttribute(
          "data-i18n"
        );

      if (
        Object.prototype.hasOwnProperty.call(
          data,
          key
        )
      ) {

        element.innerHTML =
          data[key];

      }

    });


  if (data.title) {
    document.title =
      data.title;
  }


  const languageSelect =
    document.getElementById(
      "language-select"
    );

  if (languageSelect) {
    languageSelect.value =
      language;
  }


  try {

    localStorage.setItem(
      "addressConverterLanguage",
      language
    );

  } catch (error) {
    // Ignore localStorage errors.
  }
}


/* =========================================================
 * TAB
 * ========================================================= */

function activateTab(target) {

  if (
    ![
      "postal",
      "address",
      "csv"
    ].includes(target)
  ) {
    target = "postal";
  }


  document
    .querySelectorAll(".tab")
    .forEach((tab) => {

      const isActive =
        tab.dataset.tab === target;

      tab.classList.toggle(
        "active",
        isActive
      );

      tab.setAttribute(
        "aria-selected",
        isActive
          ? "true"
          : "false"
      );

      tab.setAttribute(
        "tabindex",
        isActive
          ? "0"
          : "-1"
      );

    });


  document
    .querySelectorAll(".panel")
    .forEach((panel) => {

      const isActive =
        panel.id ===
        `panel-${target}`;

      panel.classList.toggle(
        "active",
        isActive
      );

      panel.setAttribute(
        "aria-hidden",
        isActive
          ? "false"
          : "true"
      );

    });

}


function setupTabs() {

  const tabs =
    document.querySelectorAll(
      ".tab"
    );

  tabs.forEach((tab) => {

    tab.addEventListener(
      "click",
      () => {

        activateTab(
          tab.dataset.tab
        );

      }
    );


    tab.addEventListener(
      "keydown",
      (event) => {

        const currentIndex =
          Array.from(tabs)
            .indexOf(tab);

        let nextIndex =
          currentIndex;


        if (
          event.key ===
          "ArrowRight"
        ) {

          nextIndex =
            (
              currentIndex +
              1
            ) % tabs.length;

        } else if (
          event.key ===
          "ArrowLeft"
        ) {

          nextIndex =
            (
              currentIndex -
              1 +
              tabs.length
            ) % tabs.length;

        } else if (
          event.key ===
          "Home"
        ) {

          nextIndex = 0;

        } else if (
          event.key ===
          "End"
        ) {

          nextIndex =
            tabs.length - 1;

        } else {

          return;

        }


        event.preventDefault();


        const nextTab =
          tabs[nextIndex];

        activateTab(
          nextTab.dataset.tab
        );

        nextTab.focus();

      }
    );

  });

}


/* =========================================================
 * RESULT SCROLL
 * ========================================================= */

function scrollToResults() {

  const results =
    document.querySelector(
      ".results"
    );

  if (!results) {
    return;
  }


  window.setTimeout(() => {

    const rect =
      results.getBoundingClientRect();

    const targetTop =
      window.scrollY +
      rect.top -
      20;

    const prefersReducedMotion =
      window.matchMedia(
        "(prefers-reduced-motion: reduce)"
      ).matches;


    window.scrollTo({

      top:
        Math.max(
          targetTop,
          0
        ),

      behavior:
        prefersReducedMotion
          ? "auto"
          : "smooth"

    });

  }, 250);

}


/* =========================================================
 * POSTAL INPUT
 * ========================================================= */

function normalizePostalCode(value) {

  return String(value || "")
    .replace(
      /[０-９]/g,
      (char) => {

        return String.fromCharCode(
          char.charCodeAt(0) -
          0xfee0
        );

      }
    )
    .replace(
      /\D/g,
      ""
    )
    .slice(
      0,
      7
    );

}


function formatPostalCode(value) {

  const digits =
    normalizePostalCode(
      value
    );

  if (
    digits.length <= 3
  ) {
    return digits;
  }

  return (
    digits.slice(
      0,
      3
    ) +
    "-" +
    digits.slice(
      3
    )
  );

}


function setupPostalInput() {

  const input =
    document.getElementById(
      "postal_code"
    );

  if (!input) {
    return;
  }


  input.addEventListener(
    "input",
    () => {

      input.value =
        formatPostalCode(
          input.value
        );

      input.setCustomValidity(
        ""
      );

      input.removeAttribute(
        "aria-invalid"
      );

    }
  );


  input.addEventListener(
    "blur",
    () => {

      if (
        !input.value.trim()
      ) {
        return;
      }

      input.value =
        formatPostalCode(
          input.value
        );

    }
  );

}


/* =========================================================
 * FORM SUBMIT
 * ========================================================= */

function setupPostalForm() {

  const form =
    document.getElementById(
      "postal-form"
    );

  if (!form) {
    return;
  }


  const button =
    form.querySelector(
      ".primary-button"
    );

  const input =
    document.getElementById(
      "postal_code"
    );


  form.addEventListener(
    "submit",
    (event) => {

      const language =
        getCurrentLanguage();

      const data =
        translations[language];

      const postal =
        normalizePostalCode(
          input
            ? input.value
            : ""
        );


      if (
        postal.length !== 7
      ) {

        event.preventDefault();

        if (input) {

          input.setAttribute(
            "aria-invalid",
            "true"
          );

          input.setCustomValidity(
            data.postalInvalid
          );

          input.reportValidity();

          input.focus();

        }

        return;
      }


      if (input) {

        input.value =
          postal.slice(
            0,
            3
          ) +
          "-" +
          postal.slice(
            3
          );

      }


      if (button) {

        button.disabled =
          true;

        button.setAttribute(
          "aria-busy",
          "true"
        );

        button.textContent =
          data.searching;

      }

    }
  );

}


/* =========================================================
 * ADDRESS FORM
 * ========================================================= */

function setupAddressForm() {

  const form =
    document.getElementById(
      "address-form"
    );

  if (!form) {
    return;
  }


  const button =
    form.querySelector(
      ".primary-button"
    );

  const input =
    document.getElementById(
      "input_address"
    );


  if (input) {

    input.addEventListener(
      "input",
      () => {

        input.setCustomValidity(
          ""
        );

        input.removeAttribute(
          "aria-invalid"
        );

      }
    );

  }


  form.addEventListener(
    "submit",
    (event) => {

      const language =
        getCurrentLanguage();

      const data =
        translations[language];

      const value =
        input
          ? input.value.trim()
          : "";


      if (!value) {

        event.preventDefault();

        if (input) {

          input.setAttribute(
            "aria-invalid",
            "true"
          );

          input.setCustomValidity(
            data.addressRequired
          );

          input.reportValidity();

          input.focus();

        }

        return;
      }


      if (input) {
        input.value =
          value;
      }


      if (button) {

        button.disabled =
          true;

        button.setAttribute(
          "aria-busy",
          "true"
        );

        button.textContent =
          data.searching;

      }

    }
  );

}


/* =========================================================
 * CSV FORM
 * ========================================================= */

const MAX_CSV_FILE_SIZE =
  128 * 1024 * 1024;


function setupCsvForm() {

  const form =
    document.getElementById(
      "csv-form"
    );

  if (!form) {
    return;
  }


  const input =
    document.getElementById(
      "csv_file"
    );

  const button =
    document.getElementById(
      "csv-button"
    );

  const fileInfo =
    document.getElementById(
      "csv-file-info"
    );


  if (!input) {
    return;
  }


  input.addEventListener(
    "change",
    () => {

      const file =
        input.files &&
          input.files.length > 0
          ? input.files[0]
          : null;


      input.setCustomValidity(
        ""
      );

      input.removeAttribute(
        "aria-invalid"
      );


      if (!file) {

        if (fileInfo) {

          fileInfo.textContent =
            "";

          fileInfo.classList.remove(
            "visible"
          );

        }

        return;
      }


      if (fileInfo) {

        fileInfo.textContent =
          `${file.name} (${formatFileSize(file.size)})`;

        fileInfo.classList.add(
          "visible"
        );

      }

    }
  );


  form.addEventListener(
    "submit",
    (event) => {

      const language =
        getCurrentLanguage();

      const data =
        translations[language];

      const file =
        input.files &&
          input.files.length > 0
          ? input.files[0]
          : null;


      if (!file) {

        event.preventDefault();

        input.setAttribute(
          "aria-invalid",
          "true"
        );

        input.setCustomValidity(
          data.csvRequired
        );

        input.reportValidity();

        return;
      }


      const fileName =
        file.name.toLowerCase();


      const isValidExtension =
        fileName.endsWith(".csv") ||
        fileName.endsWith(".txt");


      if (!isValidExtension) {

        event.preventDefault();

        input.setAttribute(
          "aria-invalid",
          "true"
        );

        input.setCustomValidity(
          data.csvInvalid
        );

        input.reportValidity();

        return;
      }


      if (
        file.size >
        MAX_CSV_FILE_SIZE
      ) {

        event.preventDefault();

        input.setAttribute(
          "aria-invalid",
          "true"
        );

        input.setCustomValidity(
          data.csvTooLarge
        );

        input.reportValidity();

        return;
      }


      input.setCustomValidity(
        ""
      );

      input.removeAttribute(
        "aria-invalid"
      );


      if (button) {

        button.disabled =
          true;

        button.setAttribute(
          "aria-busy",
          "true"
        );

        button.textContent =
          data.converting;

      }

    }
  );

}


function formatFileSize(bytes) {

  if (
    bytes < 1024
  ) {
    return `${bytes} B`;
  }


  if (
    bytes <
    1024 * 1024
  ) {
    return `${(
      bytes / 1024
    ).toFixed(1)} KB`;
  }


  if (
    bytes <
    1024 * 1024 * 1024
  ) {
    return `${(
      bytes /
      (1024 * 1024)
    ).toFixed(1)} MB`;
  }


  return `${(
    bytes /
    (1024 * 1024 * 1024)
  ).toFixed(1)} GB`;

}


/* =========================================================
 * COPY
 * ========================================================= */

async function copyAddress(button) {

  if (!button) {
    return;
  }


  const targetId =
    button.getAttribute(
      "data-target"
    );

  if (!targetId) {
    return;
  }


  const target =
    document.getElementById(
      targetId
    );

  if (!target) {
    return;
  }


  const text =
    target.innerText.trim();

  if (!text) {
    return;
  }


  const language =
    getCurrentLanguage();

  const data =
    translations[language];


  const originalText =
    button.dataset.original ||
    button.textContent.trim();


  button.dataset.original =
    originalText;


  try {

    if (
      navigator.clipboard &&
      window.isSecureContext
    ) {

      await navigator.clipboard.writeText(
        text
      );

    } else {

      copyFallback(
        text
      );

    }


    showCopiedState(
      button,
      data.copied
    );


  } catch (error) {

    try {

      copyFallback(
        text
      );

      showCopiedState(
        button,
        data.copied
      );

    } catch (fallbackError) {

      window.alert(
        data.copyFailed
      );

    }

  }

}


function showCopiedState(
  button,
  copiedText
) {

  const originalText =
    button.dataset.original ||
    button.textContent.trim();


  button.classList.add(
    "copied"
  );

  button.textContent =
    copiedText;


  if (button._copyTimer) {

    clearTimeout(
      button._copyTimer
    );

  }


  button._copyTimer =
    setTimeout(
      () => {

        button.classList.remove(
          "copied"
        );

        button.textContent =
          originalText;

      },
      1800
    );

}


function copyFallback(text) {

  const textarea =
    document.createElement(
      "textarea"
    );


  textarea.value =
    text;

  textarea.setAttribute(
    "readonly",
    ""
  );

  textarea.style.position =
    "fixed";

  textarea.style.left =
    "-9999px";

  textarea.style.top =
    "0";

  textarea.style.opacity =
    "0";


  document.body.appendChild(
    textarea
  );


  textarea.focus();

  textarea.select();


  const success =
    document.execCommand(
      "copy"
    );


  document.body.removeChild(
    textarea
  );


  if (!success) {

    throw new Error(
      "Copy command failed."
    );

  }

}


/* =========================================================
 * COPY BUTTON EVENTS
 * ========================================================= */

function setupCopyButtons() {

  document
    .querySelectorAll(
      ".copy-button"
    )
    .forEach((button) => {

      button.addEventListener(
        "click",
        () => {

          copyAddress(
            button
          );

        }
      );

    });

}


/* =========================================================
 * CONFIG / INITIAL TAB
 * ========================================================= */

function setupInitialState() {

  const config =
    window.addressConverterConfig ||
    {};


  if (
    config.hasCsvResults ||
    config.hasCsvError
  ) {

    activateTab(
      "csv"
    );

    return;
  }


  if (
    config.searchType ===
    "address"
  ) {

    activateTab(
      "address"
    );

    return;
  }


  activateTab(
    "postal"
  );

}


/* =========================================================
 * RESULT SCROLL
 * ========================================================= */

function setupResultScroll() {

  const config =
    window.addressConverterConfig ||
    {};


  if (
    config.searchType ===
    "postal" ||
    config.searchType ===
    "address" ||
    config.hasCsvResults ||
    config.hasCsvError
  ) {

    scrollToResults();

  }

}


/* =========================================================
 * FORM ERROR RESET
 * ========================================================= */

function clearValidityOnInput() {

  document
    .querySelectorAll(
      "input, textarea"
    )
    .forEach((input) => {

      input.addEventListener(
        "input",
        () => {

          input.setCustomValidity(
            ""
          );

          input.removeAttribute(
            "aria-invalid"
          );

        }
      );

    });

}


/* =========================================================
 * DOM READY
 * ========================================================= */

document.addEventListener(
  "DOMContentLoaded",
  () => {

    const initialLanguage =
      getCurrentLanguage();

    applyLanguage(
      initialLanguage
    );


    const languageSelect =
      document.getElementById(
        "language-select"
      );


    if (languageSelect) {

      languageSelect.addEventListener(
        "change",
        () => {

          applyLanguage(
            languageSelect.value
          );

        }
      );

    }


    setupTabs();

    setupPostalInput();

    setupPostalForm();

    setupAddressForm();

    setupCsvForm();

    setupCopyButtons();

    clearValidityOnInput();

    setupInitialState();

    setupResultScroll();

  }
);