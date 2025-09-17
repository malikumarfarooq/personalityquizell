@extends('layouts.app')

@section('title', 'Contact Us - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                    <p class="lead mb-4">We'd love to hear from you. Get in touch with our team.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm mb-5">
                                <div class="card-body p-5">
                                    <h3 class="mb-4">Send us a message</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <select class="form-select" id="subject">
                                                <option selected>General Inquiry</option>
                                                <option>Technical Support</option>
                                                <option>Billing Question</option>
                                                <option>Research Collaboration</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" id="message" rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <h5>Address</h5>
                                    <p>123 Neuroscience Way<br>San Francisco, CA 94107<br>United States</p>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <h5>Phone</h5>
                                    <p>+1 (555) 123-4567<br>Mon-Fri, 9am-5pm PST</p>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <h5>Email</h5>
                                    <p>support@neuroprofile.com<br>info@neuroprofile.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="text-center mb-5">Frequently Asked Questions</h3>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
                                            How long does it take to get a response?
                                        </button>
                                    </h2>
                                    <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            We typically respond to all inquiries within 24-48 hours during business days. For urgent matters, please call our support line.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">
                                            Do you offer enterprise solutions?
                                        </button>
                                    </h2>
                                    <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Yes, we offer customized enterprise solutions for organizations. Please contact our business team at enterprise@neuroprofile.com for more information.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree">
                                            Can I schedule a demo?
                                        </button>
                                    </h2>
                                    <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Absolutely! We'd be happy to schedule a personalized demo. Please use the contact form above and select "Demo Request" as your subject.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
