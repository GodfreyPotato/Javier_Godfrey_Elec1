<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('login', LoginController::class)->only('index', 'store');
Route::resource('registration', RegistrationController::class)->only('index', 'store');


Route::middleware('guest')->group(function () {});


Route::middleware('auth')->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('deal', DealController::class);
    Route::resource('opportunity', OpportunityController::class);
    Route::resource('report', ReportController::class);
});
