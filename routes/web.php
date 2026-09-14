<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [AddressController::class, 'index']
);

// 郵便番号から検索
Route::post(
    '/search',
    [AddressController::class, 'search']
);

// 日本語住所から検索
Route::post(
    '/search-address',
    [AddressController::class, 'searchAddress']
);

// CSV一括変換
Route::post(
    '/convert-csv',
    [AddressController::class, 'convertCsv']
);

// CSVダウンロード
Route::post(
    '/download-csv',
    [AddressController::class, 'downloadCsv']
);

// 利用規約
Route::get(
    '/terms',
    [AddressController::class, 'terms']
)->name('terms');

// プライバシーポリシー
Route::get(
    '/privacy',
    [AddressController::class, 'privacy']
)->name('privacy');

// お問い合わせ
Route::get(
    '/contact',
    [AddressController::class, 'contact']
)->name('contact');

Route::get('/sitemap.xml', function () {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $xml .= '<url>';
    $xml .= '<loc>' . htmlspecialchars(url('/'), ENT_XML1, 'UTF-8') . '</loc>';
    $xml .= '<changefreq>weekly</changefreq>';
    $xml .= '<priority>1.0</priority>';
    $xml .= '</url>';

    $xml .= '<url>';
    $xml .= '<loc>' . htmlspecialchars(route('terms'), ENT_XML1, 'UTF-8') . '</loc>';
    $xml .= '<changefreq>yearly</changefreq>';
    $xml .= '<priority>0.3</priority>';
    $xml .= '</url>';

    $xml .= '<url>';
    $xml .= '<loc>' . htmlspecialchars(route('privacy'), ENT_XML1, 'UTF-8') . '</loc>';
    $xml .= '<changefreq>yearly</changefreq>';
    $xml .= '<priority>0.3</priority>';
    $xml .= '</url>';

    $xml .= '<url>';
    $xml .= '<loc>' . htmlspecialchars(route('contact'), ENT_XML1, 'UTF-8') . '</loc>';
    $xml .= '<changefreq>yearly</changefreq>';
    $xml .= '<priority>0.3</priority>';
    $xml .= '</url>';

    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml; charset=UTF-8');
});