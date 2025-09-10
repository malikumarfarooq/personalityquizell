<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
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
    public function create()
    {
        $quizzes = Quiz::where('is_active', true)->get();
        return view('admin.questions.create', compact('quizzes'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'text' => 'required|string|max:500',
            'type' => 'required|in:multiple_choice,checkbox,textarea',
            'order' => 'required|integer|min:1',
            'is_required' => 'boolean',
            'options' => 'sometimes|array',
            'options.*.text' => 'required_with:options|string|max:255',
            'options.*.score' => 'required_with:options|integer|min:0',
            'options.*.is_correct' => 'sometimes|boolean',
        ]);

        $question = Question::create($validated);

        // Create options if provided and question type requires them
        if (in_array($question->type, ['multiple_choice', 'checkbox']) && isset($validated['options'])) {
            foreach ($validated['options'] as $optionData) {
                $question->options()->create([
                    'text' => $optionData['text'],
                    'score' => $optionData['score'] ?? 0,
                    'is_correct' => $optionData['is_correct'] ?? false,
                    'is_active' => true,
                ]);
            }
        }

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question created successfully!');
    }
    public function show(string $id)
    {
        $question = Question::with(['quiz', 'options'])->findOrFail($id);
        return view('admin.questions.show', compact('question'));
    }
    public function edit(string $id)
    {
        $question = Question::with('options')->findOrFail($id);
        $quizzes = Quiz::where('is_active', true)->get();

        return view('admin.questions.edit', compact('question', 'quizzes'));
    }
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'text' => 'required|string|max:500',
            'type' => 'required|in:multiple_choice,checkbox,textarea',
            'order' => 'required|integer|min:1',
            'is_required' => 'boolean',
            'options' => 'sometimes|array',
            'options.*.id' => 'sometimes|exists:options,id',
            'options.*.text' => 'required_with:options|string|max:255',
            'options.*.score' => 'required_with:options|integer',
            'options.*.is_correct' => 'sometimes|boolean',
            'options.*.is_active' => 'sometimes|boolean',
            'deleted_options' => 'sometimes|array',
            'deleted_options.*' => 'exists:options,id',
        ]);

        $question->update($validated);

        // Handle options based on question type
        if (in_array($question->type, ['multiple_choice', 'checkbox'])) {
            // Update or create options
            if (isset($validated['options'])) {
                foreach ($validated['options'] as $optionData) {
                    if (isset($optionData['id'])) {
                        // Update existing option
                        $option = Option::find($optionData['id']);
                        if ($option) {
                            $option->update([
                                'text' => $optionData['text'],
                                'score' => $optionData['score'],
                                'is_correct' => $optionData['is_correct'] ?? false,
                                'is_active' => $optionData['is_active'] ?? true,
                            ]);
                        }
                    } else {
                        // Create new option
                        $question->options()->create([
                            'text' => $optionData['text'],
                            'score' => $optionData['score'],
                            'is_correct' => $optionData['is_correct'] ?? false,
                            'is_active' => true,
                        ]);
                    }
                }
            }

            // Delete options marked for deletion
            if (isset($validated['deleted_options'])) {
                Option::whereIn('id', $validated['deleted_options'])->delete();
            }
        } else {
            // Remove all options for non-option question types
            $question->options()->delete();
        }

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question updated successfully!');
    }
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.questions.index')
            ->with('success', 'Question deleted successfully!');
    }
}
