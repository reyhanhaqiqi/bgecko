<?php

use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

// Route for user view
Route::prefix('/')->group(function () {
    Route::view('/', 'web.pages.index')->name('home');
    Route::view('gecko', 'web.pages.gecko')->name('gecko');
    Route::view('egg', 'web.pages.egg')->name('egg');
    Route::view('animal-care', 'web.pages.animal-care')->name('animal-care');
});

// Route for authentication
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
