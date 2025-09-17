@extends('layouts.app')

@section('title', 'Help Center - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Help Center</h1>
                    <p class="lead mb-4">Find answers and resources to get the most out of NeuroProfile</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Search Section -->
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-4">How can we help you?</h3>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for answers...">
                                        <button class="btn btn-primary" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Help Categories -->
                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                                <div class="card-body p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-question-circle"></i>
                                    </div>
                                    <h5>Getting Started</h5>
                                    <p>New to NeuroProfile? Learn how to create an account and take your first assessment.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Explore Guides</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                                <div class="card-body p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-bar-chart"></i>
                                    </div>
                                    <h5>Understanding Results</h5>
                                    <p>Learn how to interpret your neuro-profile and apply insights to your life.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View Resources</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm text-center">
                                <div class="card-body p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                    <h5>Billing & Accounts</h5>
                                    <p>Find answers about subscriptions, payments, and account management.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">See FAQs</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Articles -->
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5">
                            <h3 class="mb-4">Popular Help Articles</h3>
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    How to interpret your cognitive flexibility score
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Troubleshooting assessment issues
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Updating your account information
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Understanding the science behind the assessment
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    Downloading your results report
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-3">Still need help?</h3>
                            <p class="mb-4">Our support team is here to assist you with any questions or issues.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="{{ route('contact') }}" class="btn btn-primary">Contact Support</a>
                                <a href="{{ route('faq') }}" class="btn btn-outline-primary">View Full FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
