@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 mb-4">Welcome to Your Dashboard</h1>

                        @if($hasQuiz)
                            <p class="lead mb-5">You're now ready to take the Personality Insights Quiz!</p>

                            <div class="d-flex justify-content-center">
                                <a href="{{ route('quiz.begin') }}" class="btn btn-primary btn-lg px-5 py-3">
                                    <i class="bi bi-play-circle me-2"></i> START QUIZ NOW
                                </a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <p class="lead mb-0">No active quizzes available at this time.</p>
                            </div>
                        @endif

                        @if(session('quiz_completed'))
                            <div class="alert alert-success mt-4">
                                <p class="mb-0">You've already completed the quiz!
                                    <a href="{{ route('quiz.results') }}" class="alert-link">
                                        View your results
                                    </a>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
