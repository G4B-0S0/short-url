<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

Route::get('/', function () {
    return view('index');
});

Route::get('/short', [ShortUrlController::class, 'store'])->name('short.url');

Route::get('/{code}', [ShortUrlController::class, 'redirect'])->name('short.url.redirect');
