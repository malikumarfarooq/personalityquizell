@extends('layouts.app')

@section('title', 'Data Protection - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Data Protection</h1>
                    <p class="lead mb-4">How we protect your personal data and ensure compliance with regulations</p>
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
                                <h3 class="mb-3">1. Our Commitment to Data Protection</h3>
                                <p>At NeuroProfile, we are committed to protecting your personal data and respecting your privacy. We comply with applicable data protection laws, including the General Data Protection Regulation (GDPR) for our users in the European Union, the California Consumer Privacy Act (CCPA) for our users in California, and other relevant data protection regulations.</p>
                                <p>This Data Protection Policy explains how we collect, use, store, and protect your personal information when you use our services.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">2. Data Protection Principles</h3>
                                <p>We adhere to the following data protection principles:</p>

                                <h5 class="mt-4">Lawfulness, Fairness, and Transparency</h5>
                                <p>We process your data lawfully, fairly, and in a transparent manner. We clearly communicate how we use your data and obtain appropriate consent when required.</p>

                                <h5 class="mt-4">Purpose Limitation</h5>
                                <p>We collect data for specified, explicit, and legitimate purposes and do not process it in a manner that is incompatible with those purposes.</p>

                                <h5 class="mt-4">Data Minimization</h5>
                                <p>We only collect data that is adequate, relevant, and limited to what is necessary for the purposes for which it is processed.</p>

                                <h5 class="mt-4">Accuracy</h5>
                                <p>We take reasonable steps to ensure that personal data is accurate and kept up to date.</p>

                                <h5 class="mt-4">Storage Limitation</h5>
                                <p>We keep personal data in a form that permits identification of data subjects for no longer than necessary.</p>

                                <h5 class="mt-4">Integrity and Confidentiality</h5>
                                <p>We process personal data in a manner that ensures appropriate security, including protection against unauthorized or unlawful processing and against accidental loss, destruction, or damage.</p>

                                <h5 class="mt-4">Accountability</h5>
                                <p>We are responsible for demonstrating compliance with these principles.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">3. Your Data Protection Rights</h3>
                                <p>Depending on your location, you may have the following rights regarding your personal data:</p>

                                <h5 class="mt-4">Right to Access</h5>
                                <p>You have the right to request copies of your personal data that we hold.</p>

                                <h5 class="mt-4">Right to Rectification</h5>
                                <p>You have the right to request that we correct any information you believe is inaccurate or complete information you believe is incomplete.</p>

                                <h5 class="mt-4">Right to Erasure</h5>
                                <p>You have the right to request that we erase your personal data, under certain conditions.</p>

                                <h5 class="mt-4">Right to Restrict Processing</h5>
                                <p>You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>

                                <h5 class="mt-4">Right to Object to Processing</h5>
                                <p>You have the right to object to our processing of your personal data, under certain conditions.</p>

                                <h5 class="mt-4">Right to Data Portability</h5>
                                <p>You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>

                                <h5 class="mt-4">Right to Withdraw Consent</h5>
                                <p>Where we rely on your consent to process your personal data, you have the right to withdraw that consent at any time.</p>

                                <p>To exercise any of these rights, please contact us at privacy@neuroprofile.com.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">4. International Data Transfers</h3>
                                <p>NeuroProfile is based in the United States, but we may transfer and process data outside of your country of residence. When we transfer your personal data outside the European Economic Area (EEA) or other regions with comprehensive data protection laws, we ensure appropriate safeguards are in place.</p>
                                <p>These safeguards may include:</p>
                                <ul>
                                    <li>Standard Contractual Clauses approved by the European Commission</li>
                                    <li>Binding Corporate Rules for intra-group transfers</li>
                                    <li>Certification under the EU-US Privacy Shield Framework (where applicable)</li>
                                    <li>Other legally accepted mechanisms for international data transfers</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">5. Data Security Measures</h3>
                                <p>We implement appropriate technical and organizational measures to ensure a level of security appropriate to the risk, including:</p>

                                <h5 class="mt-4">Technical Measures</h5>
                                <ul>
                                    <li>Encryption of data in transit using TLS/SSL protocols</li>
                                    <li>Encryption of data at rest using AES-256 encryption</li>
                                    <li>Regular security testing and vulnerability assessments</li>
                                    <li>Access controls and authentication mechanisms</li>
                                    <li>Network security and intrusion detection systems</li>
                                </ul>

                                <h5 class="mt-4">Organizational Measures</h5>
                                <ul>
                                    <li>Data protection policies and procedures</li>
                                    <li>Employee training on data protection</li>
                                    <li>Confidentiality agreements with staff and contractors</li>
                                    <li>Regular audits of data processing activities</li>
                                    <li>Incident response and data breach notification procedures</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">6. Data Protection Officer</h3>
                                <p>We have appointed a Data Protection Officer (DPO) to oversee compliance with this policy and applicable data protection laws. You can contact our DPO at:</p>
                                <ul>
                                    <li>Email: dpo@neuroprofile.com</li>
                                    <li>Address: Data Protection Officer, NeuroProfile, 123 Neuroscience Way, San Francisco, CA 94107, United States</li>
                                </ul>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">7. Changes to This Policy</h3>
                                <p>We may update our Data Protection Policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>
                                <p>You are advised to review this Data Protection Policy periodically for any changes. Changes to this policy are effective when they are posted on this page.</p>
                            </div>

                            <div class="mb-5">
                                <h3 class="mb-3">8. Contact Us</h3>
                                <p>If you have any questions about this Data Protection Policy, please contact us:</p>
                                <ul>
                                    <li>By email: privacy@neuroprofile.com</li>
                                    <li>By mail: NeuroProfile, 123 Neuroscience Way, San Francisco, CA 94107, United States</li>
                                </ul>
                                <p>You also have the right to lodge a complaint with a supervisory authority if you believe our processing of your personal data infringes applicable data protection laws.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
