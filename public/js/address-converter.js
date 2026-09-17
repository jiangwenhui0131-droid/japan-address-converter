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

    /* =========================
       GUIDE
    ========================= */

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

    guideFaqTitle:
      '海外発送・住所表記 FAQ',

    guide6Question:
      '海外に荷物を送るとき、住所はどう書けばいいですか？',

    guide6Answer:
      '日本の住所を海外向けに書く場合は、番地・町名から市区町村、都道府県、郵便番号、国名の順に並べる形式がよく使われます。このサイトでは、日本語住所を入力して海外向けの住所表記を確認できます。',

    guide7Question:
      '海外発送では「Japan」を付ける必要がありますか？',

    guide7Answer:
      '海外向けの宛先では国名を明記することが一般的です。日本の住所を海外向けに使用する場合は、最後に「Japan」を付けると国が分かりやすくなります。',

    guide8Question:
      'EMS・国際郵便・海外配送の住所入力に使えますか？',

    guide8Answer:
      'はい。EMS、国際郵便、海外通販サイトなどで日本の住所を英語・ローマ字表記にする際の参考として利用できます。ただし、入力形式や必要項目はサービスによって異なるため、発送時は利用する配送会社やサービスの案内も確認してください。',

    guide9Question:
      '代購・越境EC・業務用にも利用できますか？',

    guide9Answer:
      'はい。代購、越境EC、海外発送業務など、複数の日本住所を海外向けに整理する場面でも利用できます。複数件を処理する場合はCSV一括変換が便利です。',

    guide10Question:
      '海外発送では住所以外に何を確認すればいいですか？',

    guide10Answer:
      '国際配送では、宛名、電話番号、内容品、数量、重量、価格などの情報が必要になる場合があります。税関申告などの手続きもあるため、住所だけでなく、利用する配送会社・サービスの最新の案内を確認してください。',

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

    /* =========================
       GUIDE
    ========================= */

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

    guideFaqTitle:
      'International Shipping & Address FAQ',

    guide6Question:
      'How should I write a Japanese address when shipping overseas?',

    guide6Answer:
      'When writing a Japanese address for international use, a common format is to arrange the address from the street or town information to the city or ward, prefecture, postal code, and country. This site helps you check a Japanese address in an international format.',

    guide7Question:
      'Should I include "Japan" in an international address?',

    guide7Answer:
      'It is generally recommended to clearly include the country name for international destinations. Adding "Japan" at the end makes the destination country easy to identify.',

    guide8Question:
      'Can I use this for EMS, international mail, or overseas shipping?',

    guide8Answer:
      'Yes. You can use the converted address as a reference when entering Japanese addresses in English or romaji for EMS, international mail, overseas shopping sites, and similar services. Required formats and information may vary, so please also check the latest instructions from the shipping company or service you use.',

    guide9Question:
      'Can this be used for proxy buying, cross-border e-commerce, or business purposes?',

    guide9Answer:
      'Yes. It can be useful when organizing multiple Japanese addresses for proxy buying, cross-border e-commerce, or overseas shipping operations. CSV batch conversion can be convenient when processing multiple addresses.',

    guide10Question:
      'What should I check besides the address when shipping overseas?',

    guide10Answer:
      'International shipments may require information such as the recipient name, phone number, contents, quantity, weight, and value. Customs declarations and other procedures may also apply, so please check the latest requirements of the shipping company or service you use.',

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

    /* =========================
       GUIDE
    ========================= */

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

    guideFaqTitle:
      '海外邮寄・地址填写 FAQ',

    guide6Question:
      '寄东西到海外时，日本地址应该怎么填写？',

    guide6Answer:
      '将日本地址用于海外寄送时，通常会将地址按照街道、町名、城市或区、都道府县、邮政编码、国家的形式进行排列。本网站可以帮助你将日本地址转换为适合海外使用的格式。',

    guide7Question:
      '海外地址中需要填写“Japan”吗？',

    guide7Answer:
      '国际寄送时通常需要明确填写国家名称。在地址最后添加“Japan”，可以让收件国家更加清楚。',

    guide8Question:
      '可以用于 EMS、国际邮便和海外配送吗？',

    guide8Answer:
      '可以。使用 EMS、国际邮便、海外购物网站等服务时，如果需要将日本地址填写为英文或罗马字，可以参考本网站的转换结果。但不同配送公司和服务的填写格式及必要信息可能不同，实际寄送时请同时确认相关配送公司的最新要求。',

    guide9Question:
      '代购、跨境电商或企业业务可以使用吗？',

    guide9Answer:
      '可以。对于代购、跨境电商、海外发货等业务，需要整理多个日本地址时也可以使用。需要处理多个地址时，可以使用 CSV 批量转换功能。',

    guide10Question:
      '海外寄送时，除了地址还需要确认什么？',

    guide10Answer:
      '国际配送可能还需要收件人姓名、电话号码、物品内容、数量、重量、价格等信息。同时可能涉及海关申报等手续，因此除了确认地址之外，也请确认所使用的配送公司或服务的最新要求。',

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

    /* =========================
       GUIDE
    ========================= */

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

    guideFaqTitle:
      '해외 배송・주소 표기 FAQ',

    guide6Question:
      '해외로 물건을 보낼 때 일본 주소는 어떻게 작성하나요?',

    guide6Answer:
      '일본 주소를 해외 배송용으로 작성할 때는 일반적으로 번지와 지역 정보부터 시·구, 도도부현, 우편번호, 국가 순서로 배열합니다. 이 사이트에서는 일본어 주소를 입력하여 해외에서 사용할 수 있는 형식을 확인할 수 있습니다.',

    guide7Question:
      '해외 주소에 "Japan"을 적어야 하나요?',

    guide7Answer:
      '국제 배송 주소에는 국가명을 명확하게 표시하는 것이 일반적입니다. 주소 마지막에 "Japan"을 추가하면 배송 국가를 쉽게 확인할 수 있습니다.',

    guide8Question:
      'EMS, 국제우편, 해외 배송에 사용할 수 있나요?',

    guide8Answer:
      '네. EMS, 국제우편, 해외 쇼핑 사이트 등에서 일본 주소를 영어 또는 로마자 형식으로 입력할 때 참고할 수 있습니다. 다만 배송 회사와 서비스에 따라 입력 형식과 필요한 정보가 다를 수 있으므로 실제 발송 시에는 해당 서비스의 최신 안내도 확인하세요.',

    guide9Question:
      '구매대행, 크로스보더 EC, 업무용으로도 사용할 수 있나요?',

    guide9Answer:
      '네. 구매대행, 크로스보더 EC, 해외 배송 업무 등 여러 일본 주소를 해외용으로 정리해야 하는 경우에도 사용할 수 있습니다. 여러 주소를 처리할 때는 CSV 일괄 변환 기능이 편리합니다.',

    guide10Question:
      '해외 배송 시 주소 외에 무엇을 확인해야 하나요?',

    guide10Answer:
      '국제 배송에서는 수취인 이름, 전화번호, 물품 내용, 수량, 중량, 가격 등의 정보가 필요할 수 있습니다. 세관 신고 등의 절차도 있을 수 있으므로 주소뿐만 아니라 이용하는 배송 회사나 서비스의 최신 안내를 확인하세요.',

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

    /* =========================
       GUIDE
    ========================= */

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

    guideFaqTitle:
      'FAQ về gửi hàng quốc tế và cách ghi địa chỉ',

    guide6Question:
      'Khi gửi hàng ra nước ngoài, nên ghi địa chỉ Nhật Bản như thế nào?',

    guide6Answer:
      'Khi sử dụng địa chỉ Nhật Bản cho việc gửi hàng quốc tế, thông thường thông tin được sắp xếp từ khu vực và số nhà đến thành phố hoặc quận, tỉnh, mã bưu điện và quốc gia. Công cụ này giúp bạn kiểm tra địa chỉ Nhật Bản ở định dạng phù hợp cho sử dụng quốc tế.',

    guide7Question:
      'Có cần ghi "Japan" trong địa chỉ quốc tế không?',

    guide7Answer:
      'Đối với địa chỉ gửi hàng quốc tế, việc ghi rõ tên quốc gia là thông lệ phổ biến. Thêm "Japan" ở cuối địa chỉ giúp xác định rõ quốc gia nhận hàng.',

    guide8Question:
      'Có thể sử dụng cho EMS, bưu điện quốc tế và vận chuyển quốc tế không?',

    guide8Answer:
      'Có. Bạn có thể tham khảo kết quả khi cần nhập địa chỉ Nhật Bản bằng tiếng Anh hoặc romaji cho EMS, bưu phẩm quốc tế, các trang mua sắm nước ngoài và các dịch vụ tương tự. Tuy nhiên, định dạng và thông tin cần thiết có thể khác nhau tùy dịch vụ, vì vậy hãy kiểm tra hướng dẫn mới nhất của công ty vận chuyển hoặc dịch vụ bạn sử dụng.',

    guide9Question:
      'Có thể sử dụng cho mua hộ, thương mại điện tử xuyên biên giới hoặc công việc kinh doanh không?',

    guide9Answer:
      'Có. Công cụ có thể hữu ích khi cần sắp xếp nhiều địa chỉ Nhật Bản cho dịch vụ mua hộ, thương mại điện tử xuyên biên giới hoặc hoạt động gửi hàng quốc tế. Khi xử lý nhiều địa chỉ, chức năng chuyển đổi CSV hàng loạt sẽ thuận tiện hơn.',

    guide10Question:
      'Khi gửi hàng quốc tế, ngoài địa chỉ cần kiểm tra những gì?',

    guide10Answer:
      'Vận chuyển quốc tế có thể yêu cầu tên người nhận, số điện thoại, nội dung hàng hóa, số lượng, trọng lượng và giá trị hàng hóa. Có thể cũng cần thực hiện khai báo hải quan và các thủ tục khác, vì vậy hãy kiểm tra các yêu cầu mới nhất của công ty vận chuyển hoặc dịch vụ bạn sử dụng.',

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
   TAB / PAGE INITIALIZATION
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

    const config =
      window.addressConverterConfig
      || {};

    const searchType =
      config.searchType
      || '';

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

    if (
      config.hasCsvResults
      ||
      config.hasCsvError
    ) {

      activateTab(
        'csv'
      );

    }


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