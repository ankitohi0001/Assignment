<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::middleware('auth:api')->post('create-post', [UserController::class, 'createPost']);
Route::get('posts', [UserController::class, 'getPosts']);
