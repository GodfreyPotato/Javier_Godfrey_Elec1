<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::post('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::post('/create', [StudentController::class, 'store'])->name('store');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
