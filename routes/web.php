<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;


// routes/web.php


Route::get('/', [PhotoController::class, 'index']);
Route::post('/photos', [PhotoController::class, 'store']);
