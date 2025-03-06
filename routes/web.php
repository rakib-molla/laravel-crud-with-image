<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/',[PostController::class, 'index'])->name('home');

Route::get('/create',[PostController::class, 'create']);

Route::post('/store',[PostController::class, 'insertData'])->name('store');

Route::get('/edit/{id}',[PostController::class, 'editData'])->name('edit');

Route::post('/update/{id}',[PostController::class,'updateData'])->name('update');

Route::get('/delete/{id}', [PostController::class,'deleteData'])->name('delete');