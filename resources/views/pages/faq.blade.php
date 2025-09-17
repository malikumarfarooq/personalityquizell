@extends('layouts.app')

@section('title', 'FAQ - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Frequently Asked Questions</h1>
                    <p class="lead mb-4">Find answers to common questions about NeuroProfile</p>
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
                            <h3 class="mb-4">What would you like to know?</h3>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search questions...">
                                        <button class="btn btn-primary" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Categories -->
                    <div class="d-flex justify-content-center mb-5 flex-wrap">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary active">General</button>
                            <button type="button" class="btn btn-outline-primary">Assessment</button>
                            <button type="button" class="btn btn-outline-primary">Results</button>
                            <button type="button" class="btn btn-outline-primary">Account</button>
                            <button type="button" class="btn btn-outline-primary">Privacy</button>
                        </div>
                    </div>

                    <!-- FAQ Accordion -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="mb-4">General Questions</h3>

                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            What is NeuroProfile?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            NeuroProfile is a neuroscience-based personality assessment that helps you understand your unique cognitive and emotional patterns. Unlike traditional personality tests, our assessment is grounded in contemporary neuroscience research, providing insights into the biological foundations of your personality traits and behavioral tendencies.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            How long does the assessment take?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            The complete NeuroProfile assessment typically takes between 20-30 minutes to complete. The exact time may vary depending on your pace, but we recommend setting aside about 30 minutes of uninterrupted time for the most accurate results.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Is my data secure and private?
                                        </button>
                                    </h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Yes, we take data security and privacy very seriously. All your assessment responses and results are encrypted and stored securely. We never share your personal data with third parties without your explicit consent. For more details, please see our <a href="{{ route('privacy') }}">Privacy Policy</a>.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                            How is NeuroProfile different from other personality tests?
                                        </button>
                                    </h2>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            NeuroProfile is unique in its neuroscience-based approach. While many personality tests are based solely on self-report questionnaires, our assessment incorporates principles from cognitive neuroscience, affective neuroscience, and social neuroscience. This provides a more comprehensive understanding of the biological underpinnings of personality, rather than just behavioral observations.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                            Can I use NeuroProfile for professional or clinical purposes?
                                        </button>
                                    </h2>
                                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            NeuroProfile is designed for personal development and self-understanding. While our assessment is grounded in scientific research, it is not intended for clinical diagnosis or as a substitute for professional psychological evaluation. Many professionals find our insights valuable for coaching, team building, and personal development, but it should not be used for clinical purposes.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                            How often should I retake the assessment?
                                        </button>
                                    </h2>
                                    <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            While personality traits tend to be relatively stable over time, we recommend retaking the assessment every 6-12 months if you're interested in tracking changes. Some people find it valuable to retake after significant life events, periods of personal growth, or when implementing specific changes based on their previous results.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                            Is there a mobile app available?
                                        </button>
                                    </h2>
                                    <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Yes, NeuroProfile is available as a mobile app for both iOS and Android devices. You can download it from the App Store or Google Play Store. The mobile app allows you to take the assessment, view your results, and access additional resources on the go.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Still Have Questions -->
                    <div class="card border-0 shadow-sm mt-5">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-3">Still have questions?</h3>
                            <p class="mb-4">Can't find the answer you're looking for? Please contact our support team.</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
