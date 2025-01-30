<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupportMessageController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest Routes Group (only accessible when NOT logged in)
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // Registration Routes
        Route::get('/register', 'showRegister')->name('register');
        Route::post('/register', 'register')->name('register.submit');
        // Route::post('/register', 'register');

        // // Login Routes
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('login.submit');

        // Password Reset Routes
        Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
        Route::post('/forgot-password', 'forgotPassword')->name('password.email');
        Route::get('/reset-password/{token}', 'showResetPassword')->name('password.reset');
        Route::post('/reset-password', 'resetPassword')->name('password.update');
        Route::get('/password-reset-success', 'showResetPasswordSuccess')->name('password.reset-success');
    });
});

// Authentication Required Routes
Route::middleware(['auth'])->group(function () {
    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User Routes
    Route::middleware('role:user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('dashboard', 'showDashboard')->name('dashboard');
            Route::get('new-shipment', 'ShowNewShipment')->name('new-shipment');
            Route::get('user-track-shipment', 'ShowTrackShipment')->name('user-track-shipment');
            Route::get('user-track-details', 'ShowTrackShipmentDetails')->name('user-track-details');
            Route::get('shipment-history', 'ShowHistory')->name('shipment-history');
            Route::get('profile', 'ShowProfile')->name('profile');
            Route::get('support', 'ShowSupport')->name('support');
                    // // Profile Routes
            Route::post('/profile/update', 'updateProfile')->name('profile.update');
            Route::post('/profile/password', 'updatePassword')->name('profile.password');

            Route::post('/shipments/create', 'createShipment')->name('shipments.create');
            Route::post('/shipments/draft', 'saveShipmentDraft')->name('shipments.draft');
            Route::get('/shipments/track/{tracking_number}', 'trackShipment')->name('shipments.track');
            Route::get('/shipment-history', 'getShipmentHistory')->name('shipments.history');
            Route::get('/shipments/{tracking}/details', 'getShipmentDetails')->name('shipment.details');
        });
    });

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'showDashboard')->name('admin.dashboard');
            Route::get('/users', 'showUsers')->name('users');
            Route::post('/users', 'storeUser')->name('users.store');
            Route::get('/users/{user}', 'getUserById')->name('users.show');
            Route::put('/users/{user}', 'updateUser')->name('users.update');
            Route::delete('/users/{user}', 'deleteUser')->name('users.delete');
            Route::get('/timelines', 'ShowTimelines')->name('timelines');
            Route::get('/shipment-details', 'ShowShipmentDetails')->name('shipment-details');
            Route::get('/add-timeline/{tracking_number}', 'AddTimelines')->name('add-timeline');
            Route::get('/new-shipment', 'ShowNewShipment')->name('new-shipment');
            Route::get('/profile', 'ShowProfile')->name('admin.profile');
            Route::get('/admin/users/new', 'showNewUser')->name('users.new');
            Route::get('/users/{user}/edit', 'editUser')->name('users.edit');

            // New routes for messages
            Route::get('/support-messages', 'ShowSupportMessages')->name('admin.support-messages');
            Route::get('/contact-messages', 'ShowContactMessages')->name('admin.contact-messages');

            // Profile update routes
            Route::post('/profile/update', 'updateProfile')->name('admin.profile.update');
            Route::post('/profile/password', 'updatePassword')->name('admin.profile.password');

            Route::get('/shipments', 'getAllShipments')->name('admin.shipments.index');
            Route::get('/shipments/{id}', 'getShipmentDetails')->name('admin.shipments.details');
            Route::post('/shipments/{shipment}/status', 'updateShipmentStatus')->name('admin.shipments.update-status');
        });
    });
});

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/nearest-office', 'NearestOffice')->name('nearest-office');
    Route::get('/track-shipment-detail/{tracking_number}', 'ShowShipmentDetail')->name('track-shipment-detail');
    Route::get('/track-shipment', 'ShowShipment')->name('track-shipment');
    Route::post('/track-shipment', 'trackShipment')->name('track-shipment.submit');
    Route::get('/contact', 'showContact')->name('contact');
    Route::post('/contact', 'submitContact')->name('contact.submit');
});

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/support', [SupportMessageController::class, 'showSupportForm'])->name('support');
    Route::post('/support/send', [SupportMessageController::class, 'sendMessage'])->name('support.send');
});

Route::get('/send-shipment', [HomeController::class, 'showSendShipment'])->name('send-shipment');

// Admin Routes
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/support-messages', [SupportMessageController::class, 'showMessages'])->name('admin.support-messages');
    Route::post('/support-messages/{supportMessage}/reply', [SupportMessageController::class, 'replyMessage'])->name('admin.support.reply');
});
