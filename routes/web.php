<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PictureController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('albums', AlbumController::class);
Route::post('albums/{album}/pictures', [PictureController::class, 'store'])->name('pictures.store');
