@extends('layouts.admin')

@section('content')
<style>
    * { box-sizing:border-box; }
    .hm-input {
        width:100%; background:#f5f8ff; border:1.5px solid #d1dff0; border-radius:10px;
        padding:12px 14px; font-size:0.9rem; color:#1a2e4a; outline:none;
        transition:border-color 0.2s;
    }
    .hm-input:focus { border-color:#1d6fa5; background:#fff; }
    .hm-label {
        display:block; font-size:0.75rem; font-weight:700; color:#1a2e4a;
        margin-bottom:7px; text-transform:uppercase; letter-spacing:0.05em;
    }
</style>

<div class="p-6" style="background:#f0f4fa; min-height:100vh;">

    <div style="max-width:760px; margin:0 auto;">

        {{-- Header --}}
        <div style="margin-bottom:24px; display:flex; align-items:center; gap:14px;">
            <a href="{{ route('admin.handmade.index') }}"
               style="background:#fff; border:1px solid #d1dff0; border-radius:10px; padding:8px 14px; color:#1a2e4a; font-weight:700; font-size:0.85rem; text-decoration:none;">
                ← Назад
            </a>
            <h1 style="font-size:1.5rem; font-weight:800; color:#1a2e4a;">
                🧵 Додај нова секција
            </h1>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('admin.handmade.store') }}" enctype="multipart/form-data"
              style="background:#fff; border:1px solid #d1dff0; border-radius:20px; padding:32px; display:flex; flex-direction:column; gap:22px;">
            @csrf

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                {{-- Title --}}
                <div>
                    <label class="hm-label">Наслов на секцијата</label>
                    <input type="text" name="title" class="hm-input" value="{{ old('title') }}" required placeholder="пр. Уметност со игла и конец">
                    @error('title') <p style="color:#991b1b; font-size:0.78rem; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label class="hm-label">Категорија</label>
                    <select name="category" class="hm-input" required>
                        <option value="">-- Избери --</option>
                        <option value="iglaikonec" {{ old('category')=='iglaikonec' ? 'selected' : '' }}>Игла и конец</option>
                        <option value="rezba"      {{ old('category')=='rezba'      ? 'selected' : '' }}>Резби од дрво</option>
                        <option value="boja"       {{ old('category')=='boja'       ? 'selected' : '' }}>Боја и перспектива</option>
                        <option value="grncarstvo" {{ old('category')=='grncarstvo' ? 'selected' : '' }}>Грнчарство</option>
                        <option value="drugo"      {{ old('category')=='drugo'      ? 'selected' : '' }}>Друго</option>
                    </select>
                    @error('category') <p style="color:#991b1b; font-size:0.78rem; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

            </div>

            {{-- Description --}}
            <div>
                <label class="hm-label">Опис / текст</label>
                <textarea name="description" class="hm-input" rows="5" required
                          placeholder="Опишете ја оваа категорија на рачни изработки...">{{ old('description') }}</textarea>
                @error('description') <p style="color:#991b1b; font-size:0.78rem; margin-top:4px;">{{ $message }}</p> @enderror
            </div>

            {{-- Main Image --}}
            <div>
                <label class="hm-label">Главна слика</label>
                <input type="file" name="image_main" class="hm-input" accept="image/*">
                @error('image_main') <p style="color:#991b1b; font-size:0.78rem; margin-top:4px;">{{ $message }}</p> @enderror
            </div>

            {{-- Extra Images --}}
            <div>
                <label class="hm-label">Дополнителни слики (до 4)</label>
                <input type="file" name="images_extra[]" class="hm-input" accept="image/*" multiple>
                <p style="font-size:0.75rem; color:#5a7299; margin-top:5px;">Можеш да селектираш повеќе слики одеднаш.</p>
                @error('images_extra.*') <p style="color:#991b1b; font-size:0.78rem; margin-top:4px;">{{ $message }}</p> @enderror
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                {{-- Link --}}
                <div>
                    <label class="hm-label">Линк "Види повеќе"</label>
                    <input type="text" name="link_url" class="hm-input" value="{{ old('link_url') }}" placeholder="/Iglaikonec">
                </div>

                {{-- Sort Order --}}
                <div>
                    <label class="hm-label">Редослед</label>
                    <input type="number" name="sort_order" class="hm-input" value="{{ old('sort_order', 0) }}">
                </div>

            </div>

            {{-- Quote --}}
            <div>
                <label class="hm-label">Цитат (опционално)</label>
                <textarea name="quote" class="hm-input" rows="2"
                          placeholder="пр. Во секој бод има дел од мојата тишина...">{{ old('quote') }}</textarea>
            </div>

            {{-- Active --}}
            <div style="display:flex; align-items:center; gap:10px;">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                       {{ old('is_active', 1) ? 'checked' : '' }}
                       style="width:18px; height:18px; accent-color:#1d6fa5; cursor:pointer;">
                <label for="is_active" style="font-size:0.875rem; font-weight:600; color:#1a2e4a; cursor:pointer;">
                    Прикажи оваа секција на страницата
                </label>
            </div>

            {{-- Submit --}}
            <div style="display:flex; gap:12px; padding-top:8px; border-top:1px solid #e8f0fb;">
                <button type="submit"
                    style="background:#1d6fa5; color:#fff; font-weight:700; padding:13px 28px; border-radius:12px; border:none; cursor:pointer; font-size:0.95rem;">
                    Зачувај секција
                </button>
                <a href="{{ route('admin.handmade.index') }}"
                   style="background:#f5f8ff; color:#5a7299; font-weight:700; padding:13px 20px; border-radius:12px; text-decoration:none; font-size:0.95rem;">
                    Откажи
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
