{{--@extends('layouts.admin')--}}

{{--@section('content')--}}
{{--    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">--}}
{{--        <h1 class="h2">Dashboard</h1>--}}
{{--    </div>--}}

{{--    <div class="row mb-4">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Total Revenue</h5>--}}
{{--                    <h3 class="card-text">{{ $totalRevenue }}</h3>--}}
{{--                    <span class="text-success">{{ $revenueChange }} from last month</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-4">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Overview</h5>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Active Quizzes</th>--}}
{{--                                <th>Total Users</th>--}}
{{--                                <th>Completion Rate</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>{{ $activeQuizzes }} <small class="text-muted">3 new this month</small></td>--}}
{{--                                <td>{{ $totalUsers }} <small class="text-muted">+8% from last month</small></td>--}}
{{--                                <td>{{ $completionRate }} <small class="text-muted">+3% from last month</small></td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Revenue Trend</h5>--}}
{{--                    <canvas id="revenueChart" height="100"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    @push('scripts')--}}
{{--        <script>--}}
{{--            // Static chart implementation - would be dynamic in real app--}}
{{--            document.addEventListener('DOMContentLoaded', function() {--}}
{{--                const ctx = document.getElementById('revenueChart').getContext('2d');--}}
{{--                new Chart(ctx, {--}}
{{--                    type: 'line',--}}
{{--                    data: {--}}
{{--                        labels: @json($months),--}}
{{--                        datasets: [{--}}
{{--                            label: 'Revenue',--}}
{{--                            data: @json($revenueTrend),--}}
{{--                            borderColor: 'rgb(75, 192, 192)',--}}
{{--                            tension: 0.1--}}
{{--                        }]--}}
{{--                    },--}}
{{--                    options: {--}}
{{--                        scales: {--}}
{{--                            y: {--}}
{{--                                beginAtZero: true--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endpush--}}
{{--@endsection--}}


@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <h3 class="card-text">{{ $totalRevenue }}</h3>
                    <span class="{{ strpos($revenueChange, '+') === 0 ? 'text-success' : 'text-danger' }}">
                        {{ $revenueChange }} from last month
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Overview</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Active Quizzes</th>
                                <th>Total Users</th>
                                <th>Completion Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $activeQuizzes }} <small class="text-muted">quizzes available</small></td>
                                <td>{{ $totalUsers }} <small class="text-muted">registered users</small></td>
                                <td>{{ $completionRate }} <small class="text-muted">of users completed quizzes</small></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Revenue Trend (Last 5 Months)</h5>
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('revenueChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($months),
                        datasets: [{
                            label: 'Revenue ($)',
                            data: @json($revenueTrend),
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.1)',
                            tension: 0.3,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
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
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return '$' + context.raw.toFixed(2);
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
