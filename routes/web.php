<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MediaNewsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SchoolApplicantController;
use App\Http\Controllers\Admin\TigwItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/school/application', [SchoolApplicationController::class, 'index'])->name('school.application');
Route::post('/school/application', [SchoolApplicationController::class, 'store'])->name('school.application.submit');
Route::view('/tsig', 'tsig')->name('tsig');
Route::get('/reports/{report}/file', [HomeController::class, 'showReport'])->name('reports.file');
Route::get('/storage/reports/{file}', [HomeController::class, 'showReportFromStoragePath'])
    ->where('file', '.*')
    ->name('reports.storage-fallback');

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
    Route::get('school-applicants/export', [SchoolApplicantController::class, 'exportCsv'])->name('school-applicants.export');
    Route::resource('school-applicants', SchoolApplicantController::class)->only(['index', 'edit', 'update', 'destroy']);
});
