<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    public function index()
    {
        $visitRequests = collect();

        return view('admin.visit-request', compact('visitRequests'));
    }
}