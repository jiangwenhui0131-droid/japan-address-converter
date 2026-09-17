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

            // 外来语
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

            // ヶ / ヵ
            'ヶ' => 'ke',
            'ヵ' => 'ka',
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
             *
             * 当前字符 + 下一个字符
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

                // 下一个是组合音
                if (isset($chars[$i + 2])) {
                    $pair = $chars[$i + 1] . $chars[$i + 2];

                    if (isset($digraphs[$pair])) {
                        $nextRomaji = $digraphs[$pair];
                    }
                }

                // 下一个是普通假名
                if ($nextRomaji === '' && isset($chars[$i + 1])) {
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
            if (preg_match('/^[A-Za-z]$/', $char)) {
                $result .= $char;
                continue;
            }

            /**
             * 数字
             */
            if (preg_match('/^[0-9]$/', $char)) {
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
             * 普通假名
             */
            if (isset($kana[$char])) {
                $result .= $kana[$char];
                continue;
            }

            /**
             * 其他字符：
             * 汉字、标点、括号等保持原样。
             */
            $result .= $char;
        }

        return $this->cleanupRomaji($result);
    }

    /**
     * 获取目前结果最后一个元音。
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
            return strtolower($matches[1]);
        }

        return '';
    }

    /**
     * 整理最终罗马字。
     */
    private function cleanupRomaji(string $text): string
    {
        // 连续空格 → 一个空格
        $text = preg_replace(
            '/\s+/u',
            ' ',
            $text
        );

        // 去掉首尾空格
        $text = trim($text);

        // 去掉连接符
        $text = str_replace(
            '-',
            '',
            $text
        );

        // 每个英文单词首字母大写
        $words = explode(
            ' ',
            $text
        );

        $result = [];

        foreach ($words as $word) {
            if ($word === '') {
                continue;
            }

            // 只有纯英文/数字才做首字母大写
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