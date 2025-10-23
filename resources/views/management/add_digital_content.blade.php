@extends('management.layout')

@section('title', 'Tambah Konten Digital | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-10">
    <header class="space-y-3">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center justify-center rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-600 uppercase tracking-[0.3em]">
                Konten Digital
            </span>
            <span class="hidden sm:block h-px flex-1 bg-slate-200"></span>
        </div>
        <div class="space-y-2">
            <h1 class="text-2xl sm:text-3xl font-semibold text-slate-900">Learning Resource Management Form</h1>
        </div>
    </header>

    <section class="space-y-6">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Informasi Umum</h2>
                <p class="mt-1 text-sm text-slate-500">Detail dasar yang dibutuhkan untuk semua jenis konten.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 lg:grid-cols-2">
                <div class="lg:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700">Judul Konten</label>
                    <input type="text" placeholder="Contoh: Pengantar Metodologi Penelitian Sosiologi"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div>
                <div class="lg:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                    <textarea rows="4" placeholder="Ringkasan konten, tujuan pembelajaran, dan hasil yang diharapkan."
                              class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Kategori</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>Teori Sosiologi</option>
                        <option>Metodologi</option>
                        <option>Pendidikan Terbuka</option>
                        <option>Analisis Sosial</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tag</label>
                    <input type="text" placeholder="Contoh: #digital-learning, #sosiologi-lingkungan"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tingkat Kesulitan</label>
                    <div class="mt-2 flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="difficulty" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Beginner
                        </label>
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="difficulty" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Intermediate
                        </label>
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="difficulty" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Advanced
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Jenis Konten</label>
                    <select id="contentType" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option value="video">Video</option>
                        <option value="ebook">Ebook</option>
                        <option value="pdf">PDF</option>
                        <option value="artikel">Artikel</option>
                        <option value="simulator">Simulator</option>
                        <option value="audio">Audio</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">Detail Konten Spesifik</h2>
                    <p class="mt-1 text-sm text-slate-500">Field dinamis berdasarkan jenis konten yang dipilih.</p>
                </div>
                <span id="contentTypeLabel" class="inline-flex items-center gap-2 rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-600 uppercase tracking-[0.2em]">
                    Video
                </span>
            </div>
            <div class="px-6 py-6 space-y-6">
                <div data-content-panel="video" class="content-panel space-y-4">
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">URL Video</label>
                            <input type="url" placeholder="https://youtu.be/..."
                                   class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Upload File Video</label>
                            <input type="file" accept="video/*"
                                   class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Durasi Video (menit)</label>
                        <input type="number" min="0" placeholder="45"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                    </div>
                </div>

                <div data-content-panel="ebook" class="content-panel space-y-4 hidden">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Upload File Ebook (EPUB/PDF)</label>
                        <input type="file" accept=".epub,.pdf"
                               class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Jumlah Halaman</label>
                            <input type="number" min="0" placeholder="120"
                                   class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Format</label>
                            <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                                <option>EPUB</option>
                                <option>PDF</option>
                                <option>MOBI</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div data-content-panel="pdf" class="content-panel space-y-4 hidden">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Upload File PDF</label>
                        <input type="file" accept=".pdf"
                               class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Versi Dokumen</label>
                        <input type="text" placeholder="v1.2"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                    </div>
                </div>

                <div data-content-panel="artikel" class="content-panel space-y-4 hidden">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Konten Artikel</label>
                        <div class="mt-2 rounded-2xl border border-slate-200 bg-slate-50/60">
                            <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 px-4 py-2 text-xs text-slate-500">
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Bold</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Italic</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Heading</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Bullet</button>
                                <button type="button" class="rounded-md px-2 py-1 hover:bg-slate-100">Link</button>
                            </div>
                            <textarea rows="8" placeholder="Tulis atau tempel konten artikel di sini..."
                                      class="w-full resize-none border-0 bg-transparent px-4 py-3 text-sm text-slate-700 focus:ring-0"></textarea>
                        </div>
                    </div>
                </div>

                <div data-content-panel="simulator" class="content-panel space-y-4 hidden">
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Embed Link Simulator</label>
                            <input type="url" placeholder="https://simulator.ut.ac.id/embed/..."
                                   class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Upload File ZIP</label>
                            <input type="file" accept=".zip"
                                   class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Durasi Interaksi (menit)</label>
                        <input type="number" min="0" placeholder="30"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                    </div>
                </div>

                <div data-content-panel="audio" class="content-panel space-y-4 hidden">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Upload File Audio</label>
                        <input type="file" accept="audio/*"
                               class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Durasi Audio (menit)</label>
                        <input type="number" min="0" placeholder="25"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="grid gap-8 lg:grid-cols-[2fr,1fr]">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Metadata & Kredensial</h2>
                <p class="mt-1 text-sm text-slate-500">Informasi tambahan untuk katalog dan pencarian.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Bahasa</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>Bahasa Indonesia</option>
                        <option>English</option>
                        <option>Mandarin</option>
                        <option>Arab</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Penulis / Narasumber</label>
                    <input type="text" placeholder="Dr. Rani Wijayanti, M.Si"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tanggal Publikasi</label>
                    <input type="date"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Lisensi</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                        <option>CC BY</option>
                        <option>CC BY-SA</option>
                        <option>CC BY-NC</option>
                        <option>Hak Cipta UT</option>
                    </select>
                </div>
                {{-- <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700">Durasi / Perkiraan Waktu (menit)</label>
                    <input type="number" min="0" placeholder="45"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200" />
                </div> --}}
            </div>
        </div>

        <div class="flex flex-col gap-8">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-slate-800">Thumbnail / Poster</h2>
                    <p class="mt-1 text-sm text-slate-500">Unggah visual representatif untuk katalog konten.</p>
                </div>
                <div class="px-6 py-6">
                    <label class="flex flex-col items-center justify-center gap-3 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0L21.75 21M18 13.5V6.75A2.25 2.25 0 0 0 15.75 4.5h-7.5A2.25 2.25 0 0 0 6 6.75V18" />
                        </svg>
                        <div class="space-y-1">
                            <p class="text-sm font-medium text-slate-700">Seret file atau klik untuk mengunggah</p>
                            <p class="text-xs text-slate-500">PNG, JPG, SVG • Max 5MB</p>
                        </div>
                        <input type="file" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-slate-800">Status & Visibilitas</h2>
                    <p class="mt-1 text-sm text-slate-500">Atur perilaku publikasi konten.</p>
                </div>
                <div class="px-6 py-6 space-y-6">
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Status Konten</label>
                            <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                                <option>Draft</option>
                                <option>Published</option>
                                <option>Archived</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Visibilitas</label>
                            <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus-visible:border-sky-400 focus-visible:ring-2 focus-visible:ring-sky-200">
                                <option>Publik</option>
                                <option>Private</option>
                                <option>Internal Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-sky-100 bg-sky-50/60 px-4 py-4 text-xs text-slate-600">
                        <p class="font-semibold text-slate-700">Catatan:</p>
                        <p class="mt-1">
                            Sistem mendukung validasi dinamis dan integrasi penyimpanan. Tambahkan modul upload/preview
                            sesuai kebutuhan (mis. penyimpanan lokal atau cloud).
                        </p>
                    </div>
                </div>
                <div class="border-t border-slate-200 px-6 py-4 bg-slate-50/80 rounded-b-2xl flex flex-wrap gap-3 justify-end">
                    <button class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800 hover:border-slate-300">
                        Simpan Draft
                    </button>
                    <button class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
                        Publikasikan Konten
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const contentTypeSelect = document.getElementById('contentType');
        const contentPanels = document.querySelectorAll('[data-content-panel]');
        const contentTypeLabel = document.getElementById('contentTypeLabel');

        const panelTitles = {
            video: 'Video',
            ebook: 'Ebook',
            pdf: 'PDF',
            artikel: 'Artikel',
            simulator: 'Simulator',
            audio: 'Audio'
        };

        const updateContentPanel = (type) => {
            contentPanels.forEach((panel) => {
                panel.classList.toggle('hidden', panel.dataset.contentPanel !== type);
            });

            contentTypeLabel.textContent = panelTitles[type] || 'Konten';
        };

        contentTypeSelect?.addEventListener('change', (event) => {
            updateContentPanel(event.target.value);
        });

        updateContentPanel(contentTypeSelect?.value || 'video');
    });
</script>
@endpush
@endsection
