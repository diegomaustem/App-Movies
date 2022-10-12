<?php

use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::get('/tag',                [TagController::class, 'index']);
// Route::post('/tag/{tag}',         [TagController::class, 'store']);
// Route::put('/updateTag/{tag}',    [TagController::class, 'update']);
// Route::delete('/deleteTag/{tag}', [TagController::class, 'delete']);

Route::resource('tag', TagController::class);