<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:sanctum")->group(function () {

    Route::get('/users', [UserController::class, 'get']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);


    Route::get('/products', [ProductController::class, 'get']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store'])->middleware('restrictRole:salesman');
    Route::put('/products/{id}', [ProductController::class, 'update'])->middleware('restrictRole:salesman');
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->middleware('restrictRole:salesman');

    Route::get('/carts', [CartController::class, 'get']);
    Route::get('/carts-user', [CartController::class, 'getByUser']);
    Route::post('/carts', [CartController::class, 'store']);
    Route::put('/carts/{product}', [CartController::class, 'update']);
    Route::delete('/carts/{product}', [CartController::class, 'delete']);
});

Route::post('/users', [UserController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/verify-token-email-validation', [AuthController::class, 'verifyTokenEmailValidation']);
