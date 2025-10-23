@extends('management.layout')

@section('title', 'Tambah Event | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-10">
    <div>
        <h1 class="text-2xl font-semibold text-slate-900">Tambah Event</h1>
    </div>

    <div class="grid gap-8">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Informasi Dasar</h2>
                <p class="mt-1 text-sm text-slate-500">Ringkasan utama dan kategori event.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700">Nama Event</label>
                    <input type="text" placeholder="Contoh: Konferensi Nasional Sosiologi Terapan"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700">Deskripsi</label>
                    <textarea rows="4" placeholder="Gambarkan tujuan, tema, dan garis besar kegiatan."
                              class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Kategori Event</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Seminar</option>
                        <option>Workshop</option>
                        <option>Bootcamp</option>
                        <option>Diskusi Panel</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Program Studi Terkait</label>
                    <input type="text" placeholder="Contoh: Ilmu Sosiologi"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5 flex flex-col gap-1">
                <h2 class="text-lg font-semibold text-slate-800">Waktu & Tempat</h2>
                <p class="text-sm text-slate-500">Detail jadwal pelaksanaan dan format penyelenggaraan.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tanggal Mulai</label>
                    <input type="date"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tanggal Selesai</label>
                    <input type="date"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Waktu</label>
                    <input type="time"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Lokasi</label>
                    <input type="text" placeholder="Contoh: Auditorium UT Tangerang / Daring"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tipe Event</label>
                    <div class="mt-2 flex items-center gap-4">
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="event_type" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Online
                        </label>
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="event_type" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Offline
                        </label>
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                            <input type="radio" name="event_type" class="rounded border-slate-300 text-sky-500 focus:ring-sky-400">
                            Hybrid
                        </label>
                    </div>
                </div>
                <div class="md:col-span-2 grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Link Zoom / Streaming</label>
                        <input type="url" placeholder="https://ut.zoom.us/j/..."
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Embed Map (Offline)</label>
                        <input type="text" placeholder="https://maps.google.com/?q=Universitas+Terbuka"
                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Kapasitas & Harga</h2>
                <p class="mt-1 text-sm text-slate-500">Atur kuota peserta dan skema tiket.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Kuota Peserta</label>
                    <input type="number" min="0" placeholder="300"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Harga Tiket (Rp)</label>
                    <input type="number" min="0" placeholder="150000"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Diskon (%)</label>
                    <input type="number" min="0" max="100" placeholder="10"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Tipe Tiket</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Reguler</option>
                        <option>VIP</option>
                        <option>Mahasiswa</option>
                        <option>Khusus Undangan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Penyelenggara</h2>
                <p class="mt-1 text-sm text-slate-500">Profil singkat penyelenggara event.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Nama Penyelenggara</label>
                    <input type="text" placeholder="Laboratorium Digital Sosiologi UT"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Kontak</label>
                    <input type="text" placeholder="+62 812 3456 7890"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" placeholder="laboratorium.sosiologi@ecampus.ut.ac.id"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Website</label>
                    <input type="url" placeholder="https://sosiologi.ut.ac.id"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Media & Banner</h2>
                <p class="mt-1 text-sm text-slate-500">Unggah materi visual pendukung event.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-2">
                <div class="flex flex-col gap-3">
                    <label class="text-sm font-semibold text-slate-700">Poster Event</label>
                    <div class="flex items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-8">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            <p class="mt-3 text-sm text-slate-600">
                                Seret dan letakkan file poster di sini atau
                                <span class="text-sky-600 font-semibold">klik untuk mengunggah</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-sm font-semibold text-slate-700">Logo / Thumbnail</label>
                    <div class="flex items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-8">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0L21.75 21M18 13.5V6.75A2.25 2.25 0 0 0 15.75 4.5h-7.5A2.25 2.25 0 0 0 6 6.75V18"/>
                            </svg>
                            <p class="mt-3 text-sm text-slate-600">
                                Format disarankan PNG atau SVG berukuran 1:1
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-800">Pengaturan Tambahan</h2>
                <p class="mt-1 text-sm text-slate-500">Konfigurasi status dan alur registrasi.</p>
            </div>
            <div class="px-6 py-6 grid gap-6 md:grid-cols-3">
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Status Event</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Draft</option>
                        <option>Publish</option>
                        <option>Arsip</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Batas Registrasi</label>
                    <input type="date"
                           class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Notifikasi Email</label>
                    <select class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                        <option>Hanya Pengingat</option>
                    </select>
                </div>
                <div class="md:col-span-3">
                    <label class="block text-sm font-semibold text-slate-700">Catatan Internal</label>
                    <textarea rows="3" placeholder="Tambahkan info tambahan untuk tim internal."
                              class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200"></textarea>
                </div>
            </div>
            <div class="border-t border-slate-200 px-6 py-4 flex flex-wrap gap-3 justify-end bg-slate-50/80 rounded-b-2xl">
                <button class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800 hover:border-slate-300">
                    Simpan sebagai Draft
                </button>
                <button class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
                    Publikasikan Event
                </button>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <div class="border-b border-slate-200 px-6 py-5 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-800">Event Aktif Universitas Terbuka</h2>
            </div>
            <button class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-slate-300 hover:text-slate-900">
                Ekspor CSV
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Nama Event</th>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Tanggal</th>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Lokasi</th>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Kuota</th>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Status</th>
                    <th class="px-6 py-3 text-left font-semibold text-slate-600 uppercase text-xs">Penyelenggara</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                <tr>
                    <td class="px-6 py-4">
                        <p class="font-semibold text-slate-800">Forum Nasional Sosiologi Digital 2024</p>
                        <p class="text-xs text-slate-500">Kategori: Seminar</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">12 - 13 Juni 2024</p>
                        <p class="text-xs text-slate-500">08.00 - 16.00 WIB</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">Auditorium UT Pusat</p>
                        <p class="text-xs text-slate-500">Hybrid</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">250 Peserta</p>
                        <p class="text-xs text-emerald-500">Tersisa 48 kursi</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-600">Publish</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">Laboratorium Digital Sosiologi</p>
                        <p class="text-xs text-slate-500">laboratorium.sosiologi@ecampus.ut.ac.id</p>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <p class="font-semibold text-slate-800">Workshop Analitik Media Sosial</p>
                        <p class="text-xs text-slate-500">Kategori: Workshop</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">22 Juni 2024</p>
                        <p class="text-xs text-slate-500">09.00 - 14.00 WIB</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">Zoom Meeting</p>
                        <p class="text-xs text-slate-500">Online</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">150 Peserta</p>
                        <p class="text-xs text-emerald-500">Tersisa 75 kursi</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-600">Draft</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">Fakultas Ilmu Sosial & Ilmu Politik</p>
                        <p class="text-xs text-slate-500">fisip@ecampus.ut.ac.id</p>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        <p class="font-semibold text-slate-800">Kuliah Umum Kebijakan Publik Terbuka</p>
                        <p class="text-xs text-slate-500">Kategori: Diskusi Panel</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">5 Juli 2024</p>
                        <p class="text-xs text-slate-500">13.00 - 15.00 WIB</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">UT Convention Center</p>
                        <p class="text-xs text-slate-500">Offline</p>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">500 Peserta</p>
                        <p class="text-xs text-rose-500">Penuh</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-600">Publish</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-slate-700">Direktorat Kemahasiswaan UT</p>
                        <p class="text-xs text-slate-500">kemahasiswaan@ecampus.ut.ac.id</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
