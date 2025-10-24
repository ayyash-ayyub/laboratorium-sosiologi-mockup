@extends('management.layout')

@section('title', 'Publikasi User | Laboratorium Sosiologi UT')

@section('content')
<div class="space-y-8">
    <header class="flex flex-col gap-2">
        <h1 class="text-2xl font-semibold text-slate-900">Publikasi User</h1>
        {{-- <p class="text-sm text-slate-600 max-w-3xl">
            Pilih jenis publikasi untuk menampilkan form yang sesuai. Untuk kategori lain, Anda dapat menambahkan field
            secara dinamis sesuai kebutuhan.
        </p> --}}
    </header>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-6 py-5">
            <h2 class="text-lg font-semibold text-slate-800">Jenis Publikasi</h2>
        </div>
        <div class="px-6 py-6 space-y-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700">Pilih Jenis</label>
                <select id="publicationType" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                    <option value="ilmiah">Publikasi Ilmiah</option>
                    {{-- <option value="artikel">Artikel</option> --}}
                    <option value="lainnya">Publikasi Lainnya</option>
                </select>
            </div>

                <div data-panel="ilmiah" class="space-y-4 type-panel">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Judul</label>
                        <input type="text" data-field="ilmiah-title" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Judul publikasi ilmiah">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tanggal Publikasi</label>
                        <input type="date" data-field="ilmiah-date" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Kategori</label>
                        <input type="text" data-field="ilmiah-category" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Contoh: Science, Social Research">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Link ke Publikasi</label>
                        <input type="url" data-field="ilmiah-link" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="https://">
                    </div>
                </div>

                <div data-panel="artikel" class="space-y-4 type-panel hidden">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Judul Artikel</label>
                        <input type="text" data-field="artikel-title" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Judul artikel">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Kategori Artikel</label>
                        <input type="text" data-field="artikel-category" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Contoh: Opini, Analisis, Review">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Isi Artikel</label>
                        <textarea rows="6" data-field="artikel-content" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Masukkan konten artikel"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Upload Gambar/PDF</label>
                        <input type="file" data-field="artikel-file" accept="image/*,.pdf" class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:text-sky-700 hover:file:bg-sky-200" />
                    </div>
                </div>

                <div data-panel="lainnya" class="space-y-4 type-panel hidden">
                    <p class="text-sm text-slate-600">Tambahkan field sesuai atribut publikasi yang dibutuhkan.</p>
                <div id="customFieldList" class="space-y-4"></div>
                <button type="button" id="addCustomField"
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800 hover:border-slate-300">
                    Tambah Field
                </button>
            </div>
        </div>
    </section>

    <div class="flex justify-end">
        <button id="savePublication" class="inline-flex items-center gap-2 rounded-xl bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 shadow-sm">
            Simpan Publikasi
        </button>
    </div>

    <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <div class="border-b border-slate-200 px-6 py-5 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-slate-800">Daftar Publikasi Sementara</h2>
                <p class="text-xs text-slate-500">Data mockup tersimpan di local storage browser.</p>
            </div>
            <button id="clearPublications" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 px-4 py-2 text-xs font-semibold text-rose-600 hover:border-rose-300 hover:text-rose-700">
                Kosongkan Data
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 text-sm" id="publicationTable">
                <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Jenis</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Judul/Field Utama</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Kategori</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Tanggal/Link</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase tracking-[0.2em] text-xs text-slate-500">Detail</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white" id="publicationTableBody">
                </tbody>
            </table>
        </div>
    </section>
</div>

<div id="publicationModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 px-4">
    <div class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
            <h3 id="publicationModalTitle" class="text-lg font-semibold text-slate-800">Detail Publikasi</h3>
            <button type="button" id="closePublicationModal" class="text-slate-400 hover:text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div id="publicationModalBody" class="px-6 py-5 space-y-4 max-h-[60vh] overflow-y-auto"></div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const typeSelect = document.getElementById('publicationType');
        const panels = document.querySelectorAll('.type-panel');
        const customFieldList = document.getElementById('customFieldList');
        const addFieldBtn = document.getElementById('addCustomField');
        const saveBtn = document.getElementById('savePublication');
        const clearBtn = document.getElementById('clearPublications');
        const tableBody = document.getElementById('publicationTableBody');

        const STORAGE_KEY = 'sosiologi_publications';

        const updatePanels = (value) => {
            panels.forEach((panel) => {
                panel.classList.toggle('hidden', panel.dataset.panel !== value);
            });
        };

        const createFieldRow = (index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'rounded-2xl border border-slate-200 px-4 py-4 space-y-3 bg-white/60';
            wrapper.dataset.customFieldRow = index;

            const labelGroup = document.createElement('div');
            labelGroup.innerHTML = `
                <label class="block text-sm font-semibold text-slate-700">Nama Field</label>
                <input type="text" data-custom-field="name" class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Contoh: Judul" />
            `;

            const valueGroup = document.createElement('div');
            valueGroup.innerHTML = `
                <label class="block text-sm font-semibold text-slate-700">Nilai Field</label>
                <textarea rows="3" data-custom-field="value" class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-sky-400 focus:ring-2 focus:ring-sky-200" placeholder="Isi field"></textarea>
            `;

            const actions = document.createElement('div');
            actions.className = 'flex justify-end';
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'text-sm text-rose-600 hover:text-rose-700';
            removeBtn.textContent = 'Hapus Field';
            removeBtn.addEventListener('click', () => wrapper.remove());
            actions.appendChild(removeBtn);

            wrapper.appendChild(labelGroup);
            wrapper.appendChild(valueGroup);
            wrapper.appendChild(actions);

            return wrapper;
        };

        addFieldBtn?.addEventListener('click', () => {
            customFieldList.appendChild(createFieldRow(customFieldList.children.length));
        });

        typeSelect?.addEventListener('change', (event) => updatePanels(event.target.value));

        const loadPublications = () => {
            const raw = localStorage.getItem(STORAGE_KEY);
            try {
                return raw ? JSON.parse(raw) : [];
            } catch (error) {
                console.warn('Gagal parse data publikasi', error);
                return [];
            }
        };

        const savePublications = (data) => {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
        };

        const normalizeText = (value) => (value || '').trim();

        const panelsMap = {
            ilmiah: document.querySelector('[data-panel="ilmiah"]'),
            artikel: document.querySelector('[data-panel="artikel"]'),
            lainnya: document.querySelector('[data-panel="lainnya"]'),
        };

        const gatherData = () => {
            const type = typeSelect.value;
            const item = {
                type,
                createdAt: new Date().toISOString(),
            };

            if (type === 'ilmiah') {
                const panel = panelsMap.ilmiah;
                const title = normalizeText(panel.querySelector('[data-field="ilmiah-title"]')?.value);
                const date = panel.querySelector('[data-field="ilmiah-date"]')?.value || '';
                const category = normalizeText(panel.querySelector('[data-field="ilmiah-category"]')?.value);
                const link = normalizeText(panel.querySelector('[data-field="ilmiah-link"]')?.value);

                item.typeLabel = 'Publikasi Ilmiah';
                item.title = title || '-';
                item.category = category || '-';
                item.dateOrLink = [date, link].filter(Boolean).join(' | ') || '-';
                item.detailFields = [
                    { label: 'Judul', value: title },
                    { label: 'Tanggal Publikasi', value: date },
                    { label: 'Kategori', value: category },
                    { label: 'Link Publikasi', value: link, isLink: true },
                ];
            } else if (type === 'artikel') {
                const panel = panelsMap.artikel;
                const title = normalizeText(panel.querySelector('[data-field="artikel-title"]')?.value);
                const category = normalizeText(panel.querySelector('[data-field="artikel-category"]')?.value);
                const content = normalizeText(panel.querySelector('[data-field="artikel-content"]')?.value);
                const fileInput = panel.querySelector('[data-field="artikel-file"]');
                const fileName = fileInput?.files?.[0]?.name || '';

                item.typeLabel = 'Artikel';
                item.title = title || '-';
                item.category = category || '-';
                item.dateOrLink = fileName || '-';
                item.detailFields = [
                    { label: 'Judul', value: title },
                    { label: 'Kategori', value: category },
                    { label: 'Isi Artikel', value: content },
                    { label: 'File', value: fileName },
                ];
            } else {
                const rows = Array.from(customFieldList.children);
                const detailFields = rows.map((row, index) => {
                    const fieldName = normalizeText(row.querySelector('[data-custom-field="name"]')?.value) || `Field ${index + 1}`;
                    const fieldValue = normalizeText(row.querySelector('[data-custom-field="value"]')?.value);
                    return { label: fieldName, value: fieldValue };
                });

                if (!detailFields.length) {
                    detailFields.push({ label: 'Informasi', value: 'Belum ada field yang ditambahkan' });
                }

                item.typeLabel = 'Publikasi Lainnya';
                item.title = detailFields[0]?.value || '-';
                item.category = '-';
                item.dateOrLink = '-';
                item.detailFields = detailFields;
            }

            return item;
        };

        const modal = document.getElementById('publicationModal');
        const modalBody = document.getElementById('publicationModalBody');
        const modalTitle = document.getElementById('publicationModalTitle');
        const modalClose = document.getElementById('closePublicationModal');

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        };

        const escapeHtml = (input = '') => input.replace(/[&<>'"]/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            "'": '&#39;',
            '"': '&quot;',
        }[char] || char));

        const formatValue = (field) => {
            if (!field.value) {
                return '<span class="text-slate-400">-</span>';
            }
            if (field.isLink && field.value) {
                const safeUrl = /^https?:/i.test(field.value) ? field.value : `https://${field.value}`;
                const label = escapeHtml(field.value);
                return `<a href="${safeUrl}" target="_blank" rel="noopener" class="text-sky-600 hover:text-sky-700 underline">${label}</a>`;
            }
            return escapeHtml(field.value).replace(/\n/g, '<br>');
        };

        const openModal = (item) => {
            modalTitle.textContent = item.typeLabel || 'Detail Publikasi';
            modalBody.innerHTML = '';

            const fields = item.detailFields && item.detailFields.length
                ? item.detailFields
                : [{ label: 'Detail', value: item.extra || 'Tidak ada data tersedia.' }];

            fields.forEach((field) => {
                const block = document.createElement('div');
                block.className = 'space-y-1';
                block.innerHTML = `
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">${field.label}</p>
                    <p class="text-sm text-slate-700 leading-relaxed">${formatValue(field)}</p>
                `;
                modalBody.appendChild(block);
            });

            if (item.createdAt) {
                const footer = document.createElement('div');
                footer.className = 'pt-3 mt-3 border-t border-slate-200 text-xs text-slate-500';
                footer.textContent = `Disimpan: ${new Date(item.createdAt).toLocaleString('id-ID')}`;
                modalBody.appendChild(footer);
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        };

        modalClose?.addEventListener('click', closeModal);
        modal?.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        const renderTable = () => {
            const items = loadPublications();
            tableBody.innerHTML = '';

            if (!items.length) {
                const row = document.createElement('tr');
                row.innerHTML = '<td colspan="5" class="px-6 py-8 text-center text-sm text-slate-500">Belum ada data publikasi disimpan.</td>';
                tableBody.appendChild(row);
                return;
            }

            items.forEach((item, index) => {
                const row = document.createElement('tr');

                const fallbackLabel = item.type === 'artikel' ? 'Artikel' : item.type === 'ilmiah' ? 'Publikasi Ilmiah' : 'Publikasi Lainnya';
                const typeLabel = item.typeLabel || fallbackLabel;
                const titleText = item.title || '-';
                const categoryText = item.category || '-';
                const dateText = (item.dateOrLink || '-').replace(/^\s*\|\s*$/, '-');

                const typeCell = document.createElement('td');
                typeCell.className = 'px-6 py-4 text-sm font-medium text-slate-700';
                typeCell.textContent = typeLabel;

                const titleCell = document.createElement('td');
                titleCell.className = 'px-6 py-4 text-sm text-slate-600';
                titleCell.textContent = titleText;

                const categoryCell = document.createElement('td');
                categoryCell.className = 'px-6 py-4 text-sm text-slate-600';
                categoryCell.textContent = categoryText;

                const dateCell = document.createElement('td');
                dateCell.className = 'px-6 py-4 text-sm text-slate-600';
                dateCell.textContent = dateText || '-';

                const detailCell = document.createElement('td');
                detailCell.className = 'px-6 py-4 text-right';
                const detailBtn = document.createElement('button');
                detailBtn.type = 'button';
                detailBtn.dataset.detailIndex = String(index);
                detailBtn.className = 'inline-flex items-center justify-center rounded-full border border-slate-200 p-2 text-slate-500 hover:border-sky-200 hover:text-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-200';
                detailBtn.setAttribute('aria-label', 'Lihat detail publikasi');
                detailBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75 9.75 6.75 9.75 6.75-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5z" />
                    </svg>
                `;
                detailCell.appendChild(detailBtn);

                row.appendChild(typeCell);
                row.appendChild(titleCell);
                row.appendChild(categoryCell);
                row.appendChild(dateCell);
                row.appendChild(detailCell);

                tableBody.appendChild(row);
            });

            tableBody.querySelectorAll('[data-detail-index]').forEach((button) => {
                button.addEventListener('click', () => {
                    const items = loadPublications();
                    const item = items[Number(button.dataset.detailIndex)];
                    if (item) {
                        openModal(item);
                    }
                });
            });
        };

        const resetForm = () => {
            panelsMap.ilmiah?.querySelectorAll('input').forEach((input) => (input.value = ''));
            panelsMap.artikel?.querySelectorAll('input, textarea').forEach((input) => {
                if (input.type === 'file') {
                    input.value = '';
                } else {
                    input.value = '';
                }
            });
            customFieldList.innerHTML = '';
        };

        saveBtn?.addEventListener('click', () => {
            const items = loadPublications();
            items.unshift(gatherData());
            savePublications(items.slice(0, 10));
            renderTable();
            resetForm();
        });

        clearBtn?.addEventListener('click', () => {
            localStorage.removeItem(STORAGE_KEY);
            renderTable();
            closeModal();
        });

        updatePanels(typeSelect?.value || 'ilmiah');
        renderTable();
    });
</script>
@endpush
