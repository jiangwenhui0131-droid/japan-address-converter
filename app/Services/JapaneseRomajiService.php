<?php

namespace App\Services;

class JapaneseRomajiService
{
    /**
     * 日文假名 → 罗马字
     *
     * 主要用于建筑物名称等：
     * - 平假名
     * - 片假名
     *
     * 汉字：
     * - 如果 MeCab 可用，则先转换成读音
     * - 然后再通过下面的假名转换逻辑转换成罗马字
     */
    public function convert(string $text): string
    {
        $text = $this->normalizeInput($text);

        if ($text === '') {
            return '';
        }

        /**
         * 汉字が含まれている場合は、
         * MeCabで読み仮名に変換
         */
        if (
            $this->containsKanji($text) &&
            extension_loaded('mecab')
        ) {
            $text = $this->convertKanjiWithMecab($text);
        }

        // 平假名 → 片假名
        $text = $this->hiraganaToKatakana($text);

        /**
         * 组合音
         *
         * 必须优先处理。
         */
        $digraphs = [
            'キャ' => 'kya',
            'キュ' => 'kyu',
            'キョ' => 'kyo',

            'ギャ' => 'gya',
            'ギュ' => 'gyu',
            'ギョ' => 'gyo',

            'シャ' => 'sha',
            'シュ' => 'shu',
            'ショ' => 'sho',

            'ジャ' => 'ja',
            'ジュ' => 'ju',
            'ジョ' => 'jo',

            'チャ' => 'cha',
            'チュ' => 'chu',
            'チョ' => 'cho',

            'ニャ' => 'nya',
            'ニュ' => 'nyu',
            'ニョ' => 'nyo',

            'ヒャ' => 'hya',
            'ヒュ' => 'hyu',
            'ヒョ' => 'hyo',

            'ビャ' => 'bya',
            'ビュ' => 'byu',
            'ビョ' => 'byo',

            'ピャ' => 'pya',
            'ピュ' => 'pyu',
            'ピョ' => 'pyo',

            'ミャ' => 'mya',
            'ミュ' => 'myu',
            'ミョ' => 'myo',

            'リャ' => 'rya',
            'リュ' => 'ryu',
            'リョ' => 'ryo',

            // 外来語
            'ティ' => 'ti',
            'ディ' => 'di',
            'トゥ' => 'tu',
            'ドゥ' => 'du',

            'チェ' => 'che',
            'シェ' => 'she',
            'ジェ' => 'je',

            'ツァ' => 'tsa',
            'ツィ' => 'tsi',
            'ツェ' => 'tse',
            'ツォ' => 'tso',

            'ファ' => 'fa',
            'フィ' => 'fi',
            'フェ' => 'fe',
            'フォ' => 'fo',

            'ウィ' => 'wi',
            'ウェ' => 'we',
            'ウォ' => 'wo',

            'ヴァ' => 'va',
            'ヴィ' => 'vi',
            'ヴェ' => 've',
            'ヴォ' => 'vo',

            'クァ' => 'kwa',
            'クィ' => 'kwi',
            'クェ' => 'kwe',
            'クォ' => 'kwo',

            'グァ' => 'gwa',
            'グィ' => 'gwi',
            'グェ' => 'gwe',
            'グォ' => 'gwo',

            'イェ' => 'ye',
            'ウァ' => 'wa',
            'ウュ' => 'wyu',
        ];

        /**
         * 普通假名
         */
        $kana = [
            'ア' => 'a',
            'イ' => 'i',
            'ウ' => 'u',
            'エ' => 'e',
            'オ' => 'o',

            'カ' => 'ka',
            'キ' => 'ki',
            'ク' => 'ku',
            'ケ' => 'ke',
            'コ' => 'ko',

            'ガ' => 'ga',
            'ギ' => 'gi',
            'グ' => 'gu',
            'ゲ' => 'ge',
            'ゴ' => 'go',

            'サ' => 'sa',
            'シ' => 'shi',
            'ス' => 'su',
            'セ' => 'se',
            'ソ' => 'so',

            'ザ' => 'za',
            'ジ' => 'ji',
            'ズ' => 'zu',
            'ゼ' => 'ze',
            'ゾ' => 'zo',

            'タ' => 'ta',
            'チ' => 'chi',
            'ツ' => 'tsu',
            'テ' => 'te',
            'ト' => 'to',

            'ダ' => 'da',
            'ヂ' => 'ji',
            'ヅ' => 'zu',
            'デ' => 'de',
            'ド' => 'do',

            'ナ' => 'na',
            'ニ' => 'ni',
            'ヌ' => 'nu',
            'ネ' => 'ne',
            'ノ' => 'no',

            'ハ' => 'ha',
            'ヒ' => 'hi',
            'フ' => 'fu',
            'ヘ' => 'he',
            'ホ' => 'ho',

            'バ' => 'ba',
            'ビ' => 'bi',
            'ブ' => 'bu',
            'ベ' => 'be',
            'ボ' => 'bo',

            'パ' => 'pa',
            'ピ' => 'pi',
            'プ' => 'pu',
            'ペ' => 'pe',
            'ポ' => 'po',

            'マ' => 'ma',
            'ミ' => 'mi',
            'ム' => 'mu',
            'メ' => 'me',
            'モ' => 'mo',

            'ヤ' => 'ya',
            'ユ' => 'yu',
            'ヨ' => 'yo',

            'ラ' => 'ra',
            'リ' => 'ri',
            'ル' => 'ru',
            'レ' => 're',
            'ロ' => 'ro',

            'ワ' => 'wa',
            'ヲ' => 'o',
            'ン' => 'n',

            // 小假名
            'ァ' => 'a',
            'ィ' => 'i',
            'ゥ' => 'u',
            'ェ' => 'e',
            'ォ' => 'o',
            'ヮ' => 'wa',

            'ヴ' => 'vu',
        ];

        $chars = mb_str_split(
            $text,
            1,
            'UTF-8'
        );

        $result = '';

        $count = count($chars);

        for ($i = 0; $i < $count; $i++) {
            $char = $chars[$i];

            /**
             * 组合音
             */
            if (isset($chars[$i + 1])) {
                $pair = $char . $chars[$i + 1];

                if (isset($digraphs[$pair])) {
                    $result .= $digraphs[$pair];

                    $i++;

                    continue;
                }
            }

            /**
             * 长音符号「ー」
             */
            if ($char === 'ー') {
                $vowel = $this->getLastVowel($result);

                if ($vowel !== '') {
                    $result .= $vowel;
                }

                continue;
            }

            /**
             * 促音「ッ」
             */
            if ($char === 'ッ') {
                $nextRomaji = '';

                if (isset($chars[$i + 2])) {
                    $pair =
                        $chars[$i + 1] .
                        $chars[$i + 2];

                    if (isset($digraphs[$pair])) {
                        $nextRomaji = $digraphs[$pair];
                    }
                }

                if (
                    $nextRomaji === '' &&
                    isset($chars[$i + 1])
                ) {
                    $next = $chars[$i + 1];

                    if (isset($kana[$next])) {
                        $nextRomaji = $kana[$next];
                    }
                }

                if ($nextRomaji !== '') {
                    $first = strtolower(
                        substr($nextRomaji, 0, 1)
                    );

                    if ($first !== '') {
                        $result .= $first;
                    }
                }

                continue;
            }

            /**
             * 英文字母
             */
            if (
                preg_match(
                    '/^[A-Za-z]$/',
                    $char
                )
            ) {
                $result .= $char;

                continue;
            }

            /**
             * 数字
             */
            if (
                preg_match(
                    '/^[0-9]$/',
                    $char
                )
            ) {
                $result .= $char;

                continue;
            }

            /**
             * 空格
             */
            if ($char === ' ') {
                $result .= ' ';

                continue;
            }

            /**
             * ヶ / ヵ
             *
             * 这里保留原字符。
             *
             * 真正的地名读法应优先由
             * PostalCode 的 town_romaji 等数据决定。
             */
            if (
                $char === 'ヶ' ||
                $char === 'ヵ'
            ) {
                $result .= $char;

                continue;
            }

            /**
             * 普通假名
             */
            if (isset($kana[$char])) {
                $result .= $kana[$char];

                continue;
            }

            /**
             * 其他字符：
             * 汉字、标点、括号、- 等保持原样。
             */
            $result .= $char;
        }

        return $this->cleanupRomaji($result);
    }

    /**
     * 判断字符串中是否包含汉字
     */
    private function containsKanji(string $text): bool
    {
        return preg_match(
            '/[\x{3400}-\x{4DBF}\x{4E00}-\x{9FFF}]/u',
            $text
        ) === 1;
    }

    /**
     * 使用 MeCab 将汉字转换成读音
     *
     * 例如：
     *
     * 東京都新宿区西新宿
     *
     * ↓
     *
     * トウキョウトシンジュククニシシンジュク
     */
    private function convertKanjiWithMecab(string $text): string
    {
        try {
            $tagger = new \MeCab\Tagger();

            $parsed = $tagger->parse($text);

            if (
                $parsed === false ||
                $parsed === ''
            ) {
                return $text;
            }

            $lines = preg_split(
                '/\r\n|\r|\n/',
                trim($parsed)
            );

            $converted = '';

            foreach ($lines as $line) {
                $line = trim($line);

                if (
                    $line === '' ||
                    $line === 'EOS'
                ) {
                    continue;
                }

                $parts = explode(
                    "\t",
                    $line
                );

                /**
                 * 如果这一行没有正常的 MeCab 数据，
                 * 就直接保留原文字。
                 */
                if (count($parts) < 2) {
                    $converted .= $parts[0];

                    continue;
                }

                $surface = $parts[0];

                $features = explode(
                    ',',
                    $parts[1]
                );

                /**
                 * MeCab IPA词典：
                 *
                 * [0] 品詞
                 * [1] 品詞細分類1
                 * [2] 品詞細分類2
                 * [3] 品詞細分類3
                 * [4] 活用形
                 * [5] 活用型
                 * [6] 原形
                 * [7] 読み
                 * [8] 発音
                 *
                 * 例如：
                 *
                 * 東京
                 * ↓
                 * 東京,名詞,固有名詞,地域,一般,*,*,東京,トウキョウ,トーキョー
                 */
                if (
                    isset($features[7]) &&
                    $features[7] !== '' &&
                    $features[7] !== '*'
                ) {
                    $converted .= $features[7];
                } else {
                    /**
                     * 数字、符号等 MeCab 没有读音时，
                     * 保留原字符。
                     */
                    $converted .= $surface;
                }
            }

            return $converted;
        } catch (\Throwable $e) {
            /**
             * MeCab发生异常时，
             * 不影响原来的转换逻辑。
             */
            return $text;
        }
    }

    /**
     * 输入地址/名称统一
     */
    private function normalizeInput(string $text): string
    {
        $text = trim($text);

        if ($text === '') {
            return '';
        }

        /**
         * 全角英数字 → 半角
         */
        $text = mb_convert_kana(
            $text,
            'as',
            'UTF-8'
        );

        /**
         * 全角空格 → 半角
         */
        $text = str_replace(
            '　',
            ' ',
            $text
        );

        /**
         * 连续空白 → 一个半角空格
         */
        $text = preg_replace(
            '/\s+/u',
            ' ',
            $text
        );

        return trim($text);
    }

    /**
     * 获取目前结果最后一个元音
     */
    private function getLastVowel(string $text): string
    {
        $text = trim($text);

        if ($text === '') {
            return '';
        }

        if (
            preg_match(
                '/([aeiou])$/i',
                $text,
                $matches
            )
        ) {
            return strtolower(
                $matches[1]
            );
        }

        return '';
    }

    /**
     * 整理最终罗马字
     */
    private function cleanupRomaji(string $text): string
    {
        $text = preg_replace(
            '/\s+/u',
            ' ',
            $text
        );

        $text = trim($text);

        /**
         * 不在这里随便删除地址中的 -。
         *
         * 例如：
         *
         * 4-30-3
         *
         * 是地址番地。
         */

        $words = explode(
            ' ',
            $text
        );

        $result = [];

        foreach ($words as $word) {
            if ($word === '') {
                continue;
            }

            /**
             * 只有纯英文/数字才首字母大写。
             */
            if (
                preg_match(
                    '/^[A-Za-z0-9]+$/',
                    $word
                )
            ) {
                $word = ucfirst(
                    strtolower($word)
                );
            }

            $result[] = $word;
        }

        return implode(
            ' ',
            $result
        );
    }

    /**
     * 平假名 → 片假名
     */
    private function hiraganaToKatakana(string $text): string
    {
        $chars = mb_str_split(
            $text,
            1,
            'UTF-8'
        );

        $result = '';

        foreach ($chars as $char) {
            $code = mb_ord($char);

            if (
                $code >= 0x3041 &&
                $code <= 0x3096
            ) {
                $char = mb_chr(
                    $code + 0x60,
                    'UTF-8'
                );
            }

            $result .= $char;
        }

        return $result;
    }
}