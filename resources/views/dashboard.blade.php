@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow"  style="margin-top: 78px">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 mb-4">Welcome to Your Dashboard</h1>

                        @if($quizzes->isNotEmpty())
                            <p class="lead mb-5">Choose a quiz to get started!</p>

                            <div class="row">
                                @foreach($quizzes as $quiz)
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>{{ $quiz->title }}</h5>
                                                <p class="small">{{ $quiz->description }}</p>
                                                <a href="{{ route('quiz.start', $quiz) }}" class="btn btn-primary">
                                                    Start Quiz
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <p class="lead mb-0">No active quizzes available at this time.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
