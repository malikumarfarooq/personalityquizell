@extends('layouts.app')

@section('title', 'Cookie Policy - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Cookie Policy</h1>
                    <p class="lead mb-4">How we use cookies and similar technologies</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <div class="text-center mb-5">
                                <p class="text-muted">Last updated: June 15, 2023</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">1. What Are Cookies</h3>
                                <p>Cookies are small text files that are placed on your computer or mobile device when you visit websites. They are widely used to make websites work more efficiently and provide information to the website owners.</p>
                                <p>Cookies may be either "persistent" cookies or "session" cookies. Persistent cookies remain on your device after you close your browser until you delete them or they expire. Session cookies are deleted automatically when you close your browser.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">2. How We Use Cookies</h3>
                                <p>NeuroProfile uses cookies for several purposes:</p>

                                <h5 class="mt-4">Essential Cookies</h5>
                                <p>These cookies are necessary for the website to function properly. They enable core functionality such as security, network management, and accessibility. You may disable these by changing your browser settings, but this may affect how the website functions.</p>

                                <h5 class="mt-4">Analytics Cookies</h5>
                                <p>These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This helps us improve our website and services.</p>

                                <h5 class="mt-4">Preference Cookies</h5>
                                <p>These cookies enable the website to remember choices you make (such as your username, language, or region) and provide enhanced, more personal features.</p>

                                <h5 class="mt-4">Marketing Cookies</h5>
                                <p>These cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">3. Types of Cookies We Use</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Cookie Name</th>
                                            <th>Purpose</th>
                                            <th>Duration</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>session_id</td>
                                            <td>Maintains your session state across page requests</td>
                                            <td>Session</td>
                                        </tr>
                                        <tr>
                                            <td>user_preferences</td>
                                            <td>Stores your site preferences and settings</td>
                                            <td>1 year</td>
                                        </tr>
                                        <tr>
                                            <td>_ga</td>
                                            <td>Google Analytics - used to distinguish users</td>
                                            <td>2 years</td>
                                        </tr>
                                        <tr>
                                            <td>_gid</td>
                                            <td>Google Analytics - used to distinguish users</td>
                                            <td>24 hours</td>
                                        </tr>
                                        <tr>
                                            <td>_gat</td>
                                            <td>Google Analytics - used to throttle request rate</td>
                                            <td>1 minute</td>
                                        </tr>
                                        <tr>
                                            <td>cookie_consent</td>
                                            <td>Stores your cookie consent preferences</td>
                                            <td>1 year</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">4. Third-Party Cookies</h3>
                                <p>In addition to our own cookies, we may also use various third-party cookies to report usage statistics of the Service, deliver advertisements on and through the Service, and so on.</p>
                                <p>These third-party services may include:</p>
                                <ul>
                                    <li>Google Analytics for website analytics</li>
                                    <li>Facebook Pixel for advertising effectiveness measurement</li>
                                    <li>Stripe for payment processing</li>
                                    <li>Intercom for customer support and messaging</li>
                                </ul>
                                <p>These third-party services may place their own cookies on your device. We do not control the use of these third-party cookies and recommend you review their respective privacy policies.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">5. Managing Cookies</h3>
                                <p>You can control and/or delete cookies as you wish. You can delete all cookies that are already on your computer and you can set most browsers to prevent them from being placed.</p>
                                <p>However, if you do this, you may have to manually adjust some preferences every time you visit a site and some services and functionalities may not work.</p>

                                <h5 class="mt-4">Browser Controls</h5>
                                <p>Most web browsers allow you to control cookies through their settings preferences. Here's how you can manage cookies in popular browsers:</p>
                                <ul>
                                    <li><a href="https://support.google.com/chrome/answer/95647">Google Chrome</a></li>
                                    <li><a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences">Mozilla Firefox</a></li>
                                    <li><a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac">Safari</a></li>
                                    <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09">Microsoft Edge</a></li>
                                </ul>

                                <h5 class="mt-4">Opt-Out Tools</h5>
                                <p>You can also opt out of certain third-party cookies:</p>
                                <ul>
                                    <li><a href="https://tools.google.com/dlpage/gaoptout">Google Analytics Opt-out</a></li>
                                    <li><a href="https://www.facebook.com/help/568137493302217">Facebook Ad Preferences</a></li>
                                    <li><a href="https://www.aboutads.info/choices/">Digital Advertising Alliance Opt-out</a></li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">6. Changes to This Policy</h3>
                                <p>We may update our Cookie Policy from time to time. We will notify you of any changes by posting the new Cookie Policy on this page and updating the "Last updated" date.</p>
                                <p>You are advised to review this Cookie Policy periodically for any changes. Changes to this Cookie Policy are effective when they are posted on this page.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">7. Contact Us</h3>
                                <p>If you have any questions about our use of cookies, please contact us at:</p>
                                <ul>
                                    <li>Email: privacy@neuroprofile.com</li>
                                    <li>Address: NeuroProfile, 123 Neuroscience Way, San Francisco, CA 94107, United States</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
