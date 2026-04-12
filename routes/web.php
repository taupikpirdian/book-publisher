<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FaqController;

Route::get('/assets/{path}', function ($path) {
    $path = 'assets/' . $path;
    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }
    return Storage::disk('public')->response($path);
})->where('path', '.*');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/newsletter/subscribe', [HomeController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');
Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
