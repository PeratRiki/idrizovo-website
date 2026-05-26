<?php

namespace App\Http\Controllers;

use App\Models\Novost;

class NovostiPublicController extends Controller
{
    public function index()
    {
        $novosti = Novost::where('is_active', true)
                         ->latest('published_at')
                         ->get();
        return view('novosti.index', compact('novosti'));
    }
}