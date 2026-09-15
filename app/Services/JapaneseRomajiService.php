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
     * 汉字不在这里强制转换。
     * 汉字地名由 PostalCode 数据中的 *_romaji 处理。
     */
    public function convert(string $text): string
    {
        $text = trim($text);

        if ($text === '') {
            return '';
        }

        // 全角英数字 → 半角
        $text = mb_convert_kana(
            $text,
            'as',
            'UTF-8'
        );

        // 全角空格 → 半角
        $text = str_replace(
            '　',
            ' ',
            $text
        );

        // 连续空格 → 一个空格
        $text = preg_replace(
            '/\s+/u',
            ' ',
            $text
        );

        // 平假名 → 片假名
        $text = $this->hiraganaToKatakana($text);

        /**
         * 组合音
         *
         * 必须优先于单字符转换。
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
        ];

        /**
         * 先把组合音转换成临时占位符。
         *
         * 不能直接 str_replace 成罗马字，
         * 因为后面的 ッ、ー 需要知道前后关系。
         */
        $text = $this->replaceDigraphs(
            $text,
            $digraphs
        );

        /**
         * 单音
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
             * 组合音占位符
             */
            if (
                str_starts_with(
                    $char,
                    "\u{E000}"
                )
            ) {
                $result .= $char;
                continue;
            }

            /**
             * 长音符号「ー」
             *
             * 根据前一个罗马字的最后元音补充。
             *
             * 例：
             * アー → aa
             * キー → kii
             * グー → guu
             * ベー → bee
             *
             * 最后 cleanup 时再决定是否需要自然化。
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
             *
             * 例如：
             *
             * ベッド
             * → beddo
             *
             * サッカー
             * → sakkaa
             */
            if ($char === 'ッ') {

                $nextRomaji = '';

                if (isset($chars[$i + 1])) {
                    $next = $chars[$i + 1];

                    if (
                        isset($kana[$next])
                    ) {
                        $nextRomaji = $kana[$next];
                    } else {
                        $nextRomaji =
                            $this->getDigraphRomaji(
                                $next
                            );
                    }
                }

                if ($nextRomaji !== '') {
                    $result .=
                        substr(
                            $nextRomaji,
                            0,
                            1
                        );
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
             * 片假名
             */
            if (
                isset($kana[$char])
            ) {
                $result .=
                    $kana[$char];

                continue;
            }

            /**
             * 其他字符：
             *
             * 汉字、标点、括号等保持原样。
             */
            $result .= $char;
        }

        /**
         * 恢复组合音
         */
        foreach ($digraphs as $jp => $romaji) {
            $placeholder =
                $this->createPlaceholder($jp);

            $result = str_replace(
                $placeholder,
                $romaji,
                $result
            );
        }

        return $this->cleanupRomaji($result);
    }

    /**
     * 将组合音替换为不会被后续单字符处理影响的占位符。
     */
    private function replaceDigraphs(
        string $text,
        array $digraphs
    ): string {
        foreach ($digraphs as $jp => $romaji) {

            $placeholder =
                $this->createPlaceholder($jp);

            $text = str_replace(
                $jp,
                $placeholder,
                $text
            );
        }

        return $text;
    }

    /**
     * 创建 Unicode 私有区占位符。
     */
    private function createPlaceholder(
        string $text
    ): string {
        return "\u{E000}"
            . bin2hex(
                mb_convert_encoding(
                    $text,
                    'UTF-8',
                    'UTF-8'
                )
            )
            . "\u{E001}";
    }

    /**
     * 根据占位符取得组合音的罗马字。
     */
    private function getDigraphRomaji(
        string $char
    ): string {
        return '';
    }

    /**
     * 获取目前结果最后一个元音。
     */
    private function getLastVowel(
        string $text
    ): string {
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
     * 整理最终罗马字。
     */
    private function cleanupRomaji(
        string $text
    ): string {
        /**
         * 连续空格 → 一个空格
         */
        $text = preg_replace(
            '/\s+/u',
            ' ',
            $text
        );

        /**
         * 去掉空格两侧多余空格
         */
        $text = trim($text);

        /**
         * 不让罗马字中出现奇怪的连接符。
         */
        $text = str_replace(
            '-',
            '',
            $text
        );

        /**
         * 每个英文单词首字母大写。
         *
         * 例如：
         * aku besu
         * →
         * Aku Besu
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
             * 只有纯英文/数字才做首字母大写。
             *
             * 汉字混合内容保持原样。
             */
            if (
                preg_match(
                    '/^[A-Za-z0-9]+$/',
                    $word
                )
            ) {
                $word =
                    ucfirst(
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
    private function hiraganaToKatakana(
        string $text
    ): string {
        $chars = mb_str_split(
            $text,
            1,
            'UTF-8'
        );

        $result = '';

        foreach ($chars as $char) {

            $code = mb_ord($char);

            /**
             * 平假名：
             * 3041 - 3096
             *
             * 片假名：
             * 30A1 - 30F6
             */
            if (
                $code >= 0x3041
                && $code <= 0x3096
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