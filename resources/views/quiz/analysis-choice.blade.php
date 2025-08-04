@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0 text-center">Choose Your Analysis Level</h2>
                    </div>
                    <div class="card-body p-5">
                        <div class="row g-4">
                            <!-- Free Analysis -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body text-center p-4">
                                        <h3 class="card-title mb-3">Free Analysis</h3>
                                        <p class="text-muted mb-4">Basic personality insights</p>

                                        <div class="pricing-header mb-4">
                                            <h2 class="display-4">Free</h2>
                                        </div>

                                        <ul class="list-unstyled text-start mb-4">
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Basic personality overview</li>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Key traits identification</li>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Simple recommendations</li>
                                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Shareable results</li>
                                        </ul>

                                        <form method="POST" action="{{ route('quiz.results') }}" class="mt-auto">
                                            @csrf
                                            <input type="hidden" name="analysis_type" value="free">
                                            <button type="submit" class="btn btn-outline-primary w-100 py-2">
                                                Get Free Analysis
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Premium Analysis -->
                            <div class="col-md-6">
                                <div class="card h-100 border-3 border-primary">
                                    <div class="card-body text-center p-4 bg-light bg-opacity-10">
                                        <div class="mb-3">
                                            <span class="badge bg-primary rounded-pill px-3 py-2">Most Popular</span>
                                        </div>
                                        <h3 class="card-title mb-3">Premium Analysis</h3>
                                        <p class="text-muted mb-4">In-depth personality report</p>

                                        <div class="pricing-header mb-4">
                                            <h2 class="display-4">$9.99</h2>
                                            <small class="text-muted">one-time payment</small>
                                        </div>

                                        <ul class="list-unstyled text-start mb-4">
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Comprehensive personality report</li>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Detailed trait analysis</li>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Career recommendations</li>
                                            <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Relationship insights</li>
                                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Personal growth plan</li>
                                        </ul>

                                        <form method="POST" action="{{ route('quiz.results') }}" class="mt-auto">
                                            @csrf
                                            <input type="hidden" name="analysis_type" value="premium">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="bi bi-star-fill me-2"></i> Unlock Premium
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <p class="text-muted small">
                                <i class="bi bi-shield-lock me-1"></i> All payments are secure and encrypted
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
