@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Quiz Details: {{ $quiz->title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn btn-sm btn-outline-primary me-2">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <a href="{{ route('admin.quizzes.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Quizzes
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Basic Information</h5>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Title:</div>
                            <div class="col-md-8">{{ $quiz->title }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Description:</div>
                            <div class="col-md-8">{{ $quiz->description ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Status:</div>
                            <div class="col-md-8">
                                <span class="badge {{ $quiz->status_badge }}">{{ $quiz->status }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Duration:</div>
                            <div class="col-md-8">{{ $quiz->duration ? $quiz->duration . ' minutes' : 'Not set' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Passing Score:</div>
                            <div class="col-md-8">{{ $quiz->passing_score ?? 'Not set' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Questions:</div>
                            <div class="col-md-8">{{ $quiz->questions_count }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 fw-bold">Created:</div>
                            <div class="col-md-8">{{ $quiz->created_at->format('M d, Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary text-start">
                                <i class="fas fa-question-circle me-2"></i> Manage Questions
                            </a>
                            <a href="#" class="btn btn-outline-info text-start">
                                <i class="fas fa-chart-bar me-2"></i> View Results
                            </a>
                            <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" class="d-grid" onsubmit="return confirm('Are you sure you want to delete this quiz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger text-start">
                                    <i class="fas fa-trash me-2"></i> Delete Quiz
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
