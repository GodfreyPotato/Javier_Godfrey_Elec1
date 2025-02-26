<?php

use App\Http\Controllers\NumberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/moneybreakdown/{money}', [NumberController::class, 'breakdown']);