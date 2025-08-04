@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-body p-5">
                        @if($result->is_paid)
                            {{-- Premium Results --}}
                            <div class="text-center mb-5">
                                <span class="badge bg-success rounded-pill px-3 py-2 mb-3">Premium Analysis</span>
                                <h1 class="mb-3">{{ $result->title }}</h1>
                                @if($result->image_path)
                                    <img src="{{ asset($result->image_path) }}" alt="Result Image"
                                         class="img-fluid rounded shadow mb-4" style="max-height: 300px;">
                                @endif
                                <p class="lead text-muted">Your complete personality breakdown</p>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="card mb-4 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h3 class="card-title mb-3">
                                                <i class="bi bi-person-badge me-2 text-primary"></i>
                                                Personality Summary
                                            </h3>
                                            <p class="card-text">{{ $result->description }}</p>
                                        </div>
                                    </div>

                                    @if($result->premium_content)
                                        @foreach($result->premium_content as $section => $content)
                                            <div class="card mb-4 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <h3 class="card-title mb-3">
                                                        <i class="bi bi-{{ $this->getSectionIcon($section) }} me-2 text-primary"></i>
                                                        {{ ucfirst(str_replace('_', ' ', $section)) }}
                                                    </h3>
                                                    @if(is_array($content))
                                                        <ul class="list-group list-group-flush">
                                                            @foreach($content as $item)
                                                                <li class="list-group-item border-0 py-2">
                                                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                                    {{ $item }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="card-text">{{ $content }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if($result->traits)
                                        <div class="card mb-4 border-0 shadow-sm">
                                            <div class="card-body">
                                                <h3 class="card-title mb-3">
                                                    <i class="bi bi-bar-chart-line me-2 text-primary"></i>
                                                    Your Personality Traits
                                                </h3>
                                                <div class="row">
                                                    @foreach($result->traits as $trait => $score)
                                                        <div class="col-md-6 mb-3">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body">
                                                                    <h6 class="card-subtitle mb-2">
                                                                        {{ ucfirst($trait) }}
                                                                        <span class="badge bg-primary rounded-pill float-end">{{ $score }}%</span>
                                                                    </h6>
                                                                    <div class="progress mt-2" style="height: 10px;">
                                                                        <div class="progress-bar bg-gradient-primary"
                                                                             role="progressbar"
                                                                             style="width: {{ $score }}%"
                                                                             aria-valuenow="{{ $score }}"
                                                                             aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-primary" onclick="window.print()">
                                            <i class="bi bi-printer me-2"></i> Print Your Results
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Free Results with Upgrade Option --}}
                            <div class="text-center mb-5">
                                <h1 class="mb-3">{{ $result->title }}</h1>
                                @if($result->image_path)
                                    <img src="{{ asset($result->image_path) }}" alt="Result Image"
                                         class="img-fluid rounded shadow mb-4" style="max-height: 250px;">
                                @endif
                                <p class="lead text-muted">Your basic personality insights</p>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="card mb-4 border-0 shadow-sm">
                                        <div class="card-body">
                                            <h3 class="card-title mb-3">
                                                <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                                                Basic Analysis
                                            </h3>
                                            <p class="card-text">{{ Str::limit($result->description, 300) }}</p>

                                            @if($result->traits)
                                                <h5 class="mt-4 mb-3">
                                                    <i class="bi bi-star me-2 text-warning"></i>
                                                    Key Traits Preview
                                                </h5>
                                                <div class="row">
                                                    @foreach(array_slice($result->traits, 0, 3) as $trait => $score)
                                                        <div class="col-md-4 mb-3">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body text-center">
                                                                    <h6 class="card-subtitle mb-2">{{ ucfirst($trait) }}</h6>
                                                                    <div class="progress mx-auto" style="height: 10px; width: 80%;">
                                                                        <div class="progress-bar bg-gradient-primary"
                                                                             role="progressbar"
                                                                             style="width: {{ $score }}%"
                                                                             aria-valuenow="{{ $score }}"
                                                                             aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <span class="badge bg-primary mt-2">{{ $score }}%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <p class="text-center text-muted small mt-2">
                                                    + {{ count($result->traits) - 3 }} more traits available in premium version
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Premium Upgrade Card --}}
                                    <div class="card mb-4 border-3 border-primary shadow">
                                        <div class="card-header bg-primary text-white py-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0">
                                                    <i class="bi bi-unlock me-2"></i>
                                                    Unlock Full Analysis
                                                </h4>
                                                <span class="badge bg-white text-primary rounded-pill px-3">Recommended</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center mb-4">
                                                <h2 class="display-5">$9.99</h2>
                                                <p class="text-muted">One-time payment • 30-day satisfaction guarantee</p>
                                            </div>

                                            <div class="mb-4">
                                                <h5 class="mb-3">
                                                    <i class="bi bi-lightning me-2 text-warning"></i>
                                                    Premium Features:
                                                </h5>
                                                <ul class="list-group list-group-flush mb-3">
                                                    <li class="list-group-item border-0 py-2">
                                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                                        Complete personality breakdown
                                                    </li>
                                                    <li class="list-group-item border-0 py-2">
                                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                                        All {{ count($result->traits) }} trait analyses
                                                    </li>
                                                    <li class="list-group-item border-0 py-2">
                                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                                        Detailed career recommendations
                                                    </li>
                                                    <li class="list-group-item border-0 py-2">
                                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                                        Relationship compatibility insights
                                                    </li>
                                                    <li class="list-group-item border-0 py-2">
                                                        <i class="bi bi-check-circle-fill text-primary me-2"></i>
                                                        Personalized growth roadmap
                                                    </li>
                                                </ul>
                                            </div>

                                            <form id="payment-form" method="POST" action="{{ route('payment.process', $result) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                                                    <i class="bi bi-lock-fill me-2"></i>
                                                    Unlock Full Analysis Now
                                                </button>
                                            </form>

                                            <div class="text-center mt-3">
                                                <small class="text-muted">
                                                    <i class="bi bi-shield-lock me-1"></i>
                                                    Secure payment processed by Stripe
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .bg-gradient-primary {
                background: linear-gradient(to right, #4e54c8, #8f94fb);
            }
            .card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Add any custom JavaScript here if needed
        </script>
    @endpush
@endsection
