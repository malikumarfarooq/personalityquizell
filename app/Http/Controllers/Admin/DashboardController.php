<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Total Revenue (from paid results)
        $totalRevenue = Result::where('is_paid', true)->sum('payment_amount');

        // Revenue change from last month (percentage)
        $currentMonthRevenue = Result::where('is_paid', true)
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('payment_amount');

        $lastMonthRevenue = Result::where('is_paid', true)
            ->whereMonth('paid_at', now()->subMonth()->month)
            ->whereYear('paid_at', now()->subMonth()->year)
            ->sum('payment_amount');

        $revenueChange = $lastMonthRevenue > 0
            ? (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100
            : ($currentMonthRevenue > 0 ? 100 : 0);

        $revenueChangeFormatted = ($revenueChange >= 0 ? '+' : '') . number_format($revenueChange, 1) . '%';

        // Active quizzes
        $activeQuizzes = Quiz::where('is_active', true)->count();

        // Total users
        $totalUsers = User::count();

        // Completion rate (users who completed at least one quiz)
        $usersWithResults = Result::select('user_id')->distinct()->count();
        $completionRate = $totalUsers > 0 ? round(($usersWithResults / $totalUsers) * 100) : 0;

        // Revenue trend for the last 5 months
        $revenueData = Result::where('is_paid', true)
            ->where('paid_at', '>=', now()->subMonths(5)->startOfMonth())
            ->select(
                DB::raw('YEAR(paid_at) as year'),
                DB::raw('MONTH(paid_at) as month'),
                DB::raw('SUM(payment_amount) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Prepare chart data
        $months = [];
        $revenueTrend = [];

        for ($i = 4; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthYear = $date->format('M');
            $months[] = $monthYear;

            $revenueForMonth = $revenueData->first(function ($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });

            $revenueTrend[] = $revenueForMonth ? (float) $revenueForMonth->total : 0;
        }

        return view('admin.dashboard', [
            'totalRevenue' => '$' . number_format($totalRevenue, 2),
            'revenueChange' => $revenueChangeFormatted,
            'activeQuizzes' => $activeQuizzes,
            'totalUsers' => $totalUsers,
            'completionRate' => $completionRate . '%',
            'revenueTrend' => $revenueTrend,
            'months' => $months
        ]);
    }
}
