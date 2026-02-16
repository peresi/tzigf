<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MediaNewsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TigwItemController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('reports', ReportController::class);
    Route::resource('media-news', MediaNewsController::class);
    Route::resource('tigw-items', TigwItemController::class);
});
