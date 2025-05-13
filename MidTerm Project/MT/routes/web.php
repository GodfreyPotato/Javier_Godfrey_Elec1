<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class)->only('store');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::resource('registration', RegistrationController::class)->only('index', 'store');
});


Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('opportunity', OpportunityController::class)->only('create', 'store', 'edit', 'update');
    Route::post('/deal/rate', [DealController::class, 'rateDeal'])->name('rateDeal');
    Route::resource('report', ReportController::class)->only('store');
    Route::get('/deal/report/{deal}', [ReportController::class, 'reportDeal'])->name('reportDeal');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/{selected?}', [StaffController::class, 'index'])->name('staff.index');
    Route::resource('opportunity', OpportunityController::class)->only('show');
    Route::get('/opportunity/status/{id}', [OpportunityController::class, 'changeStatus']);
    Route::get('/deal/status/{id}', [DealController::class, 'changeStatus']);
    Route::get('deal/cancel/{id}', [DealController::class, 'cancel']);
    Route::resource('deal', DealController::class)->only('show');
    Route::resource('staff', StaffController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/search/{word?}', [AdminController::class, 'search'])->name('search');
    Route::resource('user', UserController::class);
    Route::resource('report', ReportController::class)->only('show');
    Route::resource('admin', AdminController::class);
    Route::resource('opportunity', OpportunityController::class)->only('show');
    Route::resource('activity', ActivityController::class);
    Route::resource('report', ReportController::class)->only('index');
    Route::get('/opportunity/showOpportunity/{opportunity}', [AdminController::class, 'showOpportunity'])->name('showOpportunity');
});
