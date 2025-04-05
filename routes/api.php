<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->namespace('App\Http\Controllers\API\V1')->group(function () {
    Route::get('posts', [App\Http\Controllers\API\V1\PostController::class, 'index']);
    Route::get('posts/{id}', [App\Http\Controllers\API\V1\PostController::class, 'show']);
});

Route::prefix('v2')->namespace('App\Http\Controllers\API\V2')->group(function () {
    Route::get('posts', [App\Http\Controllers\API\V2\PostController::class, 'index']);
    Route::get('posts/{id}', [App\Http\Controllers\API\V2\PostController::class, 'show']);
});
