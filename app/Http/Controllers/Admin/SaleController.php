<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Get paid results with user and quiz relationships
        $transactions = Result::with(['user', 'quiz'])
            ->where('is_paid', true)
            ->orderBy('paid_at', 'desc')
            ->paginate(10); // You can adjust the pagination as needed

        // Calculate metrics
        $totalRevenue = Result::where('is_paid', true)->sum('payment_amount');
        $totalTransactions = Result::where('is_paid', true)->count();
        $paidAnalyses = Result::where('is_paid', true)->count();
        $uniqueUsers = Result::where('is_paid', true)->distinct('user_id')->count('user_id');

        return view('admin.sales.index', compact(
            'transactions',
            'totalRevenue',
            'totalTransactions',
            'paidAnalyses',
            'uniqueUsers'
        ));
    }
}
