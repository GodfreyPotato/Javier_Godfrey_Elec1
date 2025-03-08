<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Index');
});


Route::get('/customer/{cusId}/{name}/{addr}', [OrderController::class, 'getCustomer']);
Route::get('/item/{itemNo}/{name}/{price}', [OrderController::class, 'getItem']);
Route::get('/order/{cusId}/{name}/{orderNo}/{date}', [OrderController::class, 'getOrder']);
Route::get('orderdetails/{transNo}/{orderNo}/{itemId}/{name}/{price}/{qty}', [OrderController::class, 'getOrderDetails']);
