@extends('layouts.admin')

@section('content')
<style>* { box-sizing:border-box; }</style>

<div class="p-6" style="background:#f0f4fa; min-height:100vh;">

    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
        <a href="{{ route('admin.aktivnosti.index') }}"
           style="color:#1d6fa5; text-decoration:none; font-weight:700;">← Назад</a>
        <h1 style="font-size:1.75rem; font-weight:800; color:#1a2e4a;">+ Додај активност</h1>
    </div>

    @if($errors->any())
    <div style="background:#fee2e2; border:1px solid #fca5a5; border-radius:12px; padding:14px 18px; color:#991b1b; margin-bottom:16px;">
        @foreach($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('admin.aktivnosti.store') }}" enctype="multipart/form-data"
          style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:28px; display:flex; flex-direction:column; gap:20px;">
        @csrf

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Наслов *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Опис *</label>
            <textarea name="description" required rows="6"
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none; resize:vertical;">{{ old('description') }}</textarea>
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Слика</label>
            <input type="file" name="image" accept="image/*"
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Редослед</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div style="display:flex; align-items:center; gap:10px;">
            <input type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}
                style="width:18px; height:18px; cursor:pointer;">
            <label for="is_featured" style="font-size:0.9rem; font-weight:600; color:#1a2e4a; cursor:pointer;">⭐ Главна активност (се прикажува поголема)</label>
        </div>

        <div style="display:flex; align-items:center; gap:10px;">
            <input type="checkbox" name="is_active" value="1" id="is_active" checked
                style="width:18px; height:18px; cursor:pointer;">
            <label for="is_active" style="font-size:0.9rem; font-weight:600; color:#1a2e4a; cursor:pointer;">Активна (видлива на сајтот)</label>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit"
                style="background:#1d6fa5; color:#fff; font-weight:700; padding:12px 28px; border-radius:12px; border:none; cursor:pointer; font-size:0.9rem;">
                💾 Зачувај
            </button>
            <a href="{{ route('admin.aktivnosti.index') }}"
               style="background:#f0f4fa; color:#5a7299; font-weight:700; padding:12px 24px; border-radius:12px; text-decoration:none; font-size:0.9rem;">
                Откажи
            </a>
        </div>
    </form>
</div>
@endsection
