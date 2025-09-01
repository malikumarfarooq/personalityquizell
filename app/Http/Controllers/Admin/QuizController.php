<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $status = $request->input('status', 'all');

        $quizzes = Quiz::withCount('questions')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->when($status && $status !== 'all', function ($query) use ($status) {
                if ($status === 'active') {
                    return $query->where('is_active', true);
                } elseif ($status === 'draft') {
                    return $query->where('is_active', false)->where('status', 'draft');
                } elseif ($status === 'archived') {
                    return $query->where('is_active', false)->where('status', 'archived');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.quizzes.index', compact('quizzes', 'search', 'status'));
    }

    /**
     * Show the form for creating a new quiz.
     */
    public function create()
    {
        return view('admin.quizzes.create');
    }

    /**
     * Store a newly created quiz in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,active,archived',
            'duration' => 'nullable|integer|min:1',
            'passing_score' => 'nullable|integer|min:0',
        ]);

        // Set is_active based on status
        $validated['is_active'] = $validated['status'] === 'active';

        Quiz::create($validated);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz created successfully!');
    }

    /**
     * Display the specified quiz.
     */
    public function show(Quiz $quiz)
    {
        $quiz->loadCount('questions');
        return view('admin.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified quiz.
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified quiz in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:draft,active,archived',
            'duration' => 'nullable|integer|min:1',
            'passing_score' => 'nullable|integer|min:0',
        ]);

        // Set is_active based on status
        $validated['is_active'] = $validated['status'] === 'active';

        $quiz->update($validated);

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz updated successfully!');
    }

    /**
     * Remove the specified quiz from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('admin.quizzes.index')
            ->with('success', 'Quiz deleted successfully!');
    }

    /**
     * Get quiz statistics for the dashboard.
     */
    public function stats()
    {
        return [
            'total' => Quiz::count(),
            'active' => Quiz::where('is_active', true)->count(),
            'draft' => Quiz::where('status', 'draft')->count(),
            'archived' => Quiz::where('status', 'archived')->count(),
        ];
    }

    /**
     * Toggle quiz active status.
     */
    public function toggleStatus(Quiz $quiz)
    {
        $newStatus = !$quiz->is_active;

        $quiz->update([
            'is_active' => $newStatus,
            'status' => $newStatus ? 'active' : 'draft'
        ]);

        return redirect()->back()
            ->with('success', 'Quiz status updated successfully!');
    }
}
