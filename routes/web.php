<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PaymentController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// Quiz Routes (Public) - KEEP ONLY THIS SET
Route::controller(QuizController::class)->group(function () {
    Route::get('/quizzes', 'index')->name('quiz.index'); // New route for quiz selection
    Route::get('/quiz/{quiz}/start', 'start')->name('quiz.start');
    Route::get('/quiz/{quiz}/begin', 'begin')->name('quiz.begin');
    Route::get('/quiz/{quiz}/question/{question}/{currentQuestion}', 'showQuestion')->name('quiz.question');
    Route::post('/quiz/{quiz}/answer', 'answer')->name('quiz.answer');
    Route::get('/quiz/{quiz}/analysis-choice', 'analysisChoice')->name('quiz.analysis-choice');
    Route::post('/quiz/{quiz}/results', 'results')->name('quiz.results');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'quizzes' => Quiz::active()->get() // Return all active quizzes
        ]);
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

require __DIR__.'/auth.php';
