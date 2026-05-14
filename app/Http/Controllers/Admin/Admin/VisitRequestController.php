<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitRequest;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    public function index()
    {
        $visitRequests = VisitRequest::latest()->get();
        return view('admin.visit-request', compact('visitRequests'));
    }

    public function approve(VisitRequest $visit)
    {
        $visit->update(['status' => 'approved']);
        return back()->with('success', 'Барањето е одобрено!');
    }

    public function reject(VisitRequest $visit)
    {
        $visit->update(['status' => 'rejected']);
        return back()->with('success', 'Барањето е одбиено!');
    }

    public function updateStatus(Request $request, VisitRequest $visit)
    {
        $visit->update([
            'status' => $request->status,
            'reason' => $request->reason,
        ]);
        return back()->with('success', 'Статусот е ажуриран!');
    }
}