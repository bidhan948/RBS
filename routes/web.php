<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('property-owner/login', [AuthController::class, 'propertyOwnerLogin'])
    ->name('property-owner.login');

Route::get('register/{role}', [AuthController::class, 'register'])->name('register');
Route::post('register/{role}', [AuthController::class, 'registerSubmit'])->name('registerSubmit');

Route::post('login', [AuthController::class, 'login'])->name('login');
