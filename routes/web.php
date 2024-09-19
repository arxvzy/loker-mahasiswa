<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokerController;

Route::get('/', [LokerController::class, 'index']);
Route::get('/loker/{id}', [LokerController::class, 'show'])->name('loker.show');
Route::get('/pasang-loker', function (){
    return view('loker.pasang-loker');
});
Route::get('/tentang-kami', function() {
    return view('loker.about');
});
Route::get('/artikel', [ArticleController::class, 'index']);
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('article.show');