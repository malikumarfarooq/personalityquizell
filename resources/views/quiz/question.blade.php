@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Progress: {{ $progress }}%</span>
                                <span class="text-muted">Question {{ $currentQuestion }} of {{ $totalQuestions }}</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%"
                                     aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('quiz.answer') }}">
                            @csrf
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <input type="hidden" name="current_question" value="{{ $currentQuestion }}">

                            <h3 class="mb-4">{{ $question->text }}</h3>

                            <div class="list-group mb-4">
                                @foreach($question->activeOptions as $option)
                                    <label class="list-group-item">
                                        <input class="form-check-input me-2" type="radio" name="answer"
                                               value="{{ $option->id }}" required>
                                        {{ $option->text }}
                                    </label>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-3">
                                {{ $currentQuestion == $totalQuestions ? 'See Results' : 'Next Question' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
