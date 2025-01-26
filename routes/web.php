<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('home');
});
// Guest Routes Group (only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // Registration Routes
        Route::get('/register', 'showRegister')->name('register');
        // Route::post('/register', 'register');

        // // Login Routes
        // Route::get('/login', 'showLogin')->name('login');
        // Route::post('/login', 'login');

        // // Password Reset Routes
        // Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
        // Route::post('/forgot-password', 'forgotPassword')->name('password.email');
        // Route::get('/reset-password/{token}', 'showResetPassword')->name('password.reset');
        // Route::post('/reset-password', 'resetPassword')->name('password.update');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/nearest-office', 'NearestOffice')->name('nearest-office');

});
