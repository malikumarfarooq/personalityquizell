@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Question</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.questions.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Questions
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.questions.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quiz_id" class="form-label">Quiz *</label>
                                <select class="form-select @error('quiz_id') is-invalid @enderror" id="quiz_id" name="quiz_id" required>
                                    <option value="">Select Quiz</option>
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}" {{ old('quiz_id') == $quiz->id ? 'selected' : '' }}>
                                            {{ $quiz->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('quiz_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Question Type *</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="multiple_choice" {{ old('type') == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                    <option value="checkbox" {{ old('type') == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                    <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Text Area</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Question Text *</label>
                        <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3" required>{{ old('text') }}</textarea>
                        @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="order" class="form-label">Order *</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 1) }}" min="1" required>
                                @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <div class="form-check mt-4 pt-2">
                                    <input class="form-check-input" type="checkbox" id="is_required" name="is_required" value="1" {{ old('is_required') ? 'checked' : 'checked' }}>
                                    <label class="form-check-label" for="is_required">
                                        Required Question
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Create Question</button>
                        <a href="{{ route('admin.questions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
