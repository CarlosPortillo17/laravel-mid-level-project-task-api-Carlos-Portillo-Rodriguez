<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

//RUTAS
Route::get('/', function (){
    return response()->json(['message' => 'Funciona']);
});

Route::apiResource('users', UserController::class);
Route::apiResource('post', PostController::class);
Route::apiResource('products', ProductController::class);