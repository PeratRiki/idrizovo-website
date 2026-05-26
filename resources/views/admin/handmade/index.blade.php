@extends('layouts.admin')

@section('content')
<style>* { box-sizing:border-box; }</style>

<div class="p-6 space-y-8" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a;">🧵 Рачни изработки</h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Управување со секциите и цитатите.</p>
        </div>
        <a href="{{ route('admin.handmade.create') }}"
           style="background:#1d6fa5; color:#fff; font-weight:700; padding:12px 24px; border-radius:12px; text-decoration:none; font-size:0.9rem;">
            + Додај секција
        </a>
    </div>

    @if(session('success'))
    <div style="background:#d1fae5; border:1px solid #6ee7b7; border-radius:12px; padding:14px 18px; color:#065f46; font-weight:600;">
        ✓ {{ session('success') }}
    </div>
    @endif

    {{-- Items Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📋 Секции</h2>
        </div>
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:500px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Наслов</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Категорија</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Редослед</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акции</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr style="border-top:1px solid #f0f4fa;">
                        <td style="padding:14px 18px; color:#1a2e4a; font-weight:600;">{{ $item->title }}</td>
                        <td style="padding:14px 18px; color:#5a7299;">{{ $item->category }}</td>
                        <td style="padding:14px 18px; color:#5a7299;">{{ $item->sort_order }}</td>
                        <td style="padding:14px 18px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $item->is_active ? '#d1fae5' : '#fee2e2' }};
                                color:{{ $item->is_active ? '#065f46' : '#991b1b' }};">
                                {{ $item->is_active ? 'Активна' : 'Скриена' }}
                            </span>
                        </td>
                        <td style="padding:14px 18px;">
                            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                <a href="{{ route('admin.handmade.edit', $item) }}"
                                   style="background:#e6f1fb; color:#1d6fa5; border:1px solid #b3d4f0; border-radius:8px; padding:5px 12px; font-size:0.75rem; font-weight:700; text-decoration:none;">
                                    ✏️ Уреди
                                </a>
                                <form method="POST" action="{{ route('admin.handmade.destroy', $item) }}"
                                      onsubmit="return confirm('Сигурно сакаш да ја избришеш оваа секција?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        style="background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; padding:5px 12px; font-size:0.75rem; font-weight:700; cursor:pointer;">
                                        🗑️ Избриши
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">Нема додадени секции.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Quotes Section --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">💬 Цитати</h2>
        </div>
        <div style="padding:24px; display:flex; flex-direction:column; gap:16px;">

            {{-- Add Quote Form --}}
            <form method="POST" action="{{ route('admin.handmade.storeQuote') }}"
                  style="background:#f5f8ff; border:1px solid #d1dff0; border-radius:14px; padding:18px; display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;">
                @csrf
                <div style="flex:1; min-width:200px;">
                    <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Нов цитат</label>
                    <textarea name="quote" required rows="2"
                        style="width:100%; background:#fff; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.875rem; color:#1a2e4a; outline:none; resize:vertical;"></textarea>
                </div>
                <div style="width:80px;">
                    <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Ред</label>
                    <input type="number" name="sort_order" value="0"
                        style="width:100%; background:#fff; border:1.5px solid #d1dff0; border-radius:10px; padding:10px; font-size:0.875rem; color:#1a2e4a; outline:none;">
                </div>
                <button type="submit"
                    style="background:#1d6fa5; color:#fff; font-weight:700; padding:10px 20px; border-radius:10px; border:none; cursor:pointer; font-size:0.875rem; white-space:nowrap;">
                    + Додај
                </button>
            </form>

            {{-- Quotes List --}}
            @forelse($quotes as $q)
            <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px; background:#f5f8ff; border:1px solid #d1dff0; border-radius:12px; padding:14px 18px;">
                <p style="color:#1a2e4a; font-size:0.875rem; flex:1;">„{{ $q->quote }}"</p>
                <form method="POST" action="{{ route('admin.handmade.destroyQuote', $q) }}"
                      onsubmit="return confirm('Избриши го цитатот?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        style="background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; padding:4px 10px; font-size:0.7rem; font-weight:700; cursor:pointer; white-space:nowrap;">
                        🗑️ Избриши
                    </button>
                </form>
            </div>
            @empty
            <p style="text-align:center; color:#5a7299; font-style:italic; padding:20px;">Нема цитати.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection