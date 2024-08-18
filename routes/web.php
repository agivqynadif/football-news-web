<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/details/{article_news:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/league/{league:slug}', [FrontController::class, 'league'])->name('front.league');

Route::get('/author/{author:slug}', [FrontController::class, 'author'])->name('front.author');

Route::get('/search', [FrontController::class, 'search'])->name('front.search');
