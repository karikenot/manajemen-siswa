<?php

use App\Http\Controllers\AiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/', 'beranda')->name('beranda');
Route::post('/tanya-ai', [AiController::class, 'tanyaAi']);