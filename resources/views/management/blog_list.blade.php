@extends('management.layout')

@section('title', 'Daftar Blog | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Daftar Artikel Blog</h1>

        </div>
        <a href="{{ route('management.blog.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
            Tambah Artikel
        </a>
    </header>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-5">
            <div class="grid gap-4 md:grid-cols-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Kata Kunci</label>
                    <input type="text" placeholder="Cari judul/tags"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Kategori</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Semua</option>
                        <option>Sosiologi Digital</option>
                        <option>Metodologi</option>
                        <option>Pendidikan Terbuka</option>
                        <option>Statistika Sosial</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Status</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Semua</option>
                        <option>Draft</option>
                        <option>Published</option>
                        <option>Scheduled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Urutkan</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>Terpopuler</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Judul</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Penulis</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Kategori</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Tags</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Publikasi</th>
                    <th class="px-6 py-3 text-right font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Views</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                @foreach ($blogs as $blog)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-slate-800">{{ $blog['title'] }}</p>
                            <p class="text-xs text-slate-500">BLOG-{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $blog['author'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $blog['category'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $color = [
                                    'Draft' => 'bg-yellow-100 text-yellow-600',
                                    'Published' => 'bg-emerald-100 text-emerald-600',
                                    'Scheduled' => 'bg-sky-100 text-sky-600',
                                ][$blog['status']] ?? 'bg-slate-100 text-slate-600';
                            @endphp
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $color }}">{{ $blog['status'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            @foreach ($blog['tags'] as $tag)
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-xs text-slate-500">#{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $blog['published_at'] }}</td>
                        <td class="px-6 py-4 text-right text-sm font-semibold text-slate-700">{{ number_format($blog['views']) }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex items-center gap-2 text-xs text-slate-500">
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Preview</button>
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 bg-slate-50/70 md:flex-row md:items-center md:justify-between">
            <p class="text-xs text-slate-500">Menampilkan {{ count($blogs) }} artikel.</p>
            <div class="flex items-center gap-2 text-xs text-slate-600">
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Sebelumnya</button>
                <span>Halaman 1 dari 2</span>
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 hover:border-slate-300 hover:text-slate-800">Berikutnya</button>
            </div>
        </div>
    </section>
</div>
@endsection
