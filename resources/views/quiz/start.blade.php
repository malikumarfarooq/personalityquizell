@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 mb-4">{{ $quiz->title }}</h1>
                        <p class="lead mb-4">{{ $quiz->description }}</p>

                        <div class="text-start mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-clock-fill text-primary me-2"></i>
                                <span>5 minutes to complete</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-question-circle-fill text-primary me-2"></i>
                                <span>{{ $questionsCount }} carefully crafted questions</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-robot text-primary me-2"></i>
                                <span>AI-powered personalized results</span>
                            </div>
                        </div>

                        <hr class="my-4">

                        <a href="{{ route('quiz.begin') }}" class="btn btn-primary btn-lg px-5 py-3">
                            <i class="bi bi-play-circle me-2"></i> START QUIZ NOW
                        </a>

                        <p class="text-muted mt-4">
                            This quiz is designed for entertainment and self-reflection purposes.<br>
                            Results should not be used for clinical or professional decisions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
