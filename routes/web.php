<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('property-owner/login',[AuthController::class,'propertyOwnerLogin'])->name('property-owner.login');