<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    private string $dataPath = 'mock/credentials.json';

    public function showLogin(Request $request)
    {
        if ($request->session()->get('authenticated')) {
            return redirect()->route('management');
        }

        return view('welcome', [
            'strings' => $this->loadStrings(),
            'error' => session()->pull('auth_error'),
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $username = trim((string) $request->input('username'));
        $password = (string) $request->input('password');

        foreach ($this->loadUsers() as $user) {
            if (
                ($user['username'] ?? null) === $username &&
                ($user['password'] ?? null) === $password
            ) {
                $request->session()->put('authenticated', true);
                $request->session()->put('username', $user['username']);
                $request->session()->put('display_name', $user['name'] ?? $user['username']);

                return redirect()->route('management');
            }
        }

        return redirect()
            ->route('login')
            ->with('auth_error', 'Username atau password tidak sesuai.');
    }

    public function managementContent(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        return $this->renderManagement(
            $request,
            'management.dashboard',
            [],
            'dashboard'
        );
    }

    public function addEvent(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        return $this->renderManagement(
            $request,
            'management.add_event',
            [],
            'add-event'
        );
    }

    public function addDigitalContent(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        return $this->renderManagement(
            $request,
            'management.add_digital_content',
            [],
            'add-digital-content'
        );
    }

    public function listDigitalContent(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        $dummyContent = [
            [
                'title' => 'Pengantar Metodologi Penelitian Sosial',
                'type' => 'PDF',
                'category' => 'Metodologi',
                'tags' => [' penelitian', ' dasar'],
                'status' => 'Published',
                'visibility' => 'Publik',
                'updated_at' => '05/06/2024 14:32',
            ],
            [
                'title' => 'Video Kuliah: Struktur Sosial Indonesia',
                'type' => 'Video',
                'category' => 'Teori Sosiologi',
                'tags' => [' kuliah', ' UT'],
                'status' => 'Draft',
                'visibility' => 'Internal Only',
                'updated_at' => '01/06/2024 09:10',
            ],
            [
                'title' => 'Simulator Interaktif: Analisis Jaringan Sosial',
                'type' => 'Simulator',
                'category' => 'Analisis Sosial',
                'tags' => [' interaktif', ' analitik'],
                'status' => 'Published',
                'visibility' => 'Private',
                'updated_at' => '28/05/2024 11:45',
            ],
            [
                'title' => 'Artikel: Pendidikan Terbuka di Era Digital',
                'type' => 'Artikel',
                'category' => 'Pendidikan Terbuka',
                'tags' => [' artikel', ' opini'],
                'status' => 'Archived',
                'visibility' => 'Publik',
                'updated_at' => '20/05/2024 16:05',
            ],
        ];

        return $this->renderManagement(
            $request,
            'management.list_digital_content',
            ['contentItems' => $dummyContent],
            'digital-list'
        );
    }

    public function discussionForum(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        $topics = [
            [
                'title' => 'Analisis Struktur Sosial Komunitas Perkotaan',
                'course' => 'SOSI4312 - Struktur Sosial',
                'created_by' => 'Rahmawati Putri',
                'replies' => 24,
                'last_activity' => '09/06/2024 21:15',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Metode Penelitian Kualitatif: Studi Kasus di UT',
                'course' => 'SOSI4214 - Metodologi Penelitian',
                'created_by' => 'Aditya Nugroho',
                'replies' => 18,
                'last_activity' => '09/06/2024 19:40',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Peran Pendidikan Terbuka dalam Mobilitas Sosial',
                'course' => 'SOSI4408 - Pendidikan Terbuka',
                'created_by' => 'Devi Lestari',
                'replies' => 32,
                'last_activity' => '08/06/2024 14:05',
                'status' => 'Trending',
            ],
            [
                'title' => 'Diskusi Data Statistik Sosial 2024',
                'course' => 'SOSI4301 - Statistika Sosial',
                'created_by' => 'Rizky Dwipa',
                'replies' => 12,
                'last_activity' => '08/06/2024 10:22',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Kajian Gender dan Kesejahteraan di Desa Binaan UT',
                'course' => 'SOSI4415 - Gender dan Masyarakat',
                'created_by' => 'Mira Sulastri',
                'replies' => 15,
                'last_activity' => '07/06/2024 17:58',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Teori Konflik dalam Konteks Politik Lokal',
                'course' => 'SOSI4308 - Teori Sosiologi Modern',
                'created_by' => 'Yusuf Hidayat',
                'replies' => 28,
                'last_activity' => '07/06/2024 09:30',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Implementasi E-Learning pada Komunitas Terpencil',
                'course' => 'SOSI4410 - Sosiologi Pendidikan',
                'created_by' => 'Nadia Ayu',
                'replies' => 21,
                'last_activity' => '06/06/2024 22:14',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Diskusi Buku: Sosiologi Digital dan Transformasi Sosial',
                'course' => 'SOSI4420 - Sosiologi Digital',
                'created_by' => 'Fajar Prasetyo',
                'replies' => 19,
                'last_activity' => '06/06/2024 18:47',
                'status' => 'Trending',
            ],
            [
                'title' => 'Studi Etnografi Mahasiswa UT di Kalimantan',
                'course' => 'SOSI4213 - Etnografi',
                'created_by' => 'Indri Handayani',
                'replies' => 8,
                'last_activity' => '05/06/2024 11:02',
                'status' => 'Aktif',
            ],
            [
                'title' => 'Pengaruh Media Sosial terhadap Partisipasi Komunitas',
                'course' => 'SOSI4405 - Media dan Masyarakat',
                'created_by' => 'Galih Pradana',
                'replies' => 26,
                'last_activity' => '05/06/2024 08:55',
                'status' => 'Aktif',
            ],
        ];

        return $this->renderManagement(
            $request,
            'management.discussions_forum',
            ['topics' => $topics],
            'discussions-forum'
        );
    }

    public function discussionModeration(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        $reports = [
            [
                'topic' => 'Analisis Struktur Sosial Komunitas Perkotaan',
                'reporter' => 'Linda Wulandari',
                'reason' => 'Bahasa kurang sopan pada balasan #17',
                'reported_by' => 'Mahasiswa',
                'submitted_at' => '09/06/2024 20:05',
                'status' => 'Menunggu',
            ],
            [
                'topic' => 'Teori Konflik dalam Konteks Politik Lokal',
                'reporter' => 'Admin Program',
                'reason' => 'Konten promosi di luar topik',
                'reported_by' => 'Moderator',
                'submitted_at' => '08/06/2024 15:42',
                'status' => 'Dalam Review',
            ],
            [
                'topic' => 'Diskusi Buku: Sosiologi Digital dan Transformasi Sosial',
                'reporter' => 'Budi Santoso',
                'reason' => 'Duplikasi topik sejenis minggu lalu',
                'reported_by' => 'Mahasiswa',
                'submitted_at' => '07/06/2024 19:28',
                'status' => 'Menunggu',
            ],
            [
                'topic' => 'Studi Etnografi Mahasiswa UT di Kalimantan',
                'reporter' => 'Ketua Kelas',
                'reason' => 'Butuh verifikasi data sebelum dipublikasikan',
                'reported_by' => 'Moderator',
                'submitted_at' => '07/06/2024 09:55',
                'status' => 'Ditindaklanjuti',
            ],
            [
                'topic' => 'Pengaruh Media Sosial terhadap Partisipasi Komunitas',
                'reporter' => 'Admin Fakultas',
                'reason' => 'Permintaan sanitasi tautan eksternal',
                'reported_by' => 'Moderator',
                'submitted_at' => '06/06/2024 21:48',
                'status' => 'Menunggu',
            ],
            [
                'topic' => 'Implementasi E-Learning pada Komunitas Terpencil',
                'reporter' => 'Siti Aisyah',
                'reason' => 'Lampiran tidak dapat diakses',
                'reported_by' => 'Mahasiswa',
                'submitted_at' => '06/06/2024 13:17',
                'status' => 'Ditindaklanjuti',
            ],
            [
                'topic' => 'Diskusi Data Statistik Sosial 2024',
                'reporter' => 'Admin Program',
                'reason' => 'Perlu penyamaan format data',
                'reported_by' => 'Moderator',
                'submitted_at' => '05/06/2024 18:35',
                'status' => 'Selesai',
            ],
            [
                'topic' => 'Peran Pendidikan Terbuka dalam Mobilitas Sosial',
                'reporter' => 'Hani Nurul',
                'reason' => 'Pertanyaan ganda yang sama',
                'reported_by' => 'Mahasiswa',
                'submitted_at' => '05/06/2024 14:11',
                'status' => 'Selesai',
            ],
            [
                'topic' => 'Kajian Gender dan Kesejahteraan di Desa Binaan UT',
                'reporter' => 'Admin Fakultas',
                'reason' => 'Butuh konfirmasi rujukan literatur',
                'reported_by' => 'Moderator',
                'submitted_at' => '04/06/2024 16:44',
                'status' => 'Dalam Review',
            ],
            [
                'topic' => 'Metode Penelitian Kualitatif: Studi Kasus di UT',
                'reporter' => 'Admin Program',
                'reason' => 'Identifikasi plagiarisme potensial',
                'reported_by' => 'Moderator',
                'submitted_at' => '03/06/2024 10:05',
                'status' => 'Menunggu',
            ],
        ];

        return $this->renderManagement(
            $request,
            'management.discussions_moderation',
            ['reports' => $reports],
            'discussions-moderation'
        );
    }

    public function blogCreate(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        return $this->renderManagement(
            $request,
            'management.blog_create',
            [],
            'blog-add'
        );
    }

    public function blogIndex(Request $request)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect()->route('login');
        }

        $blogs = [
            [
                'title' => 'Menggagas Sosiologi Digital di Universitas Terbuka',
                'author' => 'Laboratorium Sosiologi',
                'status' => 'Published',
                'category' => 'Sosiologi Digital',
                'tags' => ['digital', 'transformasi'],
                'published_at' => '02/06/2024 10:00',
                'views' => 1240,
            ],
            [
                'title' => 'Belajar Mandiri: Strategi Mahasiswa UT di Daerah 3T',
                'author' => 'Rahmi Fauziah',
                'status' => 'Published',
                'category' => 'Pendidikan Terbuka',
                'tags' => ['belajar', 'inovasi'],
                'published_at' => '28/05/2024 08:30',
                'views' => 980,
            ],
            [
                'title' => 'Catatan Lapangan: Etnografi Komunitas Virtual UT',
                'author' => 'Aditya Nugraha',
                'status' => 'Draft',
                'category' => 'Metodologi',
                'tags' => ['etnografi', 'komunitas'],
                'published_at' => '-'
                ,
                'views' => 0,
            ],
            [
                'title' => 'Membaca Data Sosial: Tantangan Statistik di Era Digital',
                'author' => 'Tim Statistika Sosial',
                'status' => 'Published',
                'category' => 'Statistika Sosial',
                'tags' => ['data', 'analitik'],
                'published_at' => '21/05/2024 14:55',
                'views' => 1125,
            ],
            [
                'title' => 'Pemberdayaan Desa Melalui Pendidikan Terbuka',
                'author' => 'Dewi Lestari',
                'status' => 'Scheduled',
                'category' => 'Pemberdayaan',
                'tags' => ['desa', 'pendidikan'],
                'published_at' => '15/06/2024 09:00',
                'views' => 0,
            ],
            [
                'title' => 'Podcast Sosiologi: Kolaborasi Dosen dan Mahasiswa',
                'author' => 'Media Sosiologi',
                'status' => 'Published',
                'category' => 'Media Sosial',
                'tags' => ['podcast', 'kolaborasi'],
                'published_at' => '12/05/2024 19:20',
                'views' => 760,
            ],
        ];

        return $this->renderManagement(
            $request,
            'management.blog_list',
            ['blogs' => $blogs],
            'blog-list'
        );
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function loadUsers(): array
    {
        $data = $this->loadData();

        return $data['users'] ?? [];
    }

    private function loadStrings(): array
    {
        $data = $this->loadData();

        return $data['strings'] ?? [];
    }

    private function loadData(): array
    {
        $path = storage_path('app/' . $this->dataPath);

        if (!file_exists($path)) {
            return [];
        }

        $content = file_get_contents($path);

        if ($content === false) {
            return [];
        }

        $decoded = json_decode($content, true);

        return is_array($decoded) ? $decoded : [];
    }

    private function renderManagement(Request $request, string $view, array $data, string $activeMenu)
    {
        return view($view, array_merge($data, [
            'displayName' => $request->session()->get('display_name', 'Pengguna'),
            'activeMenu' => $activeMenu,
        ]));
    }
}
