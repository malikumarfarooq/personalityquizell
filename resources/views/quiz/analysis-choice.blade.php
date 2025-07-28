{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container py-5">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <div class="card shadow">--}}
{{--                    <div class="card-body p-5">--}}
{{--                        <h1 class="text-center mb-5">Choose Your Analysis Level</h1>--}}

{{--                        <div class="row g-4">--}}
{{--                            <!-- Free Analysis -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card h-100">--}}
{{--                                    <div class="card-body text-center p-4">--}}
{{--                                        <h3 class="card-title mb-2">Free Analysis</h3>--}}
{{--                                        <p class="text-muted mb-4">Basic personality insights</p>--}}

{{--                                        <h2 class="display-5 mb-4">Free</h2>--}}

{{--                                        <ul class="list-unstyled text-start mb-4">--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Basic personality overview</li>--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Key traits identification</li>--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Simple recommendations</li>--}}
{{--                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Shareable results</li>--}}
{{--                                        </ul>--}}

{{--                                        <form method="POST" action="{{ route('quiz.results') }}">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="analysis_type" value="free">--}}
{{--                                            <button type="submit" class="btn btn-outline-primary w-100">--}}
{{--                                                Get Free Analysis--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Premium Analysis -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card h-100 border-primary">--}}
{{--                                    <div class="card-body text-center p-4 bg-light">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <span class="badge bg-primary">Recommended</span>--}}
{{--                                        </div>--}}
{{--                                        <h3 class="card-title mb-2">Premium Analysis</h3>--}}
{{--                                        <p class="text-muted mb-4">In-depth personality report</p>--}}

{{--                                        <h2 class="display-5 mb-4">$9.99</h2>--}}

{{--                                        <ul class="list-unstyled text-start mb-4">--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Comprehensive personality report</li>--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Detailed trait analysis</li>--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Career recommendations</li>--}}
{{--                                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Relationship insights</li>--}}
{{--                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Personal growth plan</li>--}}
{{--                                        </ul>--}}

{{--                                        <form method="POST" action="{{ route('payment.process') }}">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="analysis_type" value="premium">--}}
{{--                                            <button type="submit" class="btn btn-primary w-100">--}}
{{--                                                Unlock Premium Analysis--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
                        <h1 class="text-center mb-5">Your Quiz Results</h1>

                        <div class="text-center">
                            <form method="POST" action="{{ route('quiz.results') }}">
                                @csrf
                                <input type="hidden" name="analysis_type" value="free">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    View My Results Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
