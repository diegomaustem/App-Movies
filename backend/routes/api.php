<?php

use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/listTag',            [TagController::class, 'index']);
Route::post('/createTag',         [TagController::class, 'create']);
Route::get('/editTag/{tag}',      [TagController::class, 'edit']);
Route::put('/updateTag/{tag}',    [TagController::class, 'update']);
Route::delete('/deleteTag/{tag}', [TagController::class, 'delete']);