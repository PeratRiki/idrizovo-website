@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">
                ✉️ Пораки
            </h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">
                Комуникација со посетителите и повратни информации.
            </p>
        </div>

        <div style="background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px;">
            <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a;">
                Вкупно пораки: {{ $messages->count() ?? 0 }}
            </span>
        </div>
    </div>

    {{-- Messages Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">

        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">
                📥 Inbox
            </h2>
        </div>

        <table style="width:100%; border-collapse:collapse; font-size:0.85rem;">

            <thead>
                <tr style="background:#f5f8ff;">
                    <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">
                        Испраќач
                    </th>

                    <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">
                        Порака
                    </th>

                    <th style="padding:14px 20px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase; font-weight:700;">
                        Статус
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse($messages ?? [] as $message)

                <tr style="border-top:1px solid #f0f4fa;">

                    <td style="padding:16px 20px;">
                        <div style="display:flex; align-items:center; gap:12px;">

                            <div style="
                                width:40px;
                                height:40px;
                                border-radius:50%;
                                background:#e6f1fb;
                                color:#1d6fa5;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-weight:700;
                            ">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>

                            <div>
                                <p style="font-weight:700; color:#1a2e4a;">
                                    {{ $message->name }}
                                </p>

                                <p style="font-size:0.75rem; color:#5a7299;">
                                    {{ $message->email }}
                                </p>
                            </div>

                        </div>
                    </td>

                    <td style="padding:16px 20px; color:#5a7299;">
                        {{ Str::limit($message->message, 80) }}
                    </td>

                    <td style="padding:16px 20px;">

                        <span style="
                            background:#d1fae5;
                            color:#065f46;
                            font-size:0.7rem;
                            font-weight:700;
                            padding:4px 10px;
                            border-radius:20px;
                        ">
                            Ново
                        </span>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="3" style="
                        padding:50px;
                        text-align:center;
                        color:#5a7299;
                        font-style:italic;
                    ">
                        Нема нови пораки во сандачето.
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection