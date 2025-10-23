@extends('management.layout')

@section('title', 'Laboratorium Sosiologi UT')

@section('content')
<div class="max-w-4xl">
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm p-8 sm:p-10 space-y-6">
        <div class="flex flex-col gap-2">
            <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.3em] text-sky-500">
                Selamat datang
            </span>
            <h1 class="text-3xl font-semibold text-slate-900">Laboratorium Digital Sosiologi</h1>
            <p class="text-sm leading-relaxed text-slate-600 max-w-2xl">
                Panel ini akan membantu Anda mengelola konten pembelajaran, event, diskusi, serta publikasi yang
                ada di Prodi Sosiologi Universitas Terbuka.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-5">
                <h2 class="text-sm font-semibold text-slate-700">Mulai dari sini</h2>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                    Lihat ringkasan event dan aktivitas terbaru atau gunakan menu di sebelah kiri untuk memulai
                    penambahan konten baru.
                </p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-5">
                <h2 class="text-sm font-semibold text-slate-700">Informasi</h2>
                <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                    Admin dapat membuat event baru, memperbarui materi digital, atau mengelola diskusi mahasiswa.
                    Fitur masih dalam tahap ujicoba
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
