<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Models\Quiz;

Route::get('/', function () {
    return view('welcome');
});

// Public Quiz Routes
Route::controller(QuizController::class)->group(function () {
    Route::get('/quiz', 'start')->name('quiz.start');
    Route::get('/quiz/begin', 'begin')->name('quiz.begin');
    Route::get('/quiz/question/{question}/{currentQuestion}', 'showQuestion')->name('quiz.question');
    Route::post('/quiz/answer', 'answer')->name('quiz.answer');
    Route::get('/quiz/analysis-choice', 'analysisChoice')->name('quiz.analysis-choice');
    Route::post('/quiz/results', 'results')->name('quiz.results');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'hasQuiz' => Quiz::where('is_active', true)->exists()
        ]);
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
