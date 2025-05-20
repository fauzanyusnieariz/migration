<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Route test
Route::get('/check', function () {
    return response()->json(['message' => 'API route working!']);
});

// ========== Auth Routes ==========
Route::post('/register', [AuthController::class, 'register']); // user registration
Route::post('/login', [AuthController::class, 'login']);

// ========== Protected Routes ==========
Route::middleware('auth:sanctum')->group(function () {
    // logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // product CRUD (user & admin)
    Route::apiResource('/products', ProductController::class);

    // category CRUD (admin only - check role in controller/middleware)
    Route::apiResource('/categories', CategoryController::class);
});
