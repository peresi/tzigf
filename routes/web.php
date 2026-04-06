<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MediaNewsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SchoolApplicantController;
use App\Http\Controllers\Admin\TigwItemController;
use App\Http\Controllers\Admin\TsigApplicationController as AdminTsigApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicInputController;
use App\Http\Controllers\SchoolApplicationController;
use App\Http\Controllers\SessionProposalController;
use App\Http\Controllers\TsigApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/about', '/history');
Route::get('/history', [HomeController::class, 'about'])->name('history');
Route::get('/what-we-do', [HomeController::class, 'whatWeDo'])->name('what-we-do');
Route::view('/engagement-platforms', 'engagement-platforms')->name('engagement-platforms');
Route::get('/reports', [HomeController::class, 'reportsIndex'])->name('reports.index');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/public-input', [PublicInputController::class, 'index'])->name('public-input.index');
Route::post('/public-input', [PublicInputController::class, 'store'])->name('public-input.submit');
Route::get('/session-proposal', [SessionProposalController::class, 'index'])->name('session-proposal.index');
Route::post('/session-proposal', [SessionProposalController::class, 'store'])->name('session-proposal.submit');
Route::get('/school/application', [SchoolApplicationController::class, 'index'])->name('school.application');
Route::post('/school/application', [SchoolApplicationController::class, 'store'])->name('school.application.submit');
Route::get('/tsig', function () {
    return view('tsig');
})->name('tsig');
Route::get('/tzmag', function () {
    return view('tzmag');
})->name('tzmag');
Route::post('/tsig/application', [TsigApplicationController::class, 'store'])->name('tsig.application.submit');
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
    Route::get('tsig-applications/export', [AdminTsigApplicationController::class, 'exportCsv'])->name('tsig-applications.export');
    Route::resource('tsig-applications', AdminTsigApplicationController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::get('public-input-submissions/export', [\App\Http\Controllers\Admin\PublicInputSubmissionController::class, 'exportCsv'])->name('public-input-submissions.export');
    Route::resource('public-input-submissions', \App\Http\Controllers\Admin\PublicInputSubmissionController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::get('session-proposals/export', [\App\Http\Controllers\Admin\SessionProposalController::class, 'exportCsv'])->name('session-proposals.export');
    Route::get('session-proposals/{session_proposal}/supporting-document', [\App\Http\Controllers\Admin\SessionProposalController::class, 'downloadSupportingDocument'])->name('session-proposals.supporting-document');
    Route::resource('session-proposals', \App\Http\Controllers\Admin\SessionProposalController::class)->only(['index', 'edit', 'update', 'destroy']);
});
