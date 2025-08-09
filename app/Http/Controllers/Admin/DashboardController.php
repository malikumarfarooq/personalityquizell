<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Static data for the dashboard
        $data = [
            'totalRevenue' => '$13,340',
            'revenueChange' => '+12%',
            'activeQuizzes' => 24,
            'totalUsers' => 1247,
            'completionRate' => '89%',
            'revenueTrend' => [-3200, -2400, -1600, -800, 0],
            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May']
        ];

        return view('admin.dashboard', $data);
    }
}
