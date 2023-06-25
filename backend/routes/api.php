<?php

use App\Http\Post\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('post')->group(function () {
    Route::get('', [PostController::class, 'index']);
    Route::post('', [PostController::class, 'store']);
    Route::get('{id}', [PostController::class, 'show']);
    Route::put('{id}', [PostController::class, 'update']);
});
