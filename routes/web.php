<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/acortar', [UrlController::class, 'acortarUrl']);
Route::get('/{codigo}', [UrlController::class, 'redirigir']);
