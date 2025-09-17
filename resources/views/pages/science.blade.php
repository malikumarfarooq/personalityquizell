@extends('layouts.app')

@section('title', 'Our Science - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Our Science</h1>
                    <p class="lead mb-4">Discover the neuroscience behind our personality assessment methodology</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0 mb-5">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Neuroscience-Based Assessment</h2>
                            <p class="mb-4">Our personality assessment is grounded in contemporary neuroscience research, focusing on the biological foundations of personality traits and behavioral patterns. Unlike traditional personality tests that rely solely on self-reporting, our approach incorporates neuroscientific principles to provide a more comprehensive understanding of individual differences.</p>

                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-cpu feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Brain-Behavior Connection</h5>
                                            <p>We examine how neural activity patterns correlate with specific personality traits and behavioral tendencies.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-activity feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Neurochemical Factors</h5>
                                            <p>Our model considers the role of neurotransmitters like dopamine, serotonin, and oxytocin in shaping personality.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-diagram-3 feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Neural Networks</h5>
                                            <p>We analyze how different brain regions communicate and how these patterns relate to cognitive styles.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-heart-pulse feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Physiological Markers</h5>
                                            <p>Our assessment incorporates research on how physiological responses correlate with personality dimensions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="mb-4">The Five Neuro-Dimensions</h2>
                            <p class="mb-4">Our assessment measures personality across five core neuro-dimensions, each grounded in specific neuroscientific research:</p>

                            <div class="row mt-4">
                                <div class="col-md-6 mb-4">
                                    <h5>1. Cognitive Flexibility</h5>
                                    <p>Measures prefrontal cortex activity related to adaptability, problem-solving, and response to change.</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>2. Emotional Resonance</h5>
                                    <p>Assesses limbic system functioning and emotional processing patterns.</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>3. Reward Sensitivity</h5>
                                    <p>Evaluates mesolimbic pathway activity and response to incentives.</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>4. Threat Reactivity</h5>
                                    <p>Measures amygdala response and stress regulation capabilities.</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h5>5. Social Connection</h5>
                                    <p>Assesses mirror neuron system activity and social brain functioning.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
