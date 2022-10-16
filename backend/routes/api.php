<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('tag', TagController::class);
Route::resource('movie', MovieController::class);