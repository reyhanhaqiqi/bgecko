<?php

use Illuminate\Support\Facades\Route;

// Route for user view
Route::prefix('/')->group(function () {
    Route::view('/', 'web.pages.index')->name('home');
    Route::view('gecko', 'web.pages.gecko')->name('gecko');
    Route::view('egg', 'web.pages.egg')->name('egg');
    Route::view('animal-care', 'web.pages.animal-care')->name('animal-care');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
