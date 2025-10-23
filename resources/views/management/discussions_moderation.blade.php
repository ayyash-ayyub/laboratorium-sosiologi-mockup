@extends('management.layout')

@section('title', 'Moderasi Diskusi | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Moderasi Diskusi</h1>

        </div>
        <div class="flex items-center gap-2 text-xs text-slate-500">
            <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-1 font-semibold text-emerald-600">3 Selesai</span>
            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-1 font-semibold text-yellow-600">4 Menunggu</span>
            <span class="inline-flex items-center rounded-full bg-sky-100 px-2.5 py-1 font-semibold text-sky-600">3 Dalam Review</span>
        </div>
    </header>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-5">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-sm font-semibold text-slate-800">Antrian Laporan</h2>
                    <p class="text-xs text-slate-500">10 laporan dummy seputar forum diskusi.</p>
                </div>
                <div class="flex flex-wrap gap-3 text-xs text-slate-600">
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Semua</button>
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Menunggu</button>
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Dalam Review</button>
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Selesai</button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Topik</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Pelapor</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Alasan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Tipe Pelapor</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Diajukan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Status</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                @foreach ($reports as $report)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-slate-800">{{ $report['topic'] }}</p>
                            <p class="text-xs text-slate-500">Ref ID: MOD-{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $report['reporter'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $report['reason'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $report['reported_by'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $report['submitted_at'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusStyles = [
                                    'Menunggu' => 'bg-yellow-100 text-yellow-600',
                                    'Dalam Review' => 'bg-sky-100 text-sky-600',
                                    'Ditindaklanjuti' => 'bg-purple-100 text-purple-600',
                                    'Selesai' => 'bg-emerald-100 text-emerald-600',
                                ];
                            @endphp
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusStyles[$report['status']] ?? 'bg-slate-100 text-slate-600' }}">
                                {{ $report['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-xs text-slate-500">
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Detail</button>
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Selesaikan</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 bg-slate-50/70 md:flex-row md:items-center md:justify-between">
            <p class="text-xs text-slate-500">Total laporan aktif: {{ count($reports) }}.</p>
            <div class="flex items-center gap-2 text-xs text-slate-600">
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Sebelumnya</button>
                <span>Halaman 1 dari 2</span>
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Berikutnya</button>
            </div>
        </div>
    </section>
</div>
@endsection
