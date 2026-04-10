<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FaqController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/detail/{slug?}', [DetailController::class, 'index'])->name('detail');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
