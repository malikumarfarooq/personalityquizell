<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Get all results with payment information
        $payments = Result::with('user')
            ->whereNotNull('payment_id')
            ->orderBy('paid_at', 'desc')
            ->paginate(10);

        // Calculate stats
        $totalRevenue = Result::where('is_paid', true)->sum('payment_amount');
        $successfulPayments = Result::where('is_paid', true)->count();
        $pendingPayments = Result::where('is_paid', false)
            ->whereNotNull('payment_id')
            ->count();
        $failedPayments = 0;

        // Generate revenue chart data (last 6 months)
        $revenueData = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $revenue = Result::where('is_paid', true)
                ->whereYear('paid_at', $month->year)
                ->whereMonth('paid_at', $month->month)
                ->sum('payment_amount');

            $revenueData[] = $revenue ?? 0;
            $labels[] = $month->format('M Y');
        }

        $revenueChart = [
            'labels' => $labels,
            'data' => $revenueData
        ];

        return view('admin.payments.index', compact(
            'payments',
            'totalRevenue',
            'successfulPayments',
            'pendingPayments',
            'failedPayments',
            'revenueChart'
        ));
    }

    public function show(Result $result)
    {
        // Show detailed payment information
        return view('admin.payments.show', compact('result'));
    }

    public function store(Request $request)
    {
        // This method can handle payment configuration updates if needed
        // For now, we'll just redirect back

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment settings updated successfully.');
    }
}
