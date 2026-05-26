<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\HandmadeItem;
use App\Models\HandmadeQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HandmadeController extends Controller
{
    // ─── ITEMS ───────────────────────────────────────────────

    public function index()
    {
        $items  = HandmadeItem::orderBy('sort_order')->get();
        $quotes = HandmadeQuote::orderBy('sort_order')->get();
        return view('admin.handmade.index', compact('items', 'quotes'));
    }

    public function create()
    {
        return view('admin.handmade.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category'    => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image_main'  => 'nullable|image|max:4096',
            'images_extra.*' => 'nullable|image|max:4096',
            'link_url'    => 'nullable|string|max:255',
            'quote'       => 'nullable|string',
            'sort_order'  => 'nullable|integer',
            'is_active'   => 'nullable|boolean',
        ]);

        // Главна слика
        if ($request->hasFile('image_main')) {
            $data['image_main'] = $request->file('image_main')->store('handmade', 'public');
        }

        // Дополнителни слики (до 4)
        $extras = [];
        if ($request->hasFile('images_extra')) {
            foreach ($request->file('images_extra') as $img) {
                $extras[] = $img->store('handmade', 'public');
            }
        }
        $data['images_extra'] = $extras ?: null;
        $data['is_active']    = $request->boolean('is_active', true);

        HandmadeItem::create($data);

        return redirect()->route('admin.handmade.index')
                         ->with('success', 'Ставката е успешно додадена.');
    }

    public function edit(HandmadeItem $handmadeItem)
    {
        return view('admin.handmade.edit', compact('handmadeItem'));
    }

    public function update(Request $request, HandmadeItem $handmadeItem)
    {
        $data = $request->validate([
            'category'       => 'required|string|max:100',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'image_main'     => 'nullable|image|max:4096',
            'images_extra.*' => 'nullable|image|max:4096',
            'link_url'       => 'nullable|string|max:255',
            'quote'          => 'nullable|string',
            'sort_order'     => 'nullable|integer',
            'is_active'      => 'nullable|boolean',
        ]);

        // Замени главна слика
        if ($request->hasFile('image_main')) {
            if ($handmadeItem->image_main) {
                Storage::disk('public')->delete($handmadeItem->image_main);
            }
            $data['image_main'] = $request->file('image_main')->store('handmade', 'public');
        } else {
            unset($data['image_main']);
        }

        // Замени дополнителни слики
        if ($request->hasFile('images_extra')) {
            if ($handmadeItem->images_extra) {
                foreach ($handmadeItem->images_extra as $old) {
                    Storage::disk('public')->delete($old);
                }
            }
            $extras = [];
            foreach ($request->file('images_extra') as $img) {
                $extras[] = $img->store('handmade', 'public');
            }
            $data['images_extra'] = $extras;
        } else {
            unset($data['images_extra']);
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $handmadeItem->update($data);

        return redirect()->route('admin.handmade.index')
                         ->with('success', 'Ставката е успешно ажурирана.');
    }

    public function destroy(HandmadeItem $handmadeItem)
    {
        if ($handmadeItem->image_main) {
            Storage::disk('public')->delete($handmadeItem->image_main);
        }
        if ($handmadeItem->images_extra) {
            foreach ($handmadeItem->images_extra as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $handmadeItem->delete();

        return redirect()->route('admin.handmade.index')
                         ->with('success', 'Ставката е избришана.');
    }

    // ─── QUOTES ──────────────────────────────────────────────

    public function storeQuote(Request $request)
    {
        $data = $request->validate([
            'quote'      => 'required|string',
            'sort_order' => 'nullable|integer',
        ]);
        $data['is_active'] = true;
        HandmadeQuote::create($data);

        return redirect()->route('admin.handmade.index')
                         ->with('success', 'Цитатот е додаден.');
    }

    public function destroyQuote(HandmadeQuote $handmadeQuote)
    {
        $handmadeQuote->delete();
        return redirect()->route('admin.handmade.index')
                         ->with('success', 'Цитатот е избришан.');
    }
}