{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container py-5">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <div class="card shadow">--}}
{{--                    <div class="card-body p-5">--}}
{{--                        <div class="text-center mb-5">--}}
{{--                            <h1 class="display-4 mb-3">Your Personalized Result</h1>--}}
{{--                            <h2 class="text-primary">{{ $result->title }}</h2>--}}
{{--                        </div>--}}

{{--                        @if($result->image_path)--}}
{{--                            <div class="text-center mb-5">--}}
{{--                                <img src="{{ asset($result->image_path) }}" alt="Result Image" class="img-fluid rounded">--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="mb-5">--}}
{{--                            <h3 class="mb-4">Personality Summary</h3>--}}
{{--                            <div class="lead">--}}
{{--                                {!! $result->description !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        @if($result->traits)--}}
{{--                            <div class="mb-5">--}}
{{--                                <h3 class="mb-4">Key Personality Traits</h3>--}}
{{--                                <div class="row g-3">--}}
{{--                                    @foreach(explode("\n", $result->traits) as $trait)--}}
{{--                                        @if(trim($trait))--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="card h-100">--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        <p class="card-text">{{ $trait }}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if($analysisType === 'free')--}}
{{--                            <div class="alert alert-info">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0">--}}
{{--                                        <i class="bi bi-info-circle-fill"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1 ms-3">--}}
{{--                                        <h4 class="alert-heading">Want More Insights?</h4>--}}
{{--                                        <p>Upgrade to our Premium Analysis for detailed career recommendations, relationship insights, and a personalized growth plan.</p>--}}
{{--                                        <a href="{{ route('quiz.upgrade') }}" class="btn btn-info mt-2">Upgrade Now</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mt-5 pt-4 border-top">--}}
{{--                            <button class="btn btn-outline-secondary">--}}
{{--                                <i class="bi bi-save me-2"></i> Save Results--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-primary">--}}
{{--                                <i class="bi bi-download me-2"></i> Download PDF--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}



@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h1 class="display-4 mb-3">Your Personality Result</h1>
                            <h2 class="text-primary">{{ $result->title }}</h2>
                        </div>

                        @if($result->image_path)
                            <div class="text-center mb-5">
                                <img src="{{ asset($result->image_path) }}" alt="Result Image" class="img-fluid rounded">
                            </div>
                        @endif

                        <div class="mb-5">
                            <h3 class="mb-4">Your Personality Summary</h3>
                            <div class="lead">
                                {!! $result->description !!}
                            </div>
                        </div>

                        @if($result->traits)
                            <div class="mb-5">
                                <h3 class="mb-4">Your Key Traits</h3>
                                <div class="row g-3">
                                    @foreach(explode("\n", $result->traits) as $trait)
                                        @if(trim($trait))
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <p class="card-text">{{ $trait }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="text-center mt-5">
                            <a href="{{ route('quiz.start') }}" class="btn btn-primary">
                                Take Quiz Again
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
