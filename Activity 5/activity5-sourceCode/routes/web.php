
<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{oprt1}/{val1}/{val2}/{oprt2}/{val3}/{val4}', [UserController::class, 'compute']); //ginamit para i call ung User na controller at tawagin ung compute na function
