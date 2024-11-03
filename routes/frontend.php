<?php

use Illuminate\Support\Facades\Route;

Route::middleware('webAuthGuest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'doLogin']);

    Route::get('/registration', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'registrationForm'])->name('login');
    Route::post('/registration', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'doRegistration']);
});

Route::middleware('webAuth')->prefix('auth')->group(function () {
    Route::post('/configurations', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'configurations'])->name('profile');
    Route::get('/profile', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'profile'])->name('profile');
    Route::get('/user_profile', [\App\Http\Controllers\Frontend\FrontendAuthController::class, 'userProfile']);
});

