@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6" style="background:#f0f4fa; min-height:100vh;">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 style="font-size:2rem; font-weight:800; color:#1a2e4a; letter-spacing:-0.5px;">
                📅 Барања за посета
            </h1>
            <p style="color:#5a7299; font-size:0.875rem; margin-top:4px;">
                Преглед и управување со сите барања за посета.
            </p>
        </div>

        <div style="background:#fff; border:1px solid #d1dff0; border-radius:50px; padding:8px 18px;">
            <span style="font-size:0.75rem; font-weight:700; color:#1a2e4a;">
                Вкупно барања: {{ $visitRequests->count() ?? 0 }}
            </span>
        </div>
    </div>

    {{-- Table --}}
    <div style="background:#fff; border:1px solid #d1dff0; border-radius:20px; overflow:hidden;">

        <div style="padding:20px 24px; border-bottom:1px solid #e8f0fb;">
            <h2 style="font-size:1rem; font-weight:700; color:#1a2e4a;">
                📥 Листа на барања
            </h2>
        </div>

        <table style="width:100%; border-collapse:collapse; font-size:0.85rem;">
            <thead>
                <tr style="background:#f5f8ff;">
                    <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase;">
                        Посетител
                    </th>

                    <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase;">
                        Затвореник
                    </th>

                    <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase;">
                        Датум
                    </th>

                    <th style="padding:14px 18px; text-align:left; color:#5a7299; font-size:0.7rem; text-transform:uppercase;">
                        Статус
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse($visitRequests as $visit)

                <tr style="border-top:1px solid #f0f4fa;">

                    <td style="padding:16px 18px; color:#1a2e4a; font-weight:600;">
                        {{ $visit->visitor_name ?? 'Непознат' }}
                    </td>

                    <td style="padding:16px 18px; color:#1a2e4a;">
                        {{ $visit->prisoner_name ?? 'Непознат' }}
                    </td>

                    <td style="padding:16px 18px; color:#5a7299;">
                        {{ \Carbon\Carbon::parse($visit->requested_date)->format('d.m.Y') }}
                    </td>

                    <td style="padding:16px 18px;">

                        <span style="
                            font-size:0.7rem;
                            font-weight:700;
                            padding:4px 12px;
                            border-radius:20px;

                            background:
                            {{ $visit->status == 'approved'
                                ? '#d1fae5'
                                : ($visit->status == 'rejected'
                                    ? '#fee2e2'
                                    : '#fef3c7') }};

                            color:
                            {{ $visit->status == 'approved'
                                ? '#065f46'
                                : ($visit->status == 'rejected'
                                    ? '#991b1b'
                                    : '#92400e') }};
                        ">

                            {{ $visit->status == 'approved'
                                ? 'Одобрено'
                                : ($visit->status == 'rejected'
                                    ? 'Одбиено'
                                    : 'На чекање') }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" style="padding:40px; text-align:center; color:#5a7299; font-style:italic;">
                        Нема барања за посета.
                    </td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection