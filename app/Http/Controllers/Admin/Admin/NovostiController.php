<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Novost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovostiController extends Controller
{
    public function index()
    {
        $novosti = Novost::latest('published_at')->get();
        return view('admin.novosti.index', compact('novosti'));
    }

    public function create()
    {
        return view('admin.novosti.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'description'  => 'required|string',
            'published_at' => 'nullable|date',
            'sort_order'   => 'nullable|integer',
            'image_main'   => 'nullable|image|max:2048',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image_main')) {
            $data['image_main'] = $request->file('image_main')->store('novosti', 'public');
        }

        Novost::create($data);

        return redirect()->route('admin.novosti.index')->with('success', 'Новоста е успешно додадена!');
    }

    public function edit($id)
    {
        $novost = Novost::findOrFail($id);
        return view('admin.novosti.edit', compact('novost'));
    }

    public function update(Request $request, $id)
    {
        $novost = Novost::findOrFail($id);

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'description'  => 'required|string',
            'published_at' => 'nullable|date',
            'sort_order'   => 'nullable|integer',
            'image_main'   => 'nullable|image|max:2048',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image_main')) {
            if ($novost->image_main) Storage::disk('public')->delete($novost->image_main);
            $data['image_main'] = $request->file('image_main')->store('novosti', 'public');
        }

        $novost->update($data);

        return redirect()->route('admin.novosti.index')->with('success', 'Новоста е успешно изменета!');
    }

    public function destroy($id)
    {
        $novost = Novost::findOrFail($id);
        if ($novost->image_main) Storage::disk('public')->delete($novost->image_main);
        $novost->delete();
        return redirect()->route('admin.novosti.index')->with('success', 'Новоста е избришана!');
    }
}