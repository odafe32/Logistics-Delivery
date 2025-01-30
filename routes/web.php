<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
        Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
        // Route::post('/forgot-password', 'forgotPassword')->name('password.email');
         Route::get('/reset-password', 'showResetPassword')->name('password.reset');
         Route::get('/password-reset-success', 'showResetPasswordSuccess')->name('password.reset-success');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/nearest-office', 'NearestOffice')->name('nearest-office');
    Route::get('/track-shipment-detail', 'ShowShipmentDetail')->name('track-shipment-detail');
    Route::get('/track-shipment', 'ShowShipment')->name('track-shipment');
        Route::get('faqs', 'ShowFaqs')->name('faqs');

});

//Admin Routes 

        Route::controller(UserController::class)->group(function () {
            Route::get('dashboard', 'showDashboard')->name('dashboard');
            Route::get('new-shipment', 'ShowNewShipment')->name('new-shipment');
            Route::get('user-track-shipment', 'ShowTrackShipment')->name('user-track-shipment');
            Route::get('user-track-details', 'ShowTrackShipmentDetails')->name('user-track-details');
            Route::get('shipment-history', 'ShowHistory')->name('shipment-history');
            Route::get('profile', 'ShowProfile')->name('profile');
            Route::get('support', 'ShowSupport')->name('support');
        
                
        });
 
        Route::controller(AdminController::class)->group(function () {
            Route::get('admin/dashboard', 'showDashboard')->name('dashboard');
            Route::get('admin/users', 'showUsers')->name('users');
            Route::get('admin/timelines', 'ShowTimelines')->name('timelines');
            Route::get('admin/shipment-details', 'ShowShipmentDetails')->name('shipment-details');
            Route::get('admin/add-timeline', 'AddTimelines')->name('add-timeline');
            Route::get('admin/new-shipment', 'ShowNewShipment')->name('new-shipment');
            Route::get('admin/profile', 'ShowProfile')->name('profile');
        
                
        });
 


