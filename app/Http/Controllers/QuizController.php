<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\PersonalityAnalysisService;

class QuizController extends Controller
{
    private const QUIZ_ID = 1;
    private const SESSION_ANSWERS_KEY = 'quiz_answers';

    public function start()
    {
        $quiz = $this->getActiveQuiz();
        return view('quiz.start', [
            'quiz' => $quiz,
            'questionsCount' => $quiz->activeQuestions()->count()
        ]);
    }

    public function begin()
    {

//        dd("this is the quiz begin");
        $quiz = $this->getActiveQuiz();
//        dd($quiz);
        $firstQuestion = $quiz->activeQuestions()->orderBy('order')->first();

        if (!$firstQuestion) {
            return redirect()->back()->with('error', 'No active questions available.');
        }

        return $this->showQuestion($firstQuestion, 1);
    }

    public function showQuestion(Question $question, int $currentQuestion)
    {
        $quiz = $this->getActiveQuiz();
        $totalQuestions = $quiz->activeQuestions()->count();

        return view('quiz.question', [
            'question' => $question->load('activeOptions'),
            'currentQuestion' => $currentQuestion,
            'totalQuestions' => $totalQuestions,
            'progress' => $this->calculateProgress($currentQuestion, $totalQuestions),
        ]);
    }

    public function answer(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|exists:options,id',
            'current_question' => 'required|integer|min:1',
        ]);

        $this->storeAnswer($validated['question_id'], $validated['answer']);

        $quiz = $this->getActiveQuiz();
        $totalQuestions = $quiz->activeQuestions()->count();
        $nextQuestionNumber = $validated['current_question'] + 1;

        if ($nextQuestionNumber <= $totalQuestions) {
            $nextQuestion = $quiz->activeQuestions()
                ->where('order', '>', $validated['question_id'])
                ->first();

            if ($nextQuestion) {
                return redirect()->route('quiz.question', [
                    'question' => $nextQuestion->id,
                    'currentQuestion' => $nextQuestionNumber,
                ]);
            }
        }

        return redirect()->route('quiz.analysis-choice');
    }

    public function analysisChoice()
    {
        return view('quiz.analysis-choice');
    }


    public function results(Request $request)
    {
        $validated = $request->validate([
            'analysis_type' => 'required|in:free,premium'
        ]);

        $user = auth()->user();
        $quiz = Quiz::active()->first();

        // Generate result
        $result = $this->generateResult($user, $quiz, $request->all());

        if ($validated['analysis_type'] === 'premium') {
            return redirect()->route('results.show', $result);
        }

        return redirect()->route('results.show', $result);
    }

    protected function generateResult($user, $quiz, $answers)
    {
        $analysisService = new PersonalityAnalysisService();

        $resultData = [
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'answers' => $answers,
            'title' => 'Your Personality Analysis',
            'is_paid' => false
        ];

        // Merge analysis data
        $resultData = array_merge($resultData, $analysisService->analyze($answers));

        return Result::create($resultData);
    }

    protected function getActiveQuiz(): Quiz
    {
        return Cache::remember('active_quiz', now()->addHour(), function () {
            return Quiz::with(['activeQuestions.activeOptions'])
                ->where('is_active', true)
                ->findOrFail(self::QUIZ_ID);
        });
    }

    protected function storeAnswer(int $questionId, int $optionId): void
    {
        $answers = session()->get(self::SESSION_ANSWERS_KEY, []);
        $answers[$questionId] = $optionId;
        session([self::SESSION_ANSWERS_KEY => $answers]);
    }

    protected function calculateProgress(int $current, int $total): int
    {
        return round(($current / max($total, 1)) * 100);
    }

    protected function calculateResults(array $answers): Result
    {
        $score = Option::whereIn('id', $answers)->sum('score');

        return Result::where('quiz_id', self::QUIZ_ID)
            ->where('min_score', '<=', $score)
            ->where('max_score', '>=', $score)
            ->firstOrFail();
    }
}
