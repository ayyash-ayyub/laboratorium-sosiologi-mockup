@extends('management.layout')

@section('title', 'Daftar Konten Digital | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div class="space-y-2">
            <h1 class="text-2xl font-semibold text-slate-900">Daftar Konten Digital</h1>
            <p class="text-sm text-slate-600 max-w-2xl">
                Tinjau dan kelola seluruh konten digital yang telah diunggah. Gunakan filter untuk mencari konten
                berdasarkan status, jenis, atau visibilitas.
            </p>
        </div>
        <a href="{{ route('management.digital.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
            Tambah Konten Baru
        </a>
    </header>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-5">
            <h2 class="text-sm font-semibold text-slate-800">Filter & Pencarian</h2>
            <div class="mt-4 grid gap-4 md:grid-cols-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Kata Kunci</label>
                    <input type="text" placeholder="Cari judul, tag..."
                           class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Jenis</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>Semua</option>
                        <option>Video</option>
                        <option>Ebook</option>
                        <option>PDF</option>
                        <option>Artikel</option>
                        <option>Simulator</option>
                        <option>Audio</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Status</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>Semua</option>
                        <option>Draft</option>
                        <option>Published</option>
                        <option>Archived</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Visibilitas</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>Semua</option>
                        <option>Publik</option>
                        <option>Private</option>
                        <option>Internal Only</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Konten</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Jenis</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Kategori</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Tag</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Visibilitas</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Terakhir Diperbarui</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                @foreach ($contentItems as $item)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-slate-800">{{ $item['title'] }}</p>
                            <p class="text-xs text-slate-500">ID Konten: CNT-{{ str_pad($loop->iteration, 4, '0', STR_PAD_LEFT) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-600">{{ $item['type'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-700">{{ $item['category'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">
                            @foreach ($item['tags'] as $tag)
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-xs text-slate-500">{{ trim($tag) }}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'Draft' => 'bg-yellow-100 text-yellow-600',
                                    'Published' => 'bg-emerald-100 text-emerald-600',
                                    'Archived' => 'bg-slate-200 text-slate-600',
                                ];
                            @endphp
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusColors[$item['status']] ?? 'bg-slate-100 text-slate-600' }}">{{ $item['status'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $item['visibility'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $item['updated_at'] }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-800">Preview</button>
                                <button class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-800">Edit</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex flex-col gap-4 border-t border-slate-200 px-6 py-4 sm:flex-row sm:items-center sm:justify-between bg-slate-50/70">
            <p class="text-xs text-slate-500">Menampilkan {{ count($contentItems) }} konten dari total 24 konten.</p>
            <div class="flex items-center gap-2">
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-800">Sebelumnya</button>
                <span class="text-xs text-slate-500">Halaman 1 dari 3</span>
                <button class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-800">Berikutnya</button>
            </div>
        </div>
    </section>
</div>
@endsection
