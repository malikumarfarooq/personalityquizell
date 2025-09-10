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
    private const SESSION_ANSWERS_KEY = 'quiz_answers';
    private const SESSION_QUIZ_ID_KEY = 'current_quiz_id';

    public function index()
    {
        $quizzes = Quiz::active()->get();
        return view('quiz.index', compact('quizzes'));
    }

    public function start(Quiz $quiz)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        // Store current quiz ID in session
        session([self::SESSION_QUIZ_ID_KEY => $quiz->id]);

        return view('quiz.start', [
            'quiz' => $quiz,
            'questionsCount' => $quiz->activeQuestions()->count()
        ]);
    }

    public function begin(Quiz $quiz)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        $firstQuestion = $quiz->activeQuestions()->orderBy('order')->first();

        if (!$firstQuestion) {
            return redirect()->back()->with('error', 'No active questions available.');
        }

        // Store current quiz ID in session
        session([self::SESSION_QUIZ_ID_KEY => $quiz->id]);

        return $this->showQuestion($quiz, $firstQuestion, 1);
    }

    public function showQuestion(Quiz $quiz, Question $question, int $currentQuestion)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        // Verify the question belongs to this quiz
        if ($question->quiz_id !== $quiz->id) {
            abort(404);
        }

        $totalQuestions = $quiz->activeQuestions()->count();

        return view('quiz.question', [
            'quiz' => $quiz,
            'question' => $question->load('activeOptions'),
            'currentQuestion' => $currentQuestion,
            'totalQuestions' => $totalQuestions,
            'progress' => $this->calculateProgress($currentQuestion, $totalQuestions),
        ]);
    }

    public function answer(Request $request, Quiz $quiz)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|exists:options,id',
            'current_question' => 'required|integer|min:1',
        ]);

        // Verify the question belongs to this quiz
        $question = Question::findOrFail($validated['question_id']);
        if ($question->quiz_id !== $quiz->id) {
            abort(403, 'Invalid question for this quiz');
        }

        $this->storeAnswer($validated['question_id'], $validated['answer']);

        $totalQuestions = $quiz->activeQuestions()->count();
        $nextQuestionNumber = $validated['current_question'] + 1;

        if ($nextQuestionNumber <= $totalQuestions) {
            $nextQuestion = $quiz->activeQuestions()
                ->where('order', '>', $question->order)
                ->orderBy('order')
                ->first();

            if ($nextQuestion) {
                return redirect()->route('quiz.question', [
                    'quiz' => $quiz->id,
                    'question' => $nextQuestion->id,
                    'currentQuestion' => $nextQuestionNumber,
                ]);
            }
        }

        return redirect()->route('quiz.analysis-choice', ['quiz' => $quiz->id]);
    }

    public function analysisChoice(Quiz $quiz)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        return view('quiz.analysis-choice', compact('quiz'));
    }

    public function results(Request $request, Quiz $quiz)
    {
        if (!$quiz->is_active) {
            return redirect()->route('quiz.index')->with('error', 'This quiz is not available.');
        }

        $validated = $request->validate([
            'analysis_type' => 'required|in:free,premium'
        ]);

        $user = auth()->user();

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
            'title' => $quiz->title . ' - Your Analysis',
            'is_paid' => false
        ];

        // Merge analysis data
        $resultData = array_merge($resultData, $analysisService->analyze($answers));

        return Result::create($resultData);
    }

    protected function getCurrentQuizId(): int
    {
        return session(self::SESSION_QUIZ_ID_KEY);
    }

    protected function getActiveQuiz(): Quiz
    {
        $quizId = $this->getCurrentQuizId();

        return Cache::remember("active_quiz_{$quizId}", now()->addHour(), function () use ($quizId) {
            return Quiz::with(['activeQuestions.activeOptions'])
                ->where('is_active', true)
                ->findOrFail($quizId);
        });
    }

    protected function storeAnswer(int $questionId, int $optionId): void
    {
        $quizId = $this->getCurrentQuizId();
        $answers = session()->get(self::SESSION_ANSWERS_KEY . "_$quizId", []);
        $answers[$questionId] = $optionId;
        session([self::SESSION_ANSWERS_KEY . "_$quizId" => $answers]);
    }

    protected function calculateProgress(int $current, int $total): int
    {
        return round(($current / max($total, 1)) * 100);
    }

    protected function calculateResults(array $answers): Result
    {
        $quizId = $this->getCurrentQuizId();
        $score = Option::whereIn('id', $answers)->sum('score');

        return Result::where('quiz_id', $quizId)
            ->where('min_score', '<=', $score)
            ->where('max_score', '>=', $score)
            ->firstOrFail();
    }
}
