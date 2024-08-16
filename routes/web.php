<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.pages.home', [
        'title' => 'BGecko - Sistem Informasi Leopard Gecko'
    ]);
});

Route::get('gecko', function () {
    return view('user.pages.gecko', [
        'title' => 'Data Leopard Gecko'
    ]);
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
