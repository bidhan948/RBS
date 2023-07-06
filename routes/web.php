<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');


// Frontend user login register setup role = user & property owner is here

Route::get('property-owner/login', [AuthController::class, 'propertyOwnerLogin'])
    ->name('property-owner.login');

Route::post('login/{role}', [AuthController::class, 'loginSubmit'])->name('loginSubmit');

Route::get('register/{role}', [AuthController::class, 'register'])->name('register');
Route::post('register/{role}', [AuthController::class, 'registerSubmit'])->name('registerSubmit');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('approve-user/{user}', [AuthController::class, 'approveUser'])->name('admin.approve-user');
    Route::get('disapprove-user/{user}', [AuthController::class, 'disapproveUser'])->name('admin.disapprove-user');
    Route::resource('property',PropertyController::class);
});
