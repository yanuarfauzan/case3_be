<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/items', [ItemController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/addToFav/{id}', [ItemController::class, 'addToFav']);
    Route::get('/favItems', [ItemController::class, 'favItems']);
    Route::post('/addToCart/{id}', [ItemController::class, 'addToCart']);
    Route::delete('/deleteFromCart', [ItemController::class, 'deleteFromCart']);
});