<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $quizId = $request->input('quiz_id', '');

        $questions = Question::with(['quiz', 'options'])
            ->withCount('options')
            ->when($search, function ($query, $search) {
                return $query->where('text', 'like', "%{$search}%");
            })
            ->when($quizId, function ($query, $quizId) {
                return $query->where('quiz_id', $quizId);
            })
            ->orderBy('quiz_id')
            ->orderBy('order')
            ->paginate(10);

        $quizzes = Quiz::where('is_active', true)->get();

        return view('admin.questions.index', compact('questions', 'search', 'quizId', 'quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quizzes = Quiz::where('is_active', true)->get();
        return view('admin.questions.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'text' => 'required|string|max:500',
            'type' => 'required|in:multiple_choice,checkbox,textarea',
            'order' => 'required|integer|min:1',
            'is_required' => 'boolean',
        ]);

        Question::create($validated);

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with(['quiz', 'options'])->findOrFail($id);
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quiz::where('is_active', true)->get();

        return view('admin.questions.edit', compact('question', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'text' => 'required|string|max:500',
            'type' => 'required|in:multiple_choice,checkbox,textarea',
            'order' => 'required|integer|min:1',
            'is_required' => 'boolean',
        ]);

        $question->update($validated);

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question deleted successfully!');
    }
}
