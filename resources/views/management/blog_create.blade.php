@extends('management.layout')

@section('title', 'Tambah Blog | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-10">
    <header class="space-y-2">
        <h1 class="text-2xl font-semibold text-slate-900">Tambah Artikel Blog</h1>
    </header>

    <section class="grid gap-8 lg:grid-cols-[2fr,1fr]">
        <div class="space-y-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-slate-800">Konten Utama</h2>
                    <p class="mt-1 text-sm text-slate-500">Judul, slug, dan isi blog.</p>
                </div>
                <div class="px-6 py-6 space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Judul Artikel</label>
                        <input type="text" placeholder="Contoh: Sosiologi Digital dan Pembelajaran Terbuka"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Slug</label>
                        <input type="text" placeholder="sosiologi-digital-pembelajaran-terbuka"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Ringkasan Pendek</label>
                        <textarea rows="3" placeholder="Tuliskan gambaran singkat artikel untuk halaman daftar blog."
                                  class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Konten</label>
                        <div class="mt-2 rounded-2xl border border-slate-200 bg-slate-50/60">
                            <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Paragraph</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Heading 2</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Bold</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Bullet List</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Quote</button>
                            </div>
                            <textarea rows="12" placeholder="Tulis artikel di sini..."
                                      class="w-full resize-none border-0 bg-transparent px-4 py-3 text-sm text-slate-700 focus:ring-0"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-slate-800">Metadata & SEO</h2>
                </div>
                <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Kategori</label>
                        <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                            <option>Sosiologi Digital</option>
                            <option>Metodologi</option>
                            <option>Pendidikan Terbuka</option>
                            <option>Statistika Sosial</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tag</label>
                        <input type="text" placeholder="#pembelajaran, #digital"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Penulis</label>
                        <input type="text" placeholder="Nama Penulis"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tanggal Publikasi</label>
                        <input type="datetime-local"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700">Deskripsi Meta</label>
                        <textarea rows="2" placeholder="Deskripsi untuk SEO dan media sosial."
                                  class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <aside class="space-y-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <h2 class="text-sm font-semibold text-slate-800">Status & Visibilitas</h2>
                </div>
                <div class="px-6 py-5 space-y-4 text-sm text-slate-600">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Status</label>
                        <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                            <option>Draft</option>
                            <option>Published</option>
                            <option>Scheduled</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Visibilitas</label>
                        <select class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                            <option>Publik</option>
                            <option>Private</option>
                            <option>Internal</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Thumbnail</label>
                        <label class="mt-2 flex flex-col items-center justify-center gap-2 rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-3-9-6-6m0 0-6 6m6-6V15" />
                            </svg>
                            <p class="text-xs text-slate-600">Tarik file atau klik untuk upload (PNG/JPG)</p>
                            <input type="file" accept="image/*" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="border-t border-slate-200 px-6 py-4 flex flex-col gap-3">
                    <button class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-800">
                        Simpan Draft
                    </button>
                    <button class="rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
                        Publikasikan
                    </button>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <h2 class="text-sm font-semibold text-slate-800">Checklist Pra-Publikasi</h2>
                </div>
                <ul class="px-6 py-5 space-y-3 text-xs text-slate-600">
                    <li class="flex items-center gap-2">
                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full border border-slate-300">1</span>
                        Judul dan slug sudah final
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full border border-slate-300">2</span>
                        Konten telah direview editor
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full border border-slate-300">3</span>
                        Thumbnail dan metadata terisi
                    </li>
                </ul>
            </div>
        </aside>
    </section>
</div>
@endsection
