@extends('layouts.app')

@section('title', 'About Us - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">About NeuroProfile</h1>
                    <p class="lead mb-4">Discover the team and mission behind our neuroscience-based personality assessment</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section bg-light-custom-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0 mb-5">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Our Mission</h2>
                            <p class="mb-4">At NeuroProfile, we believe that understanding your unique cognitive and emotional patterns is the key to personal growth, better relationships, and professional success. Our mission is to make cutting-edge neuroscience accessible to everyone through accurate, engaging, and insightful personality assessments.</p>
                            <p>We combine rigorous scientific research with user-friendly technology to provide you with a comprehensive analysis of your personality traits, cognitive styles, and emotional patterns.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 mb-5">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Our Story</h2>
                            <p class="mb-4">Founded in 2018 by a team of neuroscientists and psychologists, NeuroProfile began as a research project at a leading university. Our founders noticed a gap between academic research and practical applications of neuroscience in everyday life.</p>
                            <p>What started as a small side project has now grown into a platform used by over 500,000 people worldwide. We're proud to have helped individuals, couples, teams, and organizations gain deeper insights into human behavior.</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-5">Our Team</h2>
                            <div class="row">
                                <div class="col-md-4 text-center mb-4">
                                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Dr. Sarah Johnson" class="rounded-circle mb-3" width="120" height="120">
                                    <h5>Dr. Sarah Johnson</h5>
                                    <p class="text-primary mb-1">Lead Neuroscientist</p>
                                    <p class="small">PhD in Cognitive Neuroscience with 15+ years of research experience</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Michael Chen" class="rounded-circle mb-3" width="120" height="120">
                                    <h5>Michael Chen</h5>
                                    <p class="text-primary mb-1">Data Science Director</p>
                                    <p class="small">Expert in machine learning and behavioral data analysis</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Dr. Elena Rodriguez" class="rounded-circle mb-3" width="120" height="120">
                                    <h5>Dr. Elena Rodriguez</h5>
                                    <p class="text-primary mb-1">Clinical Psychologist</p>
                                    <p class="small">Specializes in personality assessment and therapeutic applications</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
