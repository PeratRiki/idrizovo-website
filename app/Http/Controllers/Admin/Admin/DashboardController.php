<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $visitRequests   = VisitRequest::latest()->take(5)->get();
        $recentMessages  = ContactMessage::latest()->take(3)->get();
        $todayVisits     = VisitRequest::where('status', 'approved')
                            ->whereDate('requested_date', today())
                            ->get();

        return view('admin.dashboard', compact('visitRequests', 'recentMessages', 'todayVisits'));
    }
}