<?php

use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
