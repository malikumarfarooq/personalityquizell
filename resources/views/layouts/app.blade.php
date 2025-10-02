    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'NeuroProfile - Discover Your Neuro-Emotional Profile')</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <style>
            :root {
                --primary: #4A6CF7;
                --primary-dark: #3A5AE0;
                --secondary: #6F42C1;
                --accent: #20C997;
                --light-bg: #F8F9FA;
                --light-bg-2: #F0F4F8;
                --dark-text: #212529;
                --gray-text: #6C757D;
                --border-color: #E9ECEF;
            }

            body {
                font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: var(--dark-text);
                background-color: #ffffff;
                line-height: 1.6;
            }

            .hero-section {
                background: linear-gradient(135deg, rgba(245, 247, 255, 0.9) 0%, rgba(232, 238, 255, 0.9) 100%);
                padding: 100px 0;
                position: relative;
                overflow: hidden;
            }

            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 极zm48 25c3.866 0 7-3.134 7-极s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 极.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 极 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-极-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%234a6cf7' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
                opacity: 0.5;
            }

            .section-padding {
                padding: 80px 0;
            }

            .bg-light-custom {
                background-color: var(--light-bg);
            }

            .bg-light-custom-2 {
                background-color: var(--light-bg-2);
            }

            .btn-primary {
                background-color: var(--primary);
                border-color: var(--primary);
                padding: 12px 30px;
                font-weight: 600;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                background-color: var(--primary-dark);
                border-color: var(--primary-dark);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(74, 108, 247, 0.25);
            }

            .btn-outline-primary {
                border-color: var(--primary);
                color: var(--primary);
                padding: 12px 30px;
                font-weight: 600;
                border-radius: 8px;
                transition: all 0.3s ease;
            }

            极 .btn-outline-primary:hover {
                background-color: var(--primary);
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(74, 108, 247, 0.25);
            }

            .feature-icon {
                font-size: 2.5rem;
                color: var(--primary);
                margin-bottom: 1rem;
            }

            .testimonial-card {
                border-radius: 12px;
                box-shadow: 0 5极 20px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                border: none;
                overflow: hidden;
            }

            .testimonial-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            }

            .pricing-card {
                border: 1px solid var(--border-color);
                border-radius: 12px;
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .pricing-card:hover {
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                transform: translateY(-5px);
            }

            .pricing-card.featured {
                border: 2px solid var(--primary);
                position: relative;
            }

            .navbar {
                padding: 15px 0;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(10px);
            }

            .navbar-brand {
                font-weight: 700;
                color: var(--primary) !important;
                font-size: 1.5rem;
            }

            .nav-link {
                font-weight: 500;
                color: var(--dark-text) !important;
                transition: color 0.3s ease;
                position: relative;
            }

            .nav-link:hover {
                color: var(--primary) !important;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 2px;
                background-color: var(--primary);
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--primary);
            }

            .section-title {
                position: relative;
                margin-bottom: 50px;
                font-weight: 700;
                color: var(--dark-text);
            }

            .section-title:after {
                content: '';
                display: block;
                width: 50px;
                height: 3px;
                background: var(--primary);
                margin: 15px auto 0;
            }

            .card {
                border-radius: 12px;
                border: none;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            }

            .progress {
                height: 8px;
                border-radius: 4px;
            }

            .progress-bar {
                background-color: var(--primary);
            }

            .list-group-item {
                cursor: pointer;
                border: none;
                padding: 0.75rem 0;
            }

            footer {
                background: linear-gradient(to right, #2c3e50, #4a6cf7);
                color: white;
                padding: 60px 0 30px;
            }

            footer h5 {
                font-weight: 600;
                margin-bottom: 1.5rem;
                position: relative;
                padding-bottom: 10px;
            }

            footer h5::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 30px;
                height: 2px;
                background-color: var(--accent);
            }

            footer a {
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
                transition: all 0.3s ease;
            }

            footer a:hover {
                color: white;
                padding-left: 5px;
            }

            .social-links a {
                display: inline-block;
                width: 36px;
                height: 36px;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                text-align: center;
                line-height: 36px;
                margin-right: 10px;
                transition: all 0.3s ease;
            }

            .social极-links a:hover {
                background: var(--primary);
                transform: translateY(-3px);
            }

            .footer-bottom {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 20px;
                margin-top: 40px;
            }

            .accordion-button:not(.collapsed) {
                background-color: rgba(74, 108, 247, 0.1);
                color: var(--primary);
                font-weight: 600;
            }

            .accordion-button:focus {
                box-shadow: none;
                border-color: var(--border-color);
            }

            @media (max-width: 768px) {
                .hero-section {
                    padding: 60px 0;
                }

                .section-padding {
                    padding: 60px 0;
                }

                .display-4 {
                    font-size: 2.5rem;
                }
            }

            /* Page specific styles */
            .page-hero {
                background: linear-gradient(135deg, rgba(245, 247, 255, 0.9) 0%, rgba(232, 238, 255, 0.9) 100%);
                padding: 120px 0 60px;
                margin-top: 76px;
            }

            .content-section {
                padding: 60px 0;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-brain me-2"></i>NeuroProfile
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Center Navigation Links -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('science') ? 'active' : '' }}" href="{{ route('science') }}">Our Science</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('research') ? 'active' : '' }}" href="{{ route('research') }}">Research</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary ms-2" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h4 class="text-white mb-4"><极 class="bi bi-brain me-2"></i>NeuroProfile</h4>
                        <p>Discover your unique cognitive and emotional patterns through our neuroscience-based personality assessment. Gain insights that matter.</p>
                        <p class="mt-3">
                            <a href="mailto:neurosciencefacile@gmail.com" class="d-inline-flex align-items-center">
                                <i class="bi bi-envelope me-2"></i>neurosciencefacile@gmail.com
                            </a>
                        </p>
                        <div class="social-links mt-4">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                        <h5>Company</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('about') }}">About</a></li>
                            <li class="mb-2"><a href="{{ route('science') }}">Our Science</a></li>
                            <li class="mb-2"><a href="{{ route('research') }}">Research</a></li>
                            <li class="mb-2"><a href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                        <h5>Support</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('help') }}">Help Center</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li class="mb-2"><a href="{{ route('faq') }}">FAQ</a></li>
                            <li class="mb-2"><a href="{{ route('support') }}">Technical Support</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h5>Legal</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                            <li class="mb-2"><a href="{{ route('terms') }}">Terms of Service</a></li>
                            <li class="mb-2"><a href="{{ route('cookies') }}">Cookie Policy</a></li>
                            <li class="mb-2"><a href="{{ route('data-protection') }}">Data Protection</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h5>Connect</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#"><i class="bi bi-download me-2"></i>Download App</a></li>
                            <li class="mb-2"><a href="#"><i class="bi bi-chat me-2"></i>Live Chat</a></li>
                            <li class="mb-2"><a href="#"><i class="bi bi-telephone me-2"></i>+1 (555) 123-4567</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom text-center">
                    <p class="mb-0">© {{ date('Y') }} NeuroProfile. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll animation for elements
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.feature-icon, .card, .testimonial-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            animatedElements.forEach(el => {
                el.style.opacity = 0;
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(el);
            });
        });
    </script>
    </body>
    </html>
