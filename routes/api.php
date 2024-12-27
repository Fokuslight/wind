<?php

use App\Http\Controllers\Api\Admin\PostController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);

});
Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::apiResource('posts', PostController::class)->middleware('jwt.auth');
//Route::get('/posts', [PostController::class, 'index']);
//Route::get('/posts/{post}', [PostController::class, 'show']);
//Route::post('/posts', [PostController::class, 'store']);
//Route::patch('/posts/{post}', [PostController::class, 'update']);
//Route::delete('/posts/{post}', [PostController::class, 'destroy']);


