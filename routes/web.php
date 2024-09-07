<?php

use App\Http\Controllers\Admin\AdminEggController;
use App\Http\Controllers\Admin\AdminGeckoController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Web\AnimalCareController;
use App\Http\Controllers\Web\EggController;
use App\Http\Controllers\Web\GeckoController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

// Route for user view
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('gecko', [GeckoController::class, 'index'])->name('gecko');
    Route::get('gecko/search', [GeckoController::class, 'search'])->name('gecko.search');
    Route::get('egg', [EggController::class, 'index'])->name('egg');
    Route::get('egg/search', [EggController::class, 'search'])->name('egg.search');
    Route::get('animal-care', [AnimalCareController::class, 'index'])->name('animal-care');
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
    Route::get('/', [AdminIndexController::class, 'index'])->name('dashboard');
    Route::resource('egg', AdminEggController::class);
    Route::resource('gecko', AdminGeckoController::class);
    Route::get('profile', [AdminUserController::class, 'index'])->name('profile');
    Route::post('profile', [AdminUserController::class, 'update'])->name('profile.update');
});

// Route for route not found
Route::fallback(function () {
    return response()->view('errors.error-404', [], 404);
});
