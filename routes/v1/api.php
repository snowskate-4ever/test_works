<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('types', App\Http\Controllers\TypeController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
