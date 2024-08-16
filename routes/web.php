<?php

use Illuminate\Support\Facades\Route;

// Route for user view
Route::prefix('/')->group(function () {
    Route::view('/', 'user.pages.index')->name('home');
    Route::view('gecko', 'user.pages.gecko')->name('gecko');
    Route::view('egg', 'user.pages.egg')->name('egg');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
