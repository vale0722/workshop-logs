<?php

use App\Http\Controllers\Api\Posts\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function ($route) {
    $route->apiResource('posts', PostController::class);
});
