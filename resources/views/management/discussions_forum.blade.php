@extends('management.layout')

@section('title', 'Forum Diskusi | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Forum Diskusi Sosiologi</h1>

        </div>
        <button class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
            Buat Topik Baru
        </button>
    </header>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-5">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-sm font-semibold text-slate-800">Topik Diskusi Terbaru</h2>
                    <p class="text-xs text-slate-500">Data dummy – 10 topik populer minggu ini.</p>
                </div>
                <div class="flex flex-wrap gap-3 text-xs text-slate-600">
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Semua</button>
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Trending</button>
                    <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Belum Terjawab</button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Topik</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Mata Kuliah</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Dibuat Oleh</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Tanggapan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Aktivitas Terakhir</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Status</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                @foreach ($topics as $topic)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-slate-800">{{ $topic['title'] }}</p>
                            <p class="text-xs text-slate-500">Thread ID: DSK-{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $topic['course'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $topic['created_by'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $topic['replies'] }} balasan</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $topic['last_activity'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $topicStatus = [
                                    'Trending' => 'bg-purple-100 text-purple-600',
                                    'Aktif' => 'bg-sky-100 text-sky-600',
                                ];
                            @endphp
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $topicStatus[$topic['status']] ?? 'bg-slate-100 text-slate-600' }}">
                                {{ $topic['status'] }}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 bg-slate-50/70 md:flex-row md:items-center md:justify-between">
            <p class="text-xs text-slate-500">Menampilkan {{ count($topics) }} topik terbaru.</p>
            <div class="flex items-center gap-2 text-xs text-slate-600">
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Sebelumnya</button>
                <span>Halaman 1 dari 5</span>
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Berikutnya</button>
            </div>
        </div>
    </section>
</div>
@endsection
