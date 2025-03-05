<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/create',[PostController::class, 'create']);

Route::post('/store',[PostController::class, 'insertData'])->name('store');