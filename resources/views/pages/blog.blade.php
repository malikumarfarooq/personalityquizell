@extends('layouts.app')

@section('title', 'Blog - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">NeuroProfile Blog</h1>
                    <p class="lead mb-4">Insights on neuroscience, personality, and personal development</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Featured Post -->
                        <div class="col-12 mb-5">
                            <div class="card border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Brain Plasticity">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-primary me-2">Featured</span>
                                        <small class="text-muted">June 15, 2023</small>
                                    </div>
                                    <h3 class="card-title h4">Neuroplasticity: How Your Brain Changes Throughout Life</h3>
                                    <p class="card-text">New research reveals how everyday experiences shape our brain structure and function, with implications for personality development and change.</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                        <!-- Blog Posts -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Decision Making">
                                <div class="card-body">
                                    <small class="text-muted">June 8, 2023</small>
                                    <h5 class="card-title mt-2">The Neuroscience of Decision Making</h5>
                                    <p class="card-text">How your brain's reward system influences everyday choices and major life decisions.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Mindfulness">
                                <div class="card-body">
                                    <small class="text-muted">June 1, 2023</small>
                                    <h5 class="card-title mt-2">Mindfulness and Brain Changes</h5>
                                    <p class="card-text">Research shows how meditation practices can physically alter brain structure and function.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Sleep">
                                <div class="card-body">
                                    <small class="text-muted">May 25, 2023</small>
                                    <h5 class="card-title mt-2">Sleep's Role in Emotional Regulation</h5>
                                    <p class="card-text">How quality sleep impacts your ability to manage emotions and maintain mental health.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <img src="https://images.unsplash.com/photo-1576671414121-aa0eb16a4e24?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Social Connection">
                                <div class="card-body">
                                    <small class="text-muted">May 18, 2023</small>
                                    <h5 class="card-title mt-2">The Social Brain</h5>
                                    <p class="card-text">Exploring how our brains are wired for connection and how relationships shape our neural pathways.</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Blog pagination">
                        <ul class="pagination justify-content-center mt-5">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Categories</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-decoration-none">Neuroscience (12)</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Personality Research (8)</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Mental Health (10)</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Relationships (6)</a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Career Development (7)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Subscribe</h5>
                            <p>Get the latest articles on neuroscience and personality delivered to your inbox.</p>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Your email address">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
