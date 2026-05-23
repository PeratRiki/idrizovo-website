@extends('layouts.admin')

@section('content')
<style>* { box-sizing:border-box; }</style>

<div class="p-6 space-y-8" style="background:#f0f4fa; min-height:100vh;">

    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a;">🏃 Активности</h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Управување со активности.</p>
        </div>
        <a href="{{ route('admin.aktivnosti.create') }}"
           style="background:#1d6fa5; color:#fff; font-weight:700; padding:12px 24px; border-radius:12px; text-decoration:none; font-size:0.9rem;">
            + Додај активност
        </a>
    </div>

    @if(session('success'))
    <div style="background:#d1fae5; border:1px solid #6ee7b7; border-radius:12px; padding:14px 18px; color:#065f46; font-weight:600;">
        ✓ {{ session('success') }}
    </div>
    @endif

    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📋 Список на активности</h2>
        </div>
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:500px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Наслов</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Слика</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Редослед</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Featured</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акции</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aktivnosti as $aktivnost)
                    <tr style="border-top:1px solid #f0f4fa;">
                        <td style="padding:14px 18px; color:#1a2e4a; font-weight:600;">{{ $aktivnost->title }}</td>
                        <td style="padding:14px 18px;">
                            @if($aktivnost->image)
                                <img src="{{ asset('storage/' . $aktivnost->image) }}" style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
                            @else
                                <span style="color:#5a7299; font-style:italic;">Нема</span>
                            @endif
                        </td>
                        <td style="padding:14px 18px; color:#5a7299;">{{ $aktivnost->sort_order }}</td>
                        <td style="padding:14px 18px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $aktivnost->is_featured ? '#fef3c7' : '#f0f4fa' }};
                                color:{{ $aktivnost->is_featured ? '#92400e' : '#5a7299' }};">
                                {{ $aktivnost->is_featured ? '⭐ Главна' : 'Обична' }}
                            </span>
                        </td>
                        <td style="padding:14px 18px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $aktivnost->is_active ? '#d1fae5' : '#fee2e2' }};
                                color:{{ $aktivnost->is_active ? '#065f46' : '#991b1b' }};">
                                {{ $aktivnost->is_active ? 'Активна' : 'Скриена' }}
                            </span>
                        </td>
                        <td style="padding:14px 18px;">
                            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                <a href="{{ route('admin.aktivnosti.edit', $aktivnost->id) }}"
                                   style="background:#e6f1fb; color:#1d6fa5; border:1px solid #b3d4f0; border-radius:8px; padding:5px 12px; font-size:0.75rem; font-weight:700; text-decoration:none;">
                                    ✏️ Уреди
                                </a>
                                <form method="POST" action="{{ route('admin.aktivnosti.destroy', $aktivnost->id) }}"
                                      onsubmit="return confirm('Сигурно сакаш да ја избришеш оваа активност?')">
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
                    <tr><td colspan="6" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">Нема додадени активности.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection