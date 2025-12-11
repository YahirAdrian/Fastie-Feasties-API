<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $req) {
        return $req->user();
    });
});

// Product Routes 
Route::middleware('auth:sanctum')->group(function () {

    Route::put('/products/update/{id}', [ProductController::class, 'store']);
    Route::put('/products/update/{id}', [ProductController::class, 'update']);
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/category/{category}', [ProductController::class, 'category']);

//General user protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::get('/orders/user/{user_id}', [OrderController::class, 'order_by_user']);
    Route::post('orders/new', [OrderController::class, 'store']);
    
});
//Order admin routes
Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {
    //All order routes are protected since only administrations can see and manage orders
    Route::post('/products/new', [ProductController::class, 'store']);
    Route::put('orders/update/{id}', [OrderController::class, 'update']);
    Route::delete('orders/delete/{id}', [OrderController::class, 'destroy']);
    
    Route::get('/orders', [OrderController::class, 'index']);
});



