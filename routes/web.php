<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PaymentController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});
//Route::get('/', function () {
//    return view('welcome');
//});

// Quiz Routes (Public)
Route::controller(QuizController::class)->group(function () {
    Route::get('/quiz', 'start')->name('quiz.start');
    Route::get('/quiz/begin', 'begin')->name('quiz.begin');
    Route::get('/quiz/question/{question}/{currentQuestion}', 'showQuestion')->name('quiz.question');
    Route::post('/quiz/answer', 'answer')->name('quiz.answer');
    Route::get('/quiz/analysis-choice', 'analysisChoice')->name('quiz.analysis-choice');
    Route::post('/quiz/results', 'results')->name('quiz.results');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'hasQuiz' => Quiz::where('is_active', true)->exists()
        ]);
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Quiz Results & Payment Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('results')->group(function () {
        // View Results
        Route::get('/{result}', [ResultController::class, 'show'])->name('results.show');

        // Payment Processing
        Route::post('/{result}/payment', [PaymentController::class, 'processPayment'])
            ->name('payment.process');

        Route::get('/{result}/payment/success', [PaymentController::class, 'paymentSuccess'])
            ->name('payment.success');
    });

    // Stripe Webhook (must be CSRF exempt)
    Route::post('/stripe/webhook', [PaymentController::class, 'handleWebhook'])
        ->name('cashier.webhook')
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
