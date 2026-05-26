@extends('layouts.admin')

@section('content')
<style>* { box-sizing:border-box; }</style>

<div class="p-6 space-y-8" style="background:#f0f4fa; min-height:100vh;">

    <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a;">📰 Новости</h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">Управување со новости.</p>
        </div>
        <a href="{{ route('admin.novosti.create') }}"
           style="background:#1d6fa5; color:#fff; font-weight:700; padding:12px 24px; border-radius:12px; text-decoration:none; font-size:0.9rem;">
            + Додај новост
        </a>
    </div>

    @if(session('success'))
    <div style="background:#d1fae5; border:1px solid #6ee7b7; border-radius:12px; padding:14px 18px; color:#065f46; font-weight:600;">
        ✓ {{ session('success') }}
    </div>
    @endif

    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">
        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">📋 Список на новости</h2>
        </div>
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:0.85rem; min-width:500px;">
                <thead>
                    <tr style="background:#f5f8ff;">
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Наслов</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Категорија</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Датум</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Слика</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Статус</th>
                        <th style="padding:12px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">Акции</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($novosti as $novost)
                    <tr style="border-top:1px solid #f0f4fa;">
                        <td style="padding:14px 18px; color:#1a2e4a; font-weight:600;">{{ $novost->title }}</td>
                        <td style="padding:14px 18px; color:#5a7299;">{{ $novost->category ?? '-' }}</td>
                        <td style="padding:14px 18px; color:#5a7299;">
                            {{ $novost->published_at ? \Carbon\Carbon::parse($novost->published_at)->format('d.m.Y') : '-' }}
                        </td>
                        <td style="padding:14px 18px;">
                            @if($novost->image_main)
                                <img src="{{ asset('storage/' . $novost->image_main) }}" style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
                            @else
                                <span style="color:#5a7299; font-style:italic;">Нема</span>
                            @endif
                        </td>
                        <td style="padding:14px 18px;">
                            <span style="font-size:0.7rem; font-weight:700; padding:3px 10px; border-radius:20px;
                                background:{{ $novost->is_active ? '#d1fae5' : '#fee2e2' }};
                                color:{{ $novost->is_active ? '#065f46' : '#991b1b' }};">
                                {{ $novost->is_active ? 'Активна' : 'Скриена' }}
                            </span>
                        </td>
                        <td style="padding:14px 18px;">
                            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                <a href="{{ route('admin.novosti.edit', $novost) }}"
                                   style="background:#e6f1fb; color:#1d6fa5; border:1px solid #b3d4f0; border-radius:8px; padding:5px 12px; font-size:0.75rem; font-weight:700; text-decoration:none;">
                                    ✏️ Уреди
                                </a>
                                <form method="POST" action="{{ route('admin.novosti.destroy', $novost) }}"
                                      onsubmit="return confirm('Сигурно сакаш да ја избришеш оваа новост?')">
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
                    <tr><td colspan="6" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">Нема додадени новости.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection