@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Discover Your Neuro-Emotional Profile</h1>
                    <p class="lead mb-4">A neuroscience-based personality test that reveals your unique cognitive and emotional patterns.</p>
                    <div class="d-flex flex-wrap gap-3">
                        @auth
                            @if($quiz = App\Models\Quiz::active()->first())
                                <a href="{{ route('quiz.start', $quiz) }}" class="btn btn-primary">Start the Test</a>
                            @else
                                <span class="btn btn-secondary">No quizzes available</span>
                            @endif
                        @else
                            <a href="{{ route('register') }}" class="btn btn-primary">Start the Test</a>
                        @endauth

                        <a href="#sample" class="btn btn-outline-primary">See a Sample Report</a>
                    </div>
                    <p class="mt-4 text-muted"><i class="bi bi-people-fill me-2"></i>Trusted by 10,000+ test-takers</p>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-center">
                    <img src="https://via.placeholder.com/600x500/f5f7ff/4a6cf7?text=Brain+Analysis" alt="Neuro-Emotional Profile" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light-custom-2">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-number">10,000+</div>
                    <p class="text-muted">Tests Completed</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="stat-number">95%</div>
                    <p class="text-muted">Satisfaction Rate</p>
                </div>
                <div class="col-md-4">
                    <div class="stat-number">15min</div>
                    <p class="text-muted">Average Time</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">How It Works</h2>
            <p class="text-center lead mb-5">Our simple 4-step process delivers deep insights into your personality and cognitive patterns.</p>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="text-center px-3">
                        <div class="feature-icon">
                            <i class="bi bi-pencil-square"></i>
                        </div>
                        <h4>Take the Test</h4>
                        <p>Complete our scientifically designed assessment in just 15 minutes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="text-center px-3">
                        <div class="feature-icon">
                            <i class="bi bi-file-text"></i>
                        </div>
                        <h4>Get Personalized Report</h4>
                        <p>Receive a detailed analysis of your cognitive and emotional patterns.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="text-center px-3">
                        <div class="feature-icon">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h4>Discover Brain Patterns</h4>
                        <p>Understand your unique neural pathways and thinking styles.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center px-3">
                        <div class="feature-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h4>Apply Insights</h4>
                        <p>Use actionable recommendations to improve your daily life.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="text-center section-title">Core Features & Benefits</h2>
            <p class="text-center lead mb-5">Comprehensive insights backed by neuroscience research to help you understand yourself better.</p>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="bi bi-graph-up feature-icon" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Personalized Cognitive Analysis</h4>
                            <p>Deep dive into your thinking patterns, decision-making style, and cognitive strengths.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="bi bi-heart-pulse feature-icon" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Stress & Emotion Mapping</h4>
                            <p>Understand your emotional responses and stress triggers with scientific precision.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="bi bi-shield-check feature-icon" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Trauma & Resilience Insights</h4>
                            <p>Discover your resilience patterns and areas for emotional growth and healing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="bi bi-gear feature-icon" style="font-size: 2rem;"></i>
                        </div>
                        <div>
                            <h4>Practical Recommendations</h4>
                            <p>Get actionable strategies tailored to your unique neural and emotional profile.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sample Report -->
    <section id="sample" class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">Sample Report Preview</h2>
            <p class="text-center lead mb-5">Get a glimpse of the comprehensive analysis you'll receive after completing our assessment.</p>

            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Personality Analysis Report</h5>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <h6>Research Global</h6>
                                    <p class="small text-muted">Overview of your personality profile</p>
                                </div>
                                <div class="col-6">
                                    <h6>Stress & Emotions</h6>
                                    <p class="small text-muted">Emotional response mapping</p>
                                </div>
                                <div class="col-6 mt-3">
                                    <h6>Performance</h6>
                                    <p class="small text-muted">Trauma and recovery insights</p>
                                </div>
                                <div class="col-6 mt-3">
                                    <h6>Analytiques</h6>
                                    <p class="small text-muted">Neural pattern analysis</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6>Progress Indicators</h6>
                                <div class="mt-3">
                                    <p class="mb-1">Cognitive Processing <span class="float-end">70%</span></p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 70%"></div>
                                    </div>
                                    <p class="mb-1">Emotional Regulation <span class="float-end">30%</span></p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 30%"></div>
                                    </div>
                                    <p class="mb-1">Stress Response <span class="float-end">80%</span></p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"></div>
                                    </div>
                                    <p class="mb-1">Resilience <span class="float-end">60%</span></p>
                                    <div class="progress mb-3">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="h-100 d-flex flex-column justify-content-center">
                        <h4>Detailed Insights Await</h4>
                        <p>Your personalized report includes comprehensive analysis across multiple dimensions of your personality and cognitive patterns:</p>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-primary me-2"></i>Cognitive processing style analysis</li>
                            <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-primary me-2"></i>Emotional regulation patterns</li>
                            <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-primary me-2"></i>Stress response mechanisms</li>
                            <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-primary me-2"></i>Personalized recommendations</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary align-self-start"><i class="bi bi-download me-2"></i>Download Example Report</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Science Behind -->
    <section id="science" class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="text-center section-title">The Science Behind Our Assessment</h2>
            <p class="text-center lead mb-5">Our personality test is built on decades of neuroscience research and validated psychological frameworks, ensuring accurate and meaningful insights into your cognitive and emotional patterns.</p>

            <div class="row mb-5">
                <div class="col-lg-8 mx-auto">
                    <h4 class="mb-4">Evidence-Based Methodology</h4>
                    <p>Our assessment combines insights from cognitive neuroscience, behavioral psychology, and trauma research to provide a comprehensive understanding of your mental patterns.</p>
                    <p>Each question is carefully designed based on validated psychological constructs and neurobiological markers that have been studied extensively in academic literature.</p>

                    <h5 class="mt-5 mb-4">Key Research Areas:</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Cognitive processing and decision-making patterns</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Emotional regulation and stress response systems</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Neuroplasticity and resilience mechanisms</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Trauma processing and recovery pathways</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-3 col-6 text-center mb-4">
                    <i class="bi bi-person-check feature-icon" style="font-size: 2.5rem;"></i>
                    <h5 class="mt-2">PhD Researchers</h5>
                    <p class="small">Developed by researchers and psychology experts</p>
                </div>
                <div class="col-md-3 col-6 text-center mb-4">
                    <i class="bi bi-journal-check feature-icon" style="font-size: 2.5rem;"></i>
                    <h5 class="mt-2">Research-Based</h5>
                    <p class="small">Based on peer-reviewed scientific studies</p>
                </div>
                <div class="col-md-3 col-6 text-center mb-4">
                    <i class="bi bi-clipboard-data feature-icon" style="font-size: 2.5rem;"></i>
                    <h5 class="mt-2">Validation Methods</h5>
                    <p class="small">Using established psychological assessment frameworks</p>
                </div>
                <div class="col-md-3 col-6 text-center mb-4">
                    <i class="bi bi-people feature-icon" style="font-size: 2.5rem;"></i>
                    <h5 class="mt-2">10,000+ Users</h5>
                    <p class="small">Trusted by thousands worldwide</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">What Our Users Say</h2>
            <p class="text-center lead mb-5">Join thousands of satisfied users who have gained valuable insights into their personality and cognitive patterns.</p>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="https://via.placeholder.com/80" class="rounded-circle" alt="Sarah Mitchell">
                            </div>
                            <h5 class="card-title text-center">Sarah Mitchell</h5>
                            <p class="text-muted text-center">Marketing Manager</p>
                            <p class="card-text">"This test gave me incredible insights into my stress triggers and how to manage them. The recommendations were practical and easy to implement."</p>
                            <div class="text-center text-primary">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="https://via.placeholder.com/80" class="rounded-circle" alt="James Wilson">
                            </div>
                            <h5 class="card-title text-center">James Wilson</h5>
                            <p class="text-muted text-center">Software Engineer</p>
                            <p class="card-text">"The cognitive analysis was spot-on. I've been able to optimize my work habits based on my thinking patterns and have seen a significant boost in productivity."</p>
                            <div class="text-center text-primary">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="https://via.placeholder.com/80" class="rounded-circle" alt="Maria Rodriguez">
                            </div>
                            <h5 class="card-title text-center">Maria Rodriguez</h5>
                            <p class="text-muted text-center">Teacher</p>
                            <p class="card-text">"Understanding my emotional patterns has transformed my relationships. The trauma and resilience insights were particularly healing and eye-opening."</p>
                            <div class="text-center text-primary">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="section-padding bg-light-custom">
        <div class="container">
            <h2 class="text-center section-title">Simple, Transparent Pricing</h2>
            <p class="text-center lead mb-5">Choose the plan that works best for your journey of self-discovery.</p>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body text-center p-5">
                            <h5 class="card-title">Basic Report</h5>
                            <div class="price-tag mt-4">
                                <span class="price-currency">$</span>
                                <span class="price-number">19</span>
                                <span class="price-decimal">.99</span>
                                <span class="price-period">/ one-time</span>
                            </div>
                            <ul class="list-unstyled mt-4 mb-5">
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Personality Overview</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Cognitive Pattern Analysis</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Basic Emotional Insights</li>
                                <li class="mb-3"><i class="bi bi-x-circle text-muted me-2"></i>Detailed Trauma Analysis</li>
                                <li class="mb-3"><i class="bi bi-x-circle text-muted me-2"></i>Personalized Action Plan</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card pricing-card h-100 featured">
                        <div class="card-body text-center p-5">
                            <span class="badge bg-primary position-absolute top-0 start-50 translate-middle px-3 py-2">Most Popular</span>
                            <h5 class="card-title">Complete Analysis</h5>
                            <div class="price-tag mt-4">
                                <span class="price-currency">$</span>
                                <span class="price-number">39</span>
                                <span class="price-decimal">.99</span>
                                <span class="price-period">/ one-time</span>
                            </div>
                            <ul class="list-unstyled mt-4 mb-5">
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Comprehensive Personality Profile</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Detailed Cognitive Analysis</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Emotional & Stress Mapping</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Trauma & Resilience Insights</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Personalized Action Plan</li>
                            </ul>
                            <a href="#" class="btn btn-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body text-center p-5">
                            <h5 class="card-title">Professional Package</h5>
                            <div class="price-tag mt-4">
                                <span class="price-currency">$</span>
                                <span class="price-number">79</span>
                                <span class="price-decimal">.99</span>
                                <span class="price-period">/ one-time</span>
                            </div>
                            <ul class="list-unstyled mt-4 mb-5">
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Everything in Complete Analysis</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>1-Hour Consultation</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Progress Tracking Tools</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>3-Month Follow-up Assessment</li>
                                <li class="mb-3"><i class="bi bi-check-circle text-success me-2"></i>Premium Support</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="section-padding">
        <div class="container">
            <h2 class="text-center section-title">Frequently Asked Questions</h2>
            <p class="text-center lead mb-5">Find answers to common questions about our neuroscience-based personality assessment.</p>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How long does the assessment take?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The assessment typically takes about 15-20 minutes to complete. We've designed it to be comprehensive yet efficient, ensuring you get detailed insights without a significant time investment.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Is my data secure and private?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely. We take data privacy very seriously. All your responses are encrypted, and we never share your personal information with third parties. You can read more in our <a href="#">Privacy Policy</a>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How is this different from other personality tests?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our assessment is based on neuroscience research rather than just behavioral observations. We analyze cognitive patterns, emotional responses, and neural pathways to provide a more comprehensive understanding of your mental processes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Can I use these insights for professional development?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Definitely. Many professionals use our assessment to better understand their work style, communication preferences, stress management techniques, and leadership potential. The insights are valuable for career growth and team dynamics.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How soon will I receive my report?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Your personalized report is generated immediately after completing the assessment. You'll receive a comprehensive PDF document that you can download, print, or share as needed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="mb-4">Ready to Discover Your Neuro-Emotional Profile?</h2>
                    <p class="lead mb-4">Join thousands who have gained valuable insights into their cognitive and emotional patterns.</p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        @auth
                            @if($quiz = App\Models\Quiz::active()->first())
                                <a href="{{ route('quiz.start', $quiz) }}" class="btn btn-primary">Start the Test</a>
                            @else
                                <span class="btn btn-secondary">No quizzes available</span>
                            @endif
                        @else
                            <a href="{{ route('register') }}" class="btn btn-primary">Start the Test</a>
                        @endauth

                        <a href="#sample" class="btn btn-outline-light btn-lg">View Sample Report</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
