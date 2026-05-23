<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        if (auth()->user()->email === 'vospituvac@idrizovo.com') {
            abort(403);
        }

        $topVisited = \App\Models\VisitRequest::select('prisoner_name')
            ->selectRaw('COUNT(*) as visits_count')
            ->selectRaw('MAX(requested_date) as last_visit')
            ->groupBy('prisoner_name')
            ->orderByDesc('visits_count')
            ->take(5)
            ->get()
            ->map(function($item) {
                $item->name = $item->prisoner_name;
                return $item;
            });

        return view('admin.analytics', compact('topVisited'));
    }
}