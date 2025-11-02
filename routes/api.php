<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FoodCategoryController;
use App\Http\Controllers\Api\FoodItemController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('food-categories', FoodCategoryController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('food-items', FoodItemController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');