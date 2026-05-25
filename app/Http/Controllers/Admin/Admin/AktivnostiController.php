<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aktivnost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktivnostiController extends Controller
{
    public function index()
    {
        $aktivnosti = Aktivnost::orderBy('sort_order')->get();
        return view('admin.aktivnosti.index', compact('aktivnosti'));
    }

    public function create()
    {
        return view('admin.aktivnosti.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
            'sort_order'  => 'nullable|integer',
        ]);

        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('aktivnosti', 'public');
        }

        Aktivnost::create($data);

        return redirect()->route('admin.aktivnosti.index')->with('success', 'Активноста е успешно додадена!');
    }

    public function edit($id)
    {
        $aktivnost = Aktivnost::findOrFail($id);
        return view('admin.aktivnosti.edit', compact('aktivnost'));
    }

    public function update(Request $request, $id)
    {
        $aktivnost = Aktivnost::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|max:2048',
            'sort_order'  => 'nullable|integer',
        ]);

        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            if ($aktivnost->image) Storage::disk('public')->delete($aktivnost->image);
            $data['image'] = $request->file('image')->store('aktivnosti', 'public');
        }

        $aktivnost->update($data);

        return redirect()->route('admin.aktivnosti.index')->with('success', 'Активноста е успешно изменета!');
    }

    public function destroy($id)
    {
        $aktivnost = Aktivnost::findOrFail($id);
        if ($aktivnost->image) Storage::disk('public')->delete($aktivnost->image);
        $aktivnost->delete();
        return redirect()->route('admin.aktivnosti.index')->with('success', 'Активноста е избришана!');
    }
}