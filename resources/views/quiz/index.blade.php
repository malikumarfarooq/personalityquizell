@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0 text-center">Available Quizzes</h2>
                    </div>
                    <div class="card-body p-5">
                        <div class="row">
                            @foreach($quizzes as $quiz)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h3 class="card-title">{{ $quiz->title }}</h3>
                                            <p class="card-text">{{ $quiz->description }}</p>
                                            <p><strong>Questions:</strong> {{ $quiz->activeQuestions()->count() }}</p>
                                            <a href="{{ route('quiz.start', $quiz) }}" class="btn btn-primary">Start This Quiz</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($quizzes->isEmpty())
                            <div class="text-center">
                                <p class="lead">No quizzes available at the moment.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
