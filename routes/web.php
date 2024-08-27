<?php

use App\Http\Controllers\Admin\AdminEggController;
use App\Http\Controllers\Admin\AdminGeckoController;
use App\Http\Controllers\Admin\AdminUserController;
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
Route::get('forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('forgot-password', [UserController::class, 'updatePassword']);
Route::post('logout', [UserController::class, 'destroy'])->name('logout');

// Route with middleware for admin
Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::resource('egg', AdminEggController::class);
    Route::resource('gecko', AdminGeckoController::class);
    Route::get('profile', [AdminUserController::class, 'index'])->name('profile');
    Route::post('profile', [AdminUserController::class, 'update'])->name('profile.update');
});

// Route for route not found
Route::fallback(function () {
    return response()->view('errors.error-404', [], 404);
});
