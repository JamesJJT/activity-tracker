<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('auth')->group(function (){
    Route::get('login', [LoginController::Class, 'create'])->name('login');
    Route::post('login', [LoginController::Class, 'store'])->name('login.store');
    Route::get('logout', [LoginController::Class, 'destroy'])->name('logout');
    Route::get('register', [RegisterController::Class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::Class, 'store'])->name('register.store');
});

Route::resource('activity', ActivityController::class)->middleware('auth');
