<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('home');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/nearest-office', 'NearestOffice')->name('nearest-office');

});
