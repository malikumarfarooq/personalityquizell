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
                <form action="{{ route('admin.questions.store') }}" method="POST" id="questionForm">
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

                    <!-- Options Section (only for multiple choice and checkbox) -->
                    <div id="optionsSection" style="display: none;">
                        <hr>
                        <h5>Options</h5>

                        <div id="optionsContainer">
                            <!-- Options will be added here dynamically -->
                        </div>

                        <button type="button" id="addOption" class="btn btn-sm btn-outline-primary mt-2">
                            <i class="fas fa-plus me-1"></i> Add Option
                        </button>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Create Question</button>
                        <a href="{{ route('admin.questions.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const optionsSection = document.getElementById('optionsSection');
            const optionsContainer = document.getElementById('optionsContainer');
            const addOptionBtn = document.getElementById('addOption');
            let optionCount = 0;

            // Show/hide options based on question type
            function toggleOptionsSection() {
                if (typeSelect.value === 'multiple_choice' || typeSelect.value === 'checkbox') {
                    optionsSection.style.display = 'block';
                    if (optionCount === 0) {
                        addOption();
                    }
                } else {
                    optionsSection.style.display = 'none';
                    optionsContainer.innerHTML = '';
                    optionCount = 0;
                }
            }

            // Add a new option field
            function addOption() {
                optionCount++;
                const optionDiv = document.createElement('div');
                optionDiv.className = 'option-item card mb-2';
                optionDiv.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">Option Text *</label>
                            <input type="text" class="form-control" name="options[${optionCount}][text]" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Score</label>
                            <input type="number" class="form-control" name="options[${optionCount}][score]" value="0" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Correct</label>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" name="options[${optionCount}][is_correct]" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Action</label>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-option" style="display: block;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

                optionsContainer.appendChild(optionDiv);

                // Add event listener for remove button
                const removeBtn = optionDiv.querySelector('.remove-option');
                removeBtn.addEventListener('click', function() {
                    if (optionsContainer.children.length > 1) {
                        optionDiv.remove();
                        optionCount--;
                    } else {
                        alert('At least one option is required.');
                    }
                });
            }

            // Initial toggle based on selected type
            toggleOptionsSection();

            // Event listeners
            typeSelect.addEventListener('change', toggleOptionsSection);
            addOptionBtn.addEventListener('click', addOption);
        });
    </script>
@endpush
