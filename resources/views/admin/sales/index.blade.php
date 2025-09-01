{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">--}}
{{--            <h1 class="h2">Sales</h1>--}}
{{--        </div>--}}

{{--        <div class="card shadow-sm mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <h4 class="mb-4">Track payments and revenue from quiz analysis</h4>--}}

{{--                <div class="row mb-5">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="card border-0 bg-light">--}}
{{--                            <div class="card-body">--}}
{{--                                <h6 class="card-title text-muted">Total Revenue</h6>--}}
{{--                                <h4 class="fw-bold">$1,245.75</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="card border-0 bg-light">--}}
{{--                            <div class="card-body">--}}
{{--                                <h6 class="card-title text-muted">Total Transactions</h6>--}}
{{--                                <h4 class="fw-bold">142</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="card border-0 bg-light">--}}
{{--                            <div class="card-body">--}}
{{--                                <h6 class="card-title text-muted">Paid Analyses</h6>--}}
{{--                                <h4 class="fw-bold">98</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="card border-0 bg-light">--}}
{{--                            <div class="card-body">--}}
{{--                                <h6 class="card-title text-muted">Unique Users</h6>--}}
{{--                                <h4 class="fw-bold">87</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <hr class="my-5">--}}

{{--                <div class="mb-4">--}}
{{--                    <h5 class="mb-3">Transaction History</h5>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-hover">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Quiz</th>--}}
{{--                                <th>User</th>--}}
{{--                                <th>Type</th>--}}
{{--                                <th>Amount</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Gateway</th>--}}
{{--                                <th>Date</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>txn_001</td>--}}
{{--                                <td>Personality Assessment</td>--}}
{{--                                <td>John Doe<br><small class="text-muted">john@example.com</small></td>--}}
{{--                                <td><span class="badge bg-success">paid</span></td>--}}
{{--                                <td>$9.99</td>--}}
{{--                                <td><span class="badge bg-success">completed</span></td>--}}
{{--                                <td>Stripe</td>--}}
{{--                                <td>2024-01-15</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>txn_002</td>--}}
{{--                                <td>Career Guidance Quiz</td>--}}
{{--                                <td>Jane Smith<br><small class="text-muted">jane@example.com</small></td>--}}
{{--                                <td><span class="badge bg-secondary">free</span></td>--}}
{{--                                <td>Free</td>--}}
{{--                                <td><span class="badge bg-success">completed</span></td>--}}
{{--                                <td>Stripe</td>--}}
{{--                                <td>2024-01-14</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>txn_003</td>--}}
{{--                                <td>Skills Evaluation</td>--}}
{{--                                <td>Bob Johnson<br><small class="text-muted">bob@example.com</small></td>--}}
{{--                                <td><span class="badge bg-success">paid</span></td>--}}
{{--                                <td>$14.99</td>--}}
{{--                                <td><span class="badge bg-success">completed</span></td>--}}
{{--                                <td>Paypal</td>--}}
{{--                                <td>2024-01-13</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>txn_004</td>--}}
{{--                                <td>Personality Assessment</td>--}}
{{--                                <td>Alice Brown<br><small class="text-muted">alice@example.com</small></td>--}}
{{--                                <td><span class="badge bg-success">paid</span></td>--}}
{{--                                <td>$9.99</td>--}}
{{--                                <td><span class="badge bg-warning text-dark">pending</span></td>--}}
{{--                                <td>Stripe</td>--}}
{{--                                <td>2024-01-12</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@push('styles')--}}
{{--    <style>--}}
{{--        .card.bg-light {--}}
{{--            background-color: #f8f9fa!important;--}}
{{--        }--}}
{{--        .badge {--}}
{{--            font-size: 0.85em;--}}
{{--            font-weight: 500;--}}
{{--            padding: 0.35em 0.65em;--}}
{{--        }--}}
{{--        .table th {--}}
{{--            white-space: nowrap;--}}
{{--        }--}}
{{--        .table td {--}}
{{--            vertical-align: middle;--}}
{{--        }--}}
{{--        .text-muted {--}}
{{--            opacity: 0.8;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endpush--}}


@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Sales</h1>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-4">Track payments and revenue from quiz analysis</h4>

                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Total Revenue</h6>
                                <h4 class="fw-bold">${{ number_format($totalRevenue, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Total Transactions</h6>
                                <h4 class="fw-bold">{{ $totalTransactions }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Paid Analyses</h6>
                                <h4 class="fw-bold">{{ $paidAnalyses }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-muted">Unique Users</h6>
                                <h4 class="fw-bold">{{ $uniqueUsers }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <div class="mb-4">
                    <h5 class="mb-3">Transaction History</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Quiz</th>
                                <th>User</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Gateway</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->payment_id ?? 'N/A' }}</td>
                                    <td>{{ $transaction->quiz->title ?? 'Unknown Quiz' }}</td>
                                    <td>
                                        {{ $transaction->user->name ?? 'Unknown User' }}<br>
                                        <small class="text-muted">{{ $transaction->user->email ?? 'N/A' }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">paid</span>
                                    </td>
                                    <td>${{ number_format($transaction->payment_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-success">completed</span>
                                    </td>
                                    <td>Stripe</td> {{-- You might want to store payment gateway in your results table --}}
                                    <td>{{ $transaction->paid_at?->format('Y-m-d') ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No transactions found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if($transactions->hasPages())
                        <div class="mt-4">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card.bg-light {
            background-color: #f8f9fa!important;
        }
        .badge {
            font-size: 0.85em;
            font-weight: 500;
            padding: 0.35em 0.65em;
        }
        .table th {
            white-space: nowrap;
        }
        .table td {
            vertical-align: middle;
        }
        .text-muted {
            opacity: 0.8;
        }
    </style>
@endpush
