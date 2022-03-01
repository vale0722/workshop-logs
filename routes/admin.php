<?php

use App\Http\Controllers\ExternalApisController;
use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
Route::get('external-api/{api}', [ExternalApisController::class, 'index'])->name('externals.index');
