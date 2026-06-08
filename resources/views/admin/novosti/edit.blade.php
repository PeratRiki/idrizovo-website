@extends('layouts.admin')

@section('content')
<style>* { box-sizing:border-box; }</style>

<div class="p-6" style="background:#f0f4fa; min-height:100vh;">

    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
        <a href="{{ route('admin.novosti.index') }}"
           style="color:#1d6fa5; text-decoration:none; font-weight:700;">← Назад</a>
        <h1 style="font-size:1.75rem; font-weight:800; color:#1a2e4a;">✏️ Уреди новост</h1>
    </div>

    @if($errors->any())
    <div style="background:#fee2e2; border:1px solid #fca5a5; border-radius:12px; padding:14px 18px; color:#991b1b; margin-bottom:16px;">
        @foreach($errors->all() as $e) <div>• {{ $e }}</div> @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('admin.novosti.update', $novost) }}" enctype="multipart/form-data"
          style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:28px; display:flex; flex-direction:column; gap:20px;">
        @csrf @method('PUT')

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Наслов *</label>
            <input type="text" name="naslov" value="{{ old('naslov', $novost->naslov) }}" required
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Содржина *</label>
            <textarea name="sodrzhina" required rows="6"
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none; resize:vertical;">{{ old('sodrzhina', $novost->sodrzhina) }}</textarea>
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Датум *</label>
            <input type="date" name="datum" value="{{ old('datum', $novost->datum) }}" required
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div>
            <label style="display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a; margin-bottom:6px; text-transform:uppercase;">Слика</label>
            @if($novost->slika)
                <img src="{{ asset('storage/' . $novost->slika) }}"
                     style="width:80px; height:80px; object-fit:cover; border-radius:10px; margin-bottom:10px; display:block;">
                <p style="font-size:0.75rem; color:#5a7299; margin-bottom:8px;">Прикачи нова за да ја замениш</p>
            @endif
            <input type="file" name="slika" accept="image/*"
                style="width:100%; border:1.5px solid #d1dff0; border-radius:10px; padding:10px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;">
        </div>

        <div style="display:flex; align-items:center; gap:10px;">
            <input type="checkbox" name="aktiven" value="1" id="aktiven" {{ old('aktiven', $novost->aktiven) ? 'checked' : '' }}
                style="width:18px; height:18px; cursor:pointer;">
            <label for="aktiven" style="font-size:0.9rem; font-weight:600; color:#1a2e4a; cursor:pointer;">Активна (видлива на сајтот)</label>
        </div>

        <div style="display:flex; gap:12px;">
            <button type="submit"
                style="background:#1d6fa5; color:#fff; font-weight:700; padding:12px 28px; border-radius:12px; border:none; cursor:pointer; font-size:0.9rem;">
                💾 Зачувај промени
            </button>
            <a href="{{ route('admin.novosti.index') }}"
               style="background:#f0f4fa; color:#5a7299; font-weight:700; padding:12px 24px; border-radius:12px; text-decoration:none; font-size:0.9rem;">
                Откажи
            </a>
        </div>
    </form>
</div>
@endsection
