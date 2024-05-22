<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php


Route::get('/photos', [PhotoController::class, 'index']);
Route::post('/photos', [PhotoController::class, 'store']);
