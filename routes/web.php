<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat');
});


Route::view('/', 'beranda')->name('beranda');
Route::post('/tanya-ai', [AiController::class, 'tanyaAi']);