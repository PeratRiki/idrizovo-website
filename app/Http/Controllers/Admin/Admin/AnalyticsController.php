<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalPrisoners = 247;
        $visitsThisMonth = 38;
        $approvedVisits = 31;
        $rejectedVisits = 7;
        $pendingVisits = 12;

        $monthlyVisits = [12, 18, 14, 22, 30, 28, 35, 31, 27, 38, 24, 20];

        $topVisited = collect([]);

        $avgPerDay = 1.3;
        $weeklyVisitors = 9;
        $todayRequests = 3;

        return view('admin.analytics', compact(
            'totalPrisoners',
            'visitsThisMonth',
            'approvedVisits',
            'rejectedVisits',
            'pendingVisits',
            'monthlyVisits',
            'topVisited',
            'avgPerDay',
            'weeklyVisitors',
            'todayRequests'
        ));
    }
}