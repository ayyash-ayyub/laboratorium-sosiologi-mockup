<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laboratorium Sosiologi UT')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-slate-100 min-h-screen font-sans text-slate-900">
<div class="min-h-screen bg-slate-100">
    <header class="bg-white shadow-sm border-b border-slate-200 fixed top-0 left-0 right-0 z-50">
        <div class="w-full px-4 sm:px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3 sm:gap-4">
                <img src="{{ asset('images/fhisip.png') }}" alt="Logo" class="h-10 sm:h-11 w-auto">
                <span class="text-base sm:text-lg font-semibold text-slate-800 tracking-tight">Laboratorium Digital Sosiologi</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden md:block relative">
                    <button id="userMenuButton" type="button"
                            class="group inline-flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-600 hover:text-slate-900 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-white"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="text-slate-500">Welcome:</span>
                        <span class="font-semibold text-slate-900">{{ $displayName }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 group-hover:text-slate-600" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div id="userMenu"
                         class="absolute right-0 mt-2 w-48 origin-top-right rounded-xl border border-slate-200 bg-white py-2 shadow-xl transition-all duration-200 ease-out opacity-0 scale-95 pointer-events-none">
                        <a href="#"
                           class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900">
                            Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 hover:text-rose-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <button id="sidebarToggle" type="button"
                        class="md:hidden inline-flex items-center justify-center rounded-lg border border-slate-200 p-2 text-slate-600 hover:text-slate-900 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-white"
                        aria-label="Buka navigasi">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 5.25h16.5M3.75 12h16.5m-16.5 6.75h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <div class="pt-20 md:pt-24">
        <div id="sidebarBackdrop"
             class="fixed inset-x-0 top-20 md:top-24 bottom-0 z-40 bg-slate-900/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

        <div class="relative md:flex md:min-h-[calc(100vh-5rem)] md:pt-0">
            <aside id="sidebar"
                   class="fixed top-20 md:top-24 bottom-0 left-0 z-40 w-72 -translate-x-full transform bg-white border-r border-slate-200 shadow-xl transition-transform duration-300 overflow-y-auto md:static md:z-auto md:transform-none md:translate-x-0 md:shadow-none md:flex md:flex-col md:w-72 md:flex-none">
            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between md:block">
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-400 font-semibold">Menu</p>
                    <p class="mt-4 text-sm text-slate-600 md:hidden">
                        Welcome: <span class="font-semibold text-slate-900">{{ $displayName }}</span>
                    </p>
                    <div class="mt-3 space-y-1 md:hidden">
                        <a href="#"
                           class="block rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-600 hover:border-slate-300 hover:text-slate-900">
                            Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full rounded-lg border border-transparent bg-rose-500 px-3 py-2 text-sm font-semibold text-white hover:bg-rose-600 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 focus:ring-offset-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <button id="sidebarClose" type="button"
                        class="md:hidden inline-flex items-center justify-center rounded-md border border-transparent p-2 text-slate-500 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-white"
                        aria-label="Tutup navigasi">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="px-4 py-6 space-y-8">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-[0.2em]">Kelola bahan ajar</p>
                    <nav class="mt-3 space-y-1.5">
                        <a href="{{ route('management') }}"
                           class="nav-link {{ $activeMenu === 'dashboard' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Ringkasan
                        </a>
                        <a href="{{ route('management.events.create') }}"
                           class="nav-link {{ $activeMenu === 'add-event' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Add Event
                        </a>
                        <a href="{{ route('management.digital.create') }}"
                           class="nav-link {{ $activeMenu === 'add-digital-content' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Add Digital Content
                        </a>
                        <a href="{{ route('management.digital.index') }}"
                           class="nav-link {{ $activeMenu === 'digital-list' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Daftar Konten
                        </a>
                        <a href="#"
                           class="block rounded-lg px-3 py-2 text-sm font-medium text-slate-400 cursor-not-allowed bg-slate-50">
                            Add Tutorial (coming soon)
                        </a>
                    </nav>
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-[0.2em]">Kelola Diskusi</p>
                    <nav class="mt-3 space-y-1.5">
                        <a href="{{ route('management.discussions.forum') }}"
                           class="nav-link {{ $activeMenu === 'discussions-forum' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Forum Diskusi
                        </a>
                        <a href="{{ route('management.discussions.moderation') }}"
                           class="nav-link {{ $activeMenu === 'discussions-moderation' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Moderasi Diskusi
                        </a>
                    </nav>
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-[0.2em]">Publikasi</p>
                    <nav class="mt-3 space-y-1.5">
                        <a href="{{ route('management.blog.create') }}"
                           class="nav-link {{ $activeMenu === 'blog-add' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Add Blog
                        </a>
                        <a href="{{ route('management.blog.index') }}"
                           class="nav-link {{ $activeMenu === 'blog-list' ? 'bg-sky-100/70 text-sky-700 border border-sky-200 shadow-sm' : 'text-slate-700' }} block rounded-lg px-3 py-2 text-sm font-medium hover:bg-slate-100 transition">
                            Daftar Blog
                        </a>
                    </nav>
                </div>
            </div>
            </aside>

            <main class="flex-1 px-4 sm:px-6 lg:px-8 py-8 md:py-12 md:flex md:flex-col md:overflow-y-auto md:h-[calc(100vh-6rem)]">
                @yield('content')
            </main>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');
        let sidebarOpen = false;
        let userMenuOpen = false;

        const openSidebar = () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarBackdrop.classList.remove('opacity-0', 'pointer-events-none');
            sidebarBackdrop.classList.add('opacity-100', 'pointer-events-auto');
            sidebarOpen = true;
        };

        const closeSidebar = (force = false) => {
            if (!sidebarOpen && !force) {
                return;
            }
            sidebar.classList.add('-translate-x-full');
            sidebarBackdrop.classList.add('opacity-0', 'pointer-events-none');
            sidebarBackdrop.classList.remove('opacity-100', 'pointer-events-auto');
            sidebarOpen = false;
        };

        const openUserMenu = () => {
            userMenu?.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            userMenu?.classList.add('opacity-100', 'scale-100');
            userMenuOpen = true;
            userMenuButton?.setAttribute('aria-expanded', 'true');
        };

        const closeUserMenu = () => {
            if (!userMenuOpen) {
                return;
            }
            userMenu?.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            userMenu?.classList.remove('opacity-100', 'scale-100');
            userMenuOpen = false;
            userMenuButton?.setAttribute('aria-expanded', 'false');
        };

        sidebarToggle?.addEventListener('click', () => openSidebar());
        sidebarClose?.addEventListener('click', () => closeSidebar());
        sidebarBackdrop?.addEventListener('click', () => closeSidebar());

        userMenuButton?.addEventListener('click', (event) => {
            event.stopPropagation();
            userMenuOpen ? closeUserMenu() : openUserMenu();
        });

        document.addEventListener('click', (event) => {
            if (userMenuOpen && !userMenu?.contains(event.target) && !userMenuButton?.contains(event.target)) {
                closeUserMenu();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeSidebar();
                closeUserMenu();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeSidebar(true);
            }
            if (window.innerWidth < 768) {
                closeUserMenu();
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
