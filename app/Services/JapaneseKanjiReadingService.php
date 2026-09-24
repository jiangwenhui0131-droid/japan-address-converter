<?php

namespace App\Services;

class JapaneseKanjiReadingService
{
    /**
     * 日本語を読み仮名に変換する。
     *
     * 例：
     * 仙台市太白区
     * ↓
     * センダイシタイハクク
     *
     * DBは使用しない。
     */
    public function toKatakana(string $text): string
    {
        $text = trim($text);

        if ($text === '') {
            return '';
        }

        /*
         * PHP MeCab 拡張が有効か確認。
         */
        if (!extension_loaded('mecab')) {
            return $text;
        }

        try {
            /*
             * PHP-MeCab 1.0.0 では
             * MeCab\Tagger を使用する。
             */
            $tagger = new \MeCab\Tagger();

            $result = $tagger->parse($text);

            if (!is_string($result) || trim($result) === '') {
                return $text;
            }

            $readings = [];

            /*
             * MeCab の解析結果を1行ずつ処理する。
             */
            $lines = preg_split(
                '/\r\n|\r|\n/',
                $result
            );

            foreach ($lines as $line) {
                $line = trim($line);

                /*
                 * EOS は解析終了なので無視する。
                 */
                if ($line === '' || $line === 'EOS') {
                    continue;
                }

                /*
                 * MeCab の形式：
                 *
                 * 表層形<TAB>品詞,品詞細分類1,...,読み,発音
                 */
                $parts = explode("\t", $line, 2);

                if (count($parts) !== 2) {
                    /*
                     * タブがない場合は表層形をそのまま使用。
                     */
                    $readings[] = $parts[0];
                    continue;
                }

                $surface = $parts[0];
                $features = explode(',', $parts[1]);

                /*
                 * IPA辞書では通常、
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
                 * となっている。
                 */
                $reading = $features[7] ?? '*';

                /*
                 * 読みが取得できない場合は
                 * 元の文字列を使用する。
                 */
                if ($reading === '*' || $reading === '') {
                    $readings[] = $surface;
                    continue;
                }

                /*
                 * MeCab の読みはカタカナなので、
                 * そのまま結合する。
                 */
                $readings[] = $reading;
            }

            $reading = implode('', $readings);

            if ($reading === '') {
                return $text;
            }

            return $reading;
        } catch (\Throwable $e) {
            /*
             * MeCabで変換できない場合は、
             * 元の文字列を返す。
             *
             * 後段でRomanization処理を行う。
             */
            return $text;
        }
    }

    /**
     * 日本語をひらがなに変換する。
     *
     * 例：
     * 仙台市太白区
     * ↓
     * せんだいしたいはくく
     */
    public function toHiragana(string $text): string
    {
        $katakana = $this->toKatakana($text);

        if ($katakana === '') {
            return '';
        }

        return mb_convert_kana(
            $katakana,
            'c',
            'UTF-8'
        );
    }

    /**
     * 日本語を読み仮名にして、
     * 既存のJapaneseRomajiServiceで
     * ローマ字へ変換する。
     *
     * DBは使用しない。
     */
    public function toRomaji(
        string $text,
        JapaneseRomajiService $romajiService
    ): string {
        $text = trim($text);

        if ($text === '') {
            return '';
        }

        /*
         * まずMeCabで漢字を読みへ変換。
         */
        $reading = $this->toKatakana($text);

        if ($reading === '') {
            return '';
        }

        /*
         * 既存のローマ字変換処理を使用。
         */
        return trim(
            $romajiService->convert($reading)
        );
    }
}