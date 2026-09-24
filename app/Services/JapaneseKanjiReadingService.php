<?php

namespace App\Services;

use Limelight\Limelight;

class JapaneseKanjiReadingService
{
    private Limelight $limelight;

    public function __construct()
    {
        $this->limelight = new Limelight();
    }

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

        try {
            $results = $this->limelight->parse($text);

            return trim(
                $results->string('reading')
            );
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