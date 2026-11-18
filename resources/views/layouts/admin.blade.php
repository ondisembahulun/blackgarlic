<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-100 admin-panel">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Bawang Hitam Sembalun</title>

    <!-- Fonts & Tailwind CSS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-stone-800 bg-stone-100 flex flex-col md:flex-row">

    <!-- Mobile Header -->
    <div class="md:hidden bg-stone-900 text-white px-4 py-3 flex items-center justify-between border-b border-stone-800 sticky top-0 z-40">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-amber-500 text-stone-950 flex items-center justify-center font-bold">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
            </div>
            <span class="font-bold text-sm tracking-tight text-white">Admin BHS</span>
        </div>
        <button type="button" id="admin-sidebar-toggle" class="p-2 rounded-lg text-stone-300 hover:text-white hover:bg-stone-800 focus:outline-hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <!-- Admin Sidebar -->
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-60 bg-stone-900 text-stone-300 flex flex-col transform -translate-x-full md:translate-x-0 md:static md:inset-auto transition-transform duration-200 ease-in-out border-r border-stone-800 shrink-0">
        <!-- Sidebar Brand -->
        <div class="h-16 px-6 flex items-center justify-between border-b border-stone-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-amber-500 text-stone-950 flex items-center justify-center font-black shadow-sm">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
                </div>
                <div>
                    <div class="font-extrabold text-white text-sm tracking-tight leading-none">BHS Admin</div>
                    <span class="text-[10px] text-amber-400 font-medium">Content Manager</span>
                </div>
            </a>
            <button type="button" id="admin-sidebar-close" class="md:hidden p-1.5 rounded-lg text-stone-400 hover:text-white hover:bg-stone-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Sidebar Navigation -->
        <div class="flex-1 overflow-y-auto py-5 px-3 space-y-1">
            <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                Menu Utama
            </div>

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>

            <!-- Produk -->
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <span>Kelola Produk</span>
            </a>

            <!-- Artikel & Berita -->
            <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                <span>Artikel & Edukasi</span>
            </a>

            <!-- Traceability Batch -->
            <a href="{{ route('admin.traceability.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.traceability.*') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                <span>Batch Ketertelusuran</span>
            </a>

            <div class="pt-4 px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                Transaksi & Pesan
            </div>

            <!-- Pesanan -->
            <a href="{{ route('admin.orders.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span>Pesanan Masuk</span>
                </div>
                @php $procCount = \App\Models\Order::where('order_status', 'processing')->count(); @endphp
                @if($procCount > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ request()->routeIs('admin.orders.*') ? 'bg-stone-900 text-amber-400' : 'bg-amber-500 text-stone-950' }}">
                        {{ $procCount }}
                    </span>
                @endif
            </a>

            <!-- Pesan Pengunjung -->
            <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-semibold transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-amber-500 text-stone-950 font-bold' : 'hover:bg-stone-800 text-stone-300 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    <span>Pesan Masuk</span>
                </div>
                @php $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                @if($unreadCount > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black {{ request()->routeIs('admin.messages.*') ? 'bg-stone-900 text-amber-400' : 'bg-rose-500 text-white' }}">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>

            <div class="pt-4 px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-stone-500">
                Situs Publik
            </div>

            <!-- View Public Site -->
            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-medium text-stone-400 hover:text-white hover:bg-stone-800 transition-colors">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Lihat Website</span>
                </div>
                <span class="text-[10px] bg-stone-800 text-stone-400 px-1.5 py-0.5 rounded">Baru</span>
            </a>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="p-3 border-t border-stone-800">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-stone-950/60 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-500/20 text-amber-400 border border-amber-500/30 flex items-center justify-center font-bold text-xs">
                    {{ substr(Auth::user()->name ?? 'Admin', 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="text-[10px] text-stone-400 truncate">{{ Auth::user()->email ?? 'admin@bhs.id' }}</div>
                </div>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-stone-400 hover:text-rose-400 hover:bg-stone-800/80 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Backdrop for mobile sidebar -->
    <div id="admin-sidebar-backdrop" class="fixed inset-0 bg-stone-950/60 backdrop-blur-xs z-40 hidden md:hidden"></div>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <!-- Top Header for Desktop -->
        <header class="h-16 bg-white border-b border-stone-200 hidden md:flex items-center justify-between px-6 sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <h1 class="text-base font-bold text-stone-900">
                    @yield('header_title', 'Admin Panel')
                </h1>
                <span class="text-stone-300">|</span>
                <span class="text-xs text-stone-500">Kelola dan perbarui seluruh konten website secara real-time</span>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-stone-700 bg-stone-100 hover:bg-stone-200 transition-colors border border-stone-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Website Toko</span>
                </a>
                <div class="text-xs text-stone-500 font-medium">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-6 pt-5 pb-0 max-w-[1440px] w-full mx-auto">
            @if(session('success'))
                <div class="mb-4 rounded-2xl bg-emerald-50 border border-emerald-200 p-4 flex items-start gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div class="text-xs sm:text-sm text-emerald-800 font-semibold">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 rounded-2xl bg-rose-50 border border-rose-200 p-4 flex items-start gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div class="text-xs sm:text-sm text-rose-800 font-semibold">
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-2xl bg-rose-50 border border-rose-200 p-4 shadow-xs">
                    <div class="flex items-center gap-2 text-rose-800 text-xs sm:text-sm font-bold mb-1">
                        <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Terdapat kesalahan pada isian formulir:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs text-rose-700 space-y-0.5 ml-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Page Body Content -->
        <main class="flex-1 p-6 max-w-[1440px] w-full mx-auto">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Drawer JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('admin-sidebar-toggle');
            const closeBtn = document.getElementById('admin-sidebar-close');
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('admin-sidebar-backdrop');

            function openSidebar() {
                backdrop.classList.remove('hidden');
                sidebar.classList.remove('-translate-x-full');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);
        });
    </script>
</body>
</html>
