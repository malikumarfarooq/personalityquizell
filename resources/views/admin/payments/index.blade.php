@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Payment Gateways</h1>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Configure payment processors for paid quiz analysis</h4>

                <div class="mb-5">
                    <h5 class="mb-3">Scope</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>• Stripe</strong></li>
                        <li class="mb-2"><strong>• PayPal</strong></li>
                        <li class="mb-2"><strong>• Local Gateway</strong></li>
                    </ul>
                </div>

                <hr class="my-5">

                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-3">Stripe Configuration</h5>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" id="enableStripe" checked>
                            <label class="form-check-label fw-bold" for="enableStripe">Enable Stripe</label>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Publishable Key</label>
                            <input type="text" class="form-control mb-2" value="pk_test_" placeholder="Enter publishable key">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Secret Key</label>
                            <input type="password" class="form-control" value="sk_test_" placeholder="Enter secret key">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Webhook Secret</label>
                            <input type="password" class="form-control" value="whsec_" placeholder="Enter webhook secret">
                            <small class="text-muted">Used to verify webhook requests from Stripe</small>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="saveSettings">
                                <label class="form-check-label" for="saveSettings">Done! How does this look?</label>
                            </div>
                            <button class="btn btn-primary px-4">Save Stripe Settings</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-check-input {
            width: 2.5em;
            height: 1.5em;
        }
        .form-switch .form-check-input {
            width: 2.5em;
            margin-left: -2.5em;
        }
        .list-unstyled strong {
            font-weight: 600;
        }
    </style>
@endpush
