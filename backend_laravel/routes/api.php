<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

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
Route::resource('customer', CustomerController::class);
Route::resource('item', ItemController::class);
Route::resource('order', OrderController::class);
Route::get('orderidcustomer/{id}',[OrderController::class,'showcustomer']);
/*
Route::controller(OrderController::class)->group(function () {
    Route::get('/order1', 'index');
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});
*/