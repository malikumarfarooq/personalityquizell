@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Question Details</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.questions.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Questions
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Question Information</h5>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Quiz:</strong>
                                <p>{{ $question->quiz->title }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Type:</strong>
                                <p><span class="badge {{ $question->type_badge }}">{{ $question->type }}</span></p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <strong>Question Text:</strong>
                            <p>{{ $question->text }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <strong>Order:</strong>
                                <p>{{ $question->order }}</p>
                            </div>
                            <div class="col-md-3">
                                <strong>Required:</strong>
                                <p>{!! $question->required_badge !!}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong>
                                <p>{{ $question->created_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if(in_array($question->type, ['multiple_choice', 'checkbox']))
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Options</h5>
                            @if($question->options->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>Option Text</th>
                                            <th>Score</th>
                                            <th>Correct</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($question->options as $option)
                                            <tr>
                                                <td>{{ $option->text }}</td>
                                                <td>{{ $option->score }}</td>
                                                <td>
                                                    @if($option->is_correct)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-secondary">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($option->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted">No options found for this question.</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Actions</h5>

                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-1"></i> Edit Question
                            </a>

                            <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" class="d-grid">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this question?')">
                                    <i class="fas fa-trash me-1"></i> Delete Question
                                </button>
                            </form>

                            <a href="{{ route('admin.questions.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-list me-1"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
