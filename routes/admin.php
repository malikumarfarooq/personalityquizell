<?php

use App\Http\Controllers\Admin\{DashboardController,
    QuizController,
    QuestionController,
    AIIntegrationController,
    PaymentController,
    ReportController,
    SaleController,
    UserController};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'can:access-admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::resource('quizzes', QuizController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    Route::resource('questions', QuestionController::class);
    Route::resource('ai-integration', AIIntegrationController::class)->only(['index', 'store']);
    Route::resource('payments', PaymentController::class)->only(['index', 'store']);
    Route::resource('sales', SaleController::class)->only(['index']);
    Route::resource('users', UserController::class);
});
