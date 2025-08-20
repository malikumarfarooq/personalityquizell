@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Payment Management</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-download fa-sm"></i> Export Report
                    </button>
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt fa-sm"></i> Refresh
                </button>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card total-revenue h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Revenue</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($totalRevenue, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign stats-icon text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card successful-payments h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Successful Payments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $successfulPayments }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle stats-icon text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card pending-payments h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Payments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingPayments }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock stats-icon text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stats-card failed-payments h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Failed Payments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $failedPayments }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle stats-icon text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold">Payment Transactions</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Quiz</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Payment ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td><span class="fw-bold">#PMT-{{ $payment->id }}</span></td>
                                        <td>{{ $payment->user->name ?? 'Unknown' }}</td>
                                        <td>{{ $payment->title }}</td>
                                        <td>{{ $payment->paid_at ? $payment->paid_at->format('M d, Y') : 'N/A' }}</td>
                                        <td>${{ number_format($payment->payment_amount, 2) }}</td>
                                        <td>
                                            @if($payment->is_paid)
                                                <span class="payment-status-badge status-completed">Completed</span>
                                            @else
                                                <span class="payment-status-badge status-pending">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>{{ $payment->payment_id }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} entries</div>
                            <nav>
                                {{ $payments->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Payment Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="settings-section">
                            <h5><i class="fab fa-stripe text-primary me-2"></i> Stripe Configuration</h5>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Publishable Key</label>
                                <input type="text" class="form-control mb-2" value="{{ config('services.stripe.key') }}" readonly>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Secret Key</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" value="{{ config('services.stripe.secret') }}" readonly>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Webhook Secret</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" value="{{ config('services.stripe.webhook.secret') }}" readonly>
                                </div>
                                <small class="text-muted">Used to verify webhook requests from Stripe</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="testMode" {{ config('services.stripe.env') == 'testing' ? 'checked' : '' }} disabled>
                                    <label class="form-check-label" for="testMode">Test Mode</label>
                                </div>
                                <span class="badge bg-{{ config('services.stripe.env') == 'testing' ? 'warning' : 'success' }}">
                                    {{ config('services.stripe.env') == 'testing' ? 'TEST' : 'LIVE' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Revenue Overview (Last 6 Months)</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .stats-card {
            border-left: 4px solid;
        }

        .stats-card.total-revenue {
            border-color: #4e73df;
        }

        .stats-card.successful-payments {
            border-color: #1cc88a;
        }

        .stats-card.pending-payments {
            border-color: #f6c23e;
        }

        .stats-card.failed-payments {
            border-color: #e74a3b;
        }

        .stats-icon {
            font-size: 2rem;
            opacity: 0.3;
        }

        .payment-status-badge {
            padding: 0.5em 0.8em;
            border-radius: 5px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-completed {
            background-color: rgba(28, 200, 138, 0.2);
            color: #1cc88a;
        }

        .status-pending {
            background-color: rgba(246, 194, 62, 0.2);
            color: #f6c23e;
        }

        .status-failed {
            background-color: rgba(231, 74, 59, 0.2);
            color: #e74a3b;
        }

        .settings-section {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        .settings-section h5 {
            color: #5a5c69;
            margin-bottom: 1.2rem;
            padding-bottom: 0.7rem;
            border-bottom: 1px solid #e3e6f0;
        }

        .chart-container {
            position: relative;
            height: 250px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue chart
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($revenueChart['labels']),
                    datasets: [{
                        label: 'Revenue',
                        data: @json($revenueChart['data']),
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endpush
