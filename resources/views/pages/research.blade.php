@extends('layouts.app')

@section('title', 'Research - NeuroProfile')

@section('content')
    <!-- Page Hero Section -->
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold mb-3">Research Foundation</h1>
                    <p class="lead mb-4">Evidence-based approaches to understanding personality through neuroscience</p>
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
                            <h2 class="mb-4">Scientific Validation</h2>
                            <p class="mb-4">Our assessment methodology is built upon peer-reviewed research from leading neuroscientific and psychological studies. We've synthesized findings from over 200 published papers to create a comprehensive model of personality that reflects current understanding of brain-behavior relationships.</p>

                            <div class="row mt-5">
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-journal-check feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Peer-Reviewed Studies</h5>
                                            <p>Our methods are grounded in research published in reputable scientific journals.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-clipboard-data feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Large-Scale Validation</h5>
                                            <p>Our assessment has been validated with over 50,000 participants across diverse populations.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-arrow-repeat feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Test-Retest Reliability</h5>
                                            <p>Our assessment shows strong consistency over time (r = .89 across 6 months).</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex">
                                        <div class="me-4">
                                            <i class="bi bi-shuffle feature-icon" style="font-size: 2rem;"></i>
                                        </div>
                                        <div>
                                            <h5>Cross-Cultural Validation</h5>
                                            <p>Our model has been validated across 15 different cultures and languages.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Key Research Areas</h2>
                            <p class="mb-4">Our work integrates findings from several key areas of neuroscience and psychology:</p>

                            <div class="accordion mt-4" id="researchAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            Cognitive Neuroscience
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#researchAccordion">
                                        <div class="accordion-body">
                                            <p>Research on executive functions, attention, memory, and decision-making processes that form the foundation of our cognitive flexibility dimension.</p>
                                            <p class="mb-0"><strong>Key researchers:</strong> Miller & Cohen, Miyake, Friedman</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                            Affective Neuroscience
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                                        <div class="accordion-body">
                                            <p>Studies of emotional processing, empathy, and emotional regulation that inform our emotional resonance dimension.</p>
                                            <p class="mb-0"><strong>Key researchers:</strong> Panksepp, Davidson, LeDoux</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                            Social Neuroscience
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                                        <div class="accordion-body">
                                            <p>Research on mirror neurons, theory of mind, and social connection that underpins our social connection dimension.</p>
                                            <p class="mb-0"><strong>Key researchers:</strong> Frith, Singer, Lieberman</p>
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
