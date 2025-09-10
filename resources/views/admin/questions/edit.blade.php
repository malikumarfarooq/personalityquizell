@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Question</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.questions.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Questions
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.questions.update', $question) }}" method="POST" id="questionForm">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quiz_id" class="form-label">Quiz *</label>
                                <select class="form-select @error('quiz_id') is-invalid @enderror" id="quiz_id" name="quiz_id" required>
                                    <option value="">Select Quiz</option>
                                    @foreach($quizzes as $quiz)
                                        <option value="{{ $quiz->id }}" {{ old('quiz_id', $question->quiz_id) == $quiz->id ? 'selected' : '' }}>
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
                                    <option value="multiple_choice" {{ old('type', $question->type) == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                    <option value="checkbox" {{ old('type', $question->type) == 'checkbox' ? 'selected' : '' }}>Checkbox</option>
                                    <option value="textarea" {{ old('type', $question->type) == 'textarea' ? 'selected' : '' }}>Text Area</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">Question Text *</label>
                        <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3" required>{{ old('text', $question->text) }}</textarea>
                        @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="order" class="form-label">Order *</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $question->order) }}" min="1" required>
                                @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <div class="form-check mt-4 pt-2">
                                    <input class="form-check-input" type="checkbox" id="is_required" name="is_required" value="1" {{ old('is_required', $question->is_required) ? 'checked' : '' }}>
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
                            @if(in_array($question->type, ['multiple_choice', 'checkbox']) && $question->options->count() > 0)
                                @foreach($question->options as $index => $option)
                                    <div class="option-item card mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label">Option Text *</label>
                                                        <input type="text" class="form-control" name="options[{{ $option->id }}][text]" value="{{ old('options.'.$option->id.'.text', $option->text) }}" required>
                                                        <input type="hidden" name="options[{{ $option->id }}][id]" value="{{ $option->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-2">
                                                        <label class="form-label">Score</label>
                                                        <input type="number" class="form-control" name="options[{{ $option->id }}][score]" value="{{ old('options.'.$option->id.'.score', $option->score) }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-2">
                                                        <label class="form-label">Correct</label>
                                                        <div class="form-check mt-2">
                                                            <input type="checkbox" class="form-check-input" name="options[{{ $option->id }}][is_correct]" value="1" {{ old('options.'.$option->id.'.is_correct', $option->is_correct) ? 'checked' : '' }}>
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
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button type="button" id="addOption" class="btn btn-sm btn-outline-primary mt-2">
                            <i class="fas fa-plus me-1"></i> Add Option
                        </button>

                        <!-- Hidden field for deleted options -->
                        <input type="hidden" name="deleted_options" id="deletedOptions" value="">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Update Question</button>
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
            const deletedOptionsInput = document.getElementById('deletedOptions');
            let optionCount = {{ $question->options->count() }};
            let newOptionCount = 0;
            const deletedOptions = [];

            // Show/hide options based on question type
            function toggleOptionsSection() {
                if (typeSelect.value === 'multiple_choice' || typeSelect.value === 'checkbox') {
                    optionsSection.style.display = 'block';
                    if (optionCount === 0 && newOptionCount === 0) {
                        addOption();
                    }
                } else {
                    optionsSection.style.display = 'none';
                }
            }

            // Add a new option field
            function addOption() {
                newOptionCount++;
                const optionDiv = document.createElement('div');
                optionDiv.className = 'option-item card mb-2';
                optionDiv.innerHTML = `
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label">Option Text *</label>
                            <input type="text" class="form-control" name="options[new_${newOptionCount}][text]" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Score</label>
                            <input type="number" class="form-control" name="options[new_${newOptionCount}][score]" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label">Correct</label>
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" name="options[new_${newOptionCount}][is_correct]" value="1">
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
                    optionDiv.remove();
                });
            }

            // Handle removal of existing options
            function setupRemoveListeners() {
                const removeButtons = document.querySelectorAll('.remove-option');
                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const optionItem = this.closest('.option-item');
                        const hiddenIdInput = optionItem.querySelector('input[type="hidden"][name*="[id]"]');

                        if (hiddenIdInput) {
                            // This is an existing option, add to deleted options
                            deletedOptions.push(hiddenIdInput.value);
                            deletedOptionsInput.value = JSON.stringify(deletedOptions);
                        }

                        optionItem.remove();

                        // Prevent removing all options
                        if (optionsContainer.children.length === 0) {
                            addOption();
                        }
                    });
                });
            }

            // Initial setup
            toggleOptionsSection();
            setupRemoveListeners();

            // Event listeners
            typeSelect.addEventListener('change', toggleOptionsSection);
            addOptionBtn.addEventListener('click', addOption);
        });
    </script>
@endpush
