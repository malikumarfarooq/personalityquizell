@extends('layouts.app')

@section('title', 'Technical Support - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Technical Support</h1>
                    <p class="lead mb-4">Get help with technical issues and platform troubleshooting</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Support Options -->
                    <div class="row mb-5">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-chat-dots"></i>
                                    </div>
                                    <h5>Live Chat</h5>
                                    <p>Chat with our support team in real-time for immediate assistance.</p>
                                    <a href="#" class="btn btn-outline-primary">Start Chat</a>
                                    <p class="small mt-2 mb-0">Available Mon-Fri, 9am-6pm PST</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <div class="feature-icon mb-3">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <h5>Email Support</h5>
                                    <p>Send us a detailed message and we'll respond within 24 hours.</p>
                                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">Send Email</a>
                                    <p class="small mt-2 mb-0">Typically respond within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Common Technical Issues -->
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5">
                            <h3 class="mb-4">Common Technical Issues</h3>

                            <div class="accordion" id="techIssuesAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#issue1">
                                            Assessment won't load or progress
                                        </button>
                                    </h2>
                                    <div id="issue1" class="accordion-collapse collapse show" data-bs-parent="#techIssuesAccordion">
                                        <div class="accordion-body">
                                            <p><strong>Possible solutions:</strong></p>
                                            <ol>
                                                <li>Refresh your browser and try again</li>
                                                <li>Clear your browser cache and cookies</li>
                                                <li>Try using a different web browser (Chrome, Firefox, or Safari recommended)</li>
                                                <li>Check your internet connection stability</li>
                                                <li>Disable browser extensions that might interfere</li>
                                            </ol>
                                            <p class="mb-0">If these steps don't resolve the issue, please contact our support team with details about your browser and device.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#issue2">
                                            Can't access my results or report
                                        </button>
                                    </h2>
                                    <div id="issue2" class="accordion-collapse collapse" data-bs-parent="#techIssuesAccordion">
                                        <div class="accordion-body">
                                            <p><strong>Possible solutions:</strong></p>
                                            <ol>
                                                <li>Ensure you're logged into the correct account</li>
                                                <li>Check if the assessment was completed (you should have received a completion email)</li>
                                                <li>Try accessing from a different device or browser</li>
                                                <li>Allow up to 5 minutes for report generation after assessment completion</li>
                                            </ol>
                                            <p class="mb-0">If you completed the assessment but still can't access your results, please contact support with your account email and approximate completion time.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#issue3">
                                            Mobile app crashing or not working properly
                                        </button>
                                    </h2>
                                    <div id="issue3" class="accordion-collapse collapse" data-bs-parent="#techIssuesAccordion">
                                        <div class="accordion-body">
                                            <p><strong>Possible solutions:</strong></p>
                                            <ol>
                                                <li>Update the app to the latest version from the App Store or Google Play</li>
                                                <li>Restart your mobile device</li>
                                                <li>Uninstall and reinstall the app (your data is stored on our servers)</li>
                                                <li>Check if your device meets the minimum requirements:
                                                    <ul>
                                                        <li>iOS: Version 13.0 or later</li>
                                                        <li>Android: Version 8.0 or later</li>
                                                    </ul>
                                                </li>
                                            </ol>
                                            <p class="mb-0">If problems persist, please report the issue with details about your device model and operating system version.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#issue4">
                                            Payment or subscription issues
                                        </button>
                                    </h2>
                                    <div id="issue4" class="accordion-collapse collapse" data-bs-parent="#techIssuesAccordion">
                                        <div class="accordion-body">
                                            <p><strong>Possible solutions:</strong></p>
                                            <ol>
                                                <li>Check your payment method expiration date and security code</li>
                                                <li>Verify with your bank that the transaction wasn't blocked</li>
                                                <li>Check if the payment appears in your account's billing history</li>
                                                <li>Try using a different payment method</li>
                                            </ol>
                                            <p class="mb-0">For billing inquiries, please contact our support team with your account email and any relevant transaction details.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Requirements -->
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-5">
                            <h3 class="mb-4">System Requirements</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Web Browser</h5>
                                    <ul>
                                        <li>Google Chrome (version 70 or newer)</li>
                                        <li>Mozilla Firefox (version 65 or newer)</li>
                                        <li>Safari (version 12 or newer)</li>
                                        <li>Microsoft Edge (version 79 or newer)</li>
                                    </ul>
                                    <p class="small">JavaScript and cookies must be enabled</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Mobile App</h5>
                                    <ul>
                                        <li>iOS: Requires iOS 13.0 or later</li>
                                        <li>Android: Requires Android 8.0 or later</li>
                                    </ul>
                                    <h5 class="mt-4">Internet Connection</h5>
                                    <ul>
                                        <li>Minimum 5 Mbps download speed</li>
                                        <li>Stable connection recommended for assessment</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Support -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-3">Need further assistance?</h3>
                            <p class="mb-4">Our technical support team is ready to help you resolve any issues.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <a href="#" class="btn btn-primary">Start Live Chat</a>
                                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Email Support</a>
                                <a href="tel:+15551234567" class="btn btn-outline-primary">Call Support</a>
                            </div>
                            <p class="mt-3 mb-0">Phone support: +1 (555) 123-4567 (Mon-Fri, 9am-6pm PST)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
