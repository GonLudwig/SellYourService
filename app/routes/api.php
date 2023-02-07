<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPriceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/price', [PriceController::class, 'index']);
Route::post('/price', [PriceController::class, 'store']);
Route::get('/price/{price}', [PriceController::class, 'show']);
Route::put('/price/{price}', [PriceController::class, 'update']);
Route::delete('/price/{price}', [PriceController::class, 'destroy']);

Route::get('/period', [PeriodController::class, 'index']);
Route::post('/period', [PeriodController::class, 'store']);
Route::get('/period/{period}', [PeriodController::class, 'show']);
Route::put('/period/{period}', [PeriodController::class, 'update']);
Route::delete('/period/{period}', [PeriodController::class, 'destroy']);

Route::get('/product/price', [ProductPriceController::class, 'index']);
Route::get('/product/{product}/price', [ProductPriceController::class, 'show']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::put('/product/{product}', [ProductController::class, 'update']);
Route::delete('/product/{product}', [ProductController::class, 'destroy']);

