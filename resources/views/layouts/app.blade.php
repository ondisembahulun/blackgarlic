<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Bawang Hitam Sembalun')) | {{ __('Inovasi Pangan Lereng Rinjani') }}</title>
    <meta name="description" content="@yield('meta_description', __('Bawang Hitam Sembalun: Dari Bawang Putih Tunggal Sembalun untuk Inovasi Pangan Bernilai Tinggi, Kaya Antioksidan & Berbasis Ketertelusuran (Traceability).'))">

    <!-- Fonts & Tailwind CSS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .garlic-pattern {
            background-color: #0f1115;
            background-image: radial-gradient(#272d38 0.75px, transparent 0.75px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 antialiased font-sans flex flex-col min-h-screen overflow-x-clip selection:bg-amber-500 selection:text-white">

    <!-- TOP NAVIGATION PROGRESS BAR -->
    <div id="page-progress-bar"></div>

    <!-- TOP INFO & LANGUAGE BAR (Address, Contact & Language Switcher above Header) -->
    <div id="top-info-bar" class="bg-stone-900 text-stone-300 border-b border-stone-800 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1.5 flex flex-wrap items-center justify-between gap-2">
            <!-- Left: Address & Contact -->
            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-[11px] text-stone-300">
                <a href="{{ route('kontak') }}" class="inline-flex items-center gap-1.5 hover:text-amber-400 transition-colors">
                    <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ __('Sembalun Bumbung, Lombok Timur, NTB') }}</span>
                </a>
                <span class="hidden sm:inline text-stone-700">|</span>
                <a href="https://wa.me/6285337369110?text=Halo%20Admin%20Bawang%20Hitam%20Sembalun,%20saya%20ingin%20konsultasi%20dan%20order" target="_blank" class="inline-flex items-center gap-1.5 hover:text-emerald-400 transition-colors">
                    <svg class="w-3.5 h-3.5 text-emerald-400 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                    <span>+62 853-3736-9110</span>
                </a>
                <span class="hidden md:inline text-stone-700">|</span>
                <a href="mailto:info@bawanghitamsembalun.id" class="hidden md:inline-flex items-center gap-1.5 hover:text-amber-400 transition-colors">
                    <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>info@bawanghitamsembalun.id</span>
                </a>
            </div>

            <!-- Right: Language Switcher -->
            <div class="flex items-center gap-2 ml-auto" data-no-ajax="true">
                <span class="hidden sm:inline text-[11px] text-stone-400 font-medium">{{ __('Bahasa') }}:</span>
                <div class="inline-flex items-center p-0.5 rounded-lg bg-stone-800 border border-stone-700 text-[11px] font-bold" title="{{ __('Pilihan Bahasa') }}">
                    <a href="{{ route('locale.switch', 'id') }}"
                       data-no-ajax="true"
                       class="flex items-center gap-1 px-2 py-0.5 rounded-md transition-all {{ app()->getLocale() === 'id' ? 'bg-amber-500 text-stone-950 shadow-xs font-black' : 'text-stone-300 hover:text-white' }}"
                       title="Bahasa Indonesia">
                        <span>🇮🇩</span>
                        <span>ID</span>
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}"
                       data-no-ajax="true"
                       class="flex items-center gap-1 px-2 py-0.5 rounded-md transition-all {{ app()->getLocale() === 'en' ? 'bg-amber-500 text-stone-950 shadow-xs font-black' : 'text-stone-300 hover:text-white' }}"
                       title="English">
                        <span>🇬🇧</span>
                        <span>EN</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (Clean, Proportionate & Zero Overflow) -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-stone-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-6 xl:px-8">
            <div class="flex items-center justify-between h-16 sm:h-[72px] gap-2">
                
                <!-- Logo: Compact Single Line -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-stone-900 to-stone-800 text-amber-400 flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-200 border border-stone-700 shrink-0">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 5v14M8.5 9c-.5 2-.5 4.5 0 6.5M15.5 9c.5 2 .5 4.5 0 6.5" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <div class="font-extrabold text-stone-900 text-[15px] xl:text-base tracking-tight leading-none whitespace-nowrap">
                            {{ __('Bawang Hitam') }} <span class="text-amber-600">Sembalun</span>
                        </div>
                        <p class="text-[10px] text-stone-400 font-medium tracking-wide mt-0.5 hidden 2xl:block max-w-[185px] truncate">{{ __('Inovasi Pangan Lereng Rinjani') }}</p>
                    </div>
                </a>

                <!-- Desktop Navigation: Balanced & Fits Comfortably at All Breakpoints -->
                <nav id="desktop-nav" class="hidden lg:flex items-center gap-0.5 xl:gap-1 min-w-0">
                    <a href="{{ route('home') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('home') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        {{ __('Beranda') }}
                    </a>
                    
                    <a href="{{ route('produk.index') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('produk.*') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        {{ __('Produk Kami') }}
                    </a>

                    <a href="{{ route('traceability') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors flex items-center gap-1 {{ request()->routeIs('traceability') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        <span>Traceability</span>
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    </a>

                    <a href="{{ route('tentang') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('tentang') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        {{ __('Tentang Kami') }}
                    </a>

                    <a href="{{ route('proses') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('proses') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        {{ __('Proses & Inovasi') }}
                    </a>

                    <!-- Clean Dropdown: Edukasi & Berita -->
                    <div class="relative group">
                        <button type="button" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors flex items-center gap-1 {{ request()->routeIs('edukasi') || request()->routeIs('berita.*') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                            <span>{{ __('Edukasi & Berita') }}</span>
                            <svg class="w-3.5 h-3.5 text-stone-400 group-hover:text-stone-700 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <!-- Dropdown Card -->
                        <div class="absolute right-0 top-full mt-1.5 w-60 bg-white rounded-2xl shadow-xl border border-stone-200/80 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-200 z-50">
                            <a href="{{ route('edukasi') }}" class="flex items-start gap-2.5 p-2.5 rounded-xl hover:bg-stone-50 transition-colors {{ request()->routeIs('edukasi') ? 'bg-amber-50 text-amber-700' : 'text-stone-700' }}">
                                <div class="w-7 h-7 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-stone-900">{{ __('Pusat Edukasi') }}</div>
                                    <p class="text-[10px] text-stone-500">{{ __('Khasiat & panduan konsumsi') }}</p>
                                </div>
                            </a>
                            <a href="{{ route('berita.index') }}" class="flex items-start gap-2.5 p-2.5 rounded-xl hover:bg-stone-50 transition-colors {{ request()->routeIs('berita.*') ? 'bg-amber-50 text-amber-700' : 'text-stone-700' }}">
                                <div class="w-7 h-7 rounded-lg bg-stone-100 text-stone-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-stone-900">{{ __('Berita & Publikasi') }}</div>
                                    <p class="text-[10px] text-stone-500">{{ __('Kegiatan & riset ilmiah') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('kontak') }}" class="px-1.5 xl:px-2.5 py-1.5 xl:py-2 rounded-xl text-[12px] xl:text-[13px] font-semibold whitespace-nowrap transition-colors {{ request()->routeIs('kontak') ? 'text-amber-600 bg-amber-50' : 'text-stone-700 hover:text-stone-950 hover:bg-stone-100' }}">
                        {{ __('Kontak') }}
                    </a>
                </nav>

                <!-- Right Action Button: Cart & Checkout -->
                <div id="desktop-cart-container" class="hidden lg:flex items-center gap-2 shrink-0">
                    <!-- Cart Button with Dynamic Badge -->
                    <a href="{{ route('cart.index') }}" title="{{ __('Keranjang Belanja') }}" class="relative p-2 rounded-xl text-stone-700 hover:text-amber-700 hover:bg-stone-100 border border-stone-200 transition-colors">
                        <svg class="w-4 h-4 xl:w-5 xl:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        @php $cartQty = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                        @if($cartQty > 0)
                            <span class="absolute -top-1.5 -right-1.5 w-5 h-5 rounded-full bg-amber-600 text-white text-[10px] font-black flex items-center justify-center shadow-xs">
                                {{ $cartQty > 9 ? '9+' : $cartQty }}
                            </span>
                        @endif
                    </a>

                    <!-- Belanja Sekarang Button (Shown on xl+ so lg screens never overflow) -->
                    <a href="{{ route('produk.index') }}" class="hidden xl:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-[12px] font-bold uppercase tracking-wide text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-sm shadow-amber-900/10 hover:shadow-md transition-all whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span>{{ __('Belanja Produk') }}</span>
                    </a>
                </div>

                <!-- Mobile Action & Hamburger Button -->
                <div class="flex items-center gap-1.5 lg:hidden">
                    <div id="mobile-cart-container">
                        <a href="{{ route('cart.index') }}" class="relative p-2 rounded-xl text-stone-700 hover:bg-stone-100 flex items-center justify-center" title="{{ __('Keranjang Belanja') }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            @php $mobileCartQty = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                            @if($mobileCartQty > 0)
                                <span class="absolute top-0 right-0 w-4 h-4 rounded-full bg-amber-600 text-white text-[9px] font-black flex items-center justify-center">
                                    {{ $mobileCartQty }}
                                </span>
                            @endif
                        </a>
                    </div>
                    <button type="button" id="mobile-menu-btn" onclick="openMobileDrawer()" class="p-2.5 rounded-xl text-stone-800 hover:text-stone-950 hover:bg-stone-100 focus:outline-hidden cursor-pointer" aria-label="{{ __('Buka Menu Navigasi') }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- MOBILE DRAWER NAVIGATION (Direct child of body, outside header stacking context) -->
    <div id="mobile-menu-backdrop" onclick="closeMobileDrawer()" class="fixed inset-0 bg-stone-950/70 backdrop-blur-xs z-[999] hidden opacity-0 transition-opacity duration-300 cursor-pointer"></div>
    <div id="mobile-drawer" class="fixed inset-y-0 left-0 w-80 max-w-[85vw] h-[100dvh] bg-white z-[1000] shadow-2xl flex flex-col -translate-x-full transition-transform duration-300 ease-in-out" style="will-change: transform;">
        <!-- Drawer Header -->
        <div class="p-5 border-b border-stone-200 flex items-center justify-between bg-stone-900 text-white shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-amber-500 text-stone-950 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
                </div>
                <div>
                    <div class="font-bold text-sm leading-tight text-white">{{ __('Bawang Hitam Sembalun') }}</div>
                    <div class="text-[10px] text-amber-400">{{ __('Mitra Malsye • Sembalun Bumbung') }}</div>
                </div>
            </div>
            <button type="button" id="mobile-menu-close" onclick="closeMobileDrawer()" class="p-2 rounded-lg text-stone-400 hover:text-white hover:bg-stone-800 cursor-pointer" aria-label="{{ __('Tutup Menu') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Drawer Language Switcher -->
        <div class="px-5 py-3 bg-stone-50 border-b border-stone-200/80" data-no-ajax="true">
            <div class="text-[10px] font-bold text-stone-500 uppercase tracking-wider mb-1.5">{{ __('Pilihan Bahasa') }}</div>
            <div class="grid grid-cols-2 gap-2 bg-stone-200/60 p-1 rounded-xl text-xs font-bold">
                <a href="{{ route('locale.switch', 'id') }}" data-no-ajax="true" class="flex items-center justify-center gap-1.5 py-1.5 rounded-lg transition-all {{ app()->getLocale() === 'id' ? 'bg-white text-stone-900 shadow-xs font-black' : 'text-stone-600 hover:text-stone-900' }}">
                    <span>🇮🇩</span>
                    <span>Indonesia</span>
                </a>
                <a href="{{ route('locale.switch', 'en') }}" data-no-ajax="true" class="flex items-center justify-center gap-1.5 py-1.5 rounded-lg transition-all {{ app()->getLocale() === 'en' ? 'bg-white text-stone-900 shadow-xs font-black' : 'text-stone-600 hover:text-stone-900' }}">
                    <span>🇬🇧</span>
                    <span>English</span>
                </a>
            </div>
        </div>

        <!-- Drawer Links -->
        <div class="flex-1 overflow-y-auto py-4 px-3 divide-y divide-stone-100">
            <div id="mobile-drawer-links" class="space-y-1 pb-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>{{ __('Beranda') }}</span>
                </a>
                <a href="{{ route('cart.index') }}" class="flex items-center justify-between px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('cart.*') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 opacity-70 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span>{{ __('Keranjang Belanja') }}</span>
                    </div>
                    @if($mobileCartQty > 0)
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-amber-600 text-white">{{ $mobileCartQty }} item</span>
                    @endif
                </a>
                <a href="{{ route('order.track') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('order.track') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    <span>{{ __('Lacak Pesanan') }}</span>
                </a>
                <a href="{{ route('produk.index') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('produk.*') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span>{{ __('Produk Kami') }}</span>
                </a>
                <a href="{{ route('traceability') }}" class="flex items-center justify-between px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('traceability') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 opacity-70 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                        <span>Traceability</span>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </a>
                <a href="{{ route('tentang') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('tentang') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ __('Tentang Kami') }}</span>
                </a>
                <a href="{{ route('proses') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('proses') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    <span>{{ __('Proses & Inovasi') }}</span>
                </a>
                <a href="{{ route('edukasi') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('edukasi') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>{{ __('Pusat Edukasi Khasiat') }}</span>
                </a>
                <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('berita.*') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>{{ __('Berita & Publikasi') }}</span>
                </a>
                <a href="{{ route('kontak') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('kontak') ? 'bg-amber-50 text-amber-700' : 'text-stone-700 hover:bg-stone-100' }}">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ __('Kontak & Pemesanan') }}</span>
                </a>
            </div>

            <!-- Drawer Action Button -->
            <div class="pt-4 space-y-2">
                <a href="https://wa.me/6285337369110?text=Halo%20Admin%20Bawang%20Hitam%20Sembalun,%20saya%20ingin%20pesan%20produk" target="_blank" class="w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                    <span>{{ __('Pesan via WhatsApp') }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- FLASH MESSAGES -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="rounded-2xl bg-emerald-50 border border-emerald-200 p-4 flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="flex-1 text-sm text-emerald-800 font-medium">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="rounded-2xl bg-rose-50 border border-rose-200 p-4 flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="flex-1 text-sm text-rose-800 font-medium">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <!-- MAIN PAGE CONTENT (Faded Container) -->
    <main class="flex-1 page-fade-enter" id="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-stone-900 text-stone-300 border-t border-stone-800 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                
                <!-- Col 1: Brand -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-500 text-stone-950 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
                        </div>
                        <div class="font-extrabold text-white text-lg tracking-tight">
                            Bawang Hitam <span class="text-amber-400">Sembalun</span>
                        </div>
                    </div>
                    <p class="text-stone-400 text-sm leading-relaxed">
                        {{ __('Inovasi hilirisasi pangan bernilai tinggi berbasis bawang putih tunggal pegunungan Sembalun, Lombok Timur. Divalidasi riset fermentasi modern dan ketertelusuran batch transparan.') }}
                    </p>
                    <div class="flex items-center gap-2 pt-2 text-xs text-amber-400 font-medium">
                        <span class="inline-block w-2 h-2 rounded-full bg-emerald-400"></span>
                        {{ __('100% Alami Bebas Bahan Kimia & Pengawet') }}
                    </div>
                </div>

                <!-- Col 2: Sitemap Navigasi -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm uppercase tracking-wider">{{ __('Navigasi Utama') }}</h3>
                    <ul class="space-y-2 text-sm text-stone-400">
                        <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">{{ __('Beranda') }}</a></li>
                        <li><a href="{{ route('produk.index') }}" class="hover:text-amber-400 transition-colors">{{ __('Produk Kami (Katalog)') }}</a></li>
                        <li><a href="{{ route('traceability') }}" class="hover:text-amber-400 transition-colors">{{ __('Sistem Traceability (Cek Batch)') }}</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-amber-400 transition-colors">{{ __('Tentang Kami (About)') }}</a></li>
                        <li><a href="{{ route('proses') }}" class="hover:text-amber-400 transition-colors">{{ __('Proses & Inovasi Riset') }}</a></li>
                        <li><a href="{{ route('edukasi') }}" class="hover:text-amber-400 transition-colors">{{ __('Pusat Edukasi & Khasiat') }}</a></li>
                        <li><a href="{{ route('berita.index') }}" class="hover:text-amber-400 transition-colors">{{ __('Berita & Publikasi Ilmiah') }}</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-amber-400 transition-colors">{{ __('Kontak & Pemesanan') }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Quick Traceability Checker -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm uppercase tracking-wider">{{ __('Periksa Keaslian Batch') }}</h3>
                    <p class="text-stone-400 text-xs leading-relaxed">
                        {{ __('Masukkan kode lot/batch pada kemasan untuk melacak asal petani, riwayat fermentasi, dan sertifikat uji lab.') }}
                    </p>
                    <form action="{{ route('traceability') }}" method="GET" class="space-y-2">
                        <div class="relative">
                            <input type="text" name="kode" placeholder="{{ __('Contoh: BHS-2026-A01') }}" class="w-full bg-stone-800 border border-stone-700 rounded-xl px-3 py-2.5 text-xs text-white placeholder-stone-500 focus:outline-hidden focus:border-amber-500 uppercase tracking-wider font-mono">
                            <button type="submit" class="absolute right-1 top-1 bottom-1 px-3 bg-amber-600 hover:bg-amber-500 text-white rounded-lg text-xs font-semibold transition-colors">
                                {{ __('Lacak') }}
                            </button>
                        </div>
                    </form>
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        <span class="text-[11px] text-stone-500">{{ __('Kode Contoh:') }}</span>
                        <a href="{{ route('traceability', ['kode' => 'BHS-2026-A01']) }}" class="text-[11px] text-amber-400 hover:underline font-mono">BHS-2026-A01</a>
                        <span class="text-stone-600">•</span>
                        <a href="{{ route('traceability', ['kode' => 'BHS-2026-S02']) }}" class="text-[11px] text-amber-400 hover:underline font-mono">BHS-2026-S02</a>
                    </div>
                </div>

                <!-- Col 4: Kontak Resmi -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-sm uppercase tracking-wider">{{ __('Kontak Resmi') }}</h3>
                    <ul class="space-y-3 text-sm text-stone-400">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ __('Desa Sembalun Bumbung, Kec. Sembalun, Kab. Lombok Timur, Nusa Tenggara Barat (83656) • Sentra Mitra Malsye') }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                            <a href="https://wa.me/6285337369110" target="_blank" class="hover:text-emerald-400 font-medium">+62 853-3736-9110</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:info@bawanghitamsembalun.id" class="hover:text-amber-400">info@bawanghitamsembalun.id</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Sub-Footer -->
            <div class="mt-12 pt-8 border-t border-stone-800 text-xs text-stone-500 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    &copy; {{ date('Y') }} <strong>{{ __('Bawang Hitam Sembalun') }}</strong>. {{ __('Hak Cipta') }}
                </div>
                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                    <!-- Language selector in footer -->
                    <div class="inline-flex items-center gap-1.5 text-stone-400" data-no-ajax="true">
                        <span class="text-stone-500">{{ __('Bahasa') }}:</span>
                        <a href="{{ route('locale.switch', 'id') }}" data-no-ajax="true" class="{{ app()->getLocale() === 'id' ? 'text-amber-400 font-bold underline' : 'hover:text-stone-200' }}">ID</a>
                        <span class="text-stone-600">|</span>
                        <a href="{{ route('locale.switch', 'en') }}" data-no-ajax="true" class="{{ app()->getLocale() === 'en' ? 'text-amber-400 font-bold underline' : 'hover:text-stone-200' }}">EN</a>
                    </div>
                    <span>•</span>
                    <a href="{{ route('traceability') }}" class="hover:text-stone-300">Traceability System</a>
                    <span>•</span>
                    <a href="{{ route('kontak') }}" class="hover:text-stone-300">{{ __('Kontak') }}</a>
                    <span>•</span>
                    <a href="{{ route('admin.login') }}" class="hover:text-amber-400 text-stone-500 transition-colors">{{ __('Portal Admin') }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- INTERACTION & LUXURY SMOOTH PAGE TRANSITION SCRIPT -->
    <script>
        // 1. Mobile Drawer Functions (Globally accessible & resilient)
        function openMobileDrawer() {
            const drawer = document.getElementById('mobile-drawer');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            if (!backdrop || !drawer) return;

            backdrop.classList.remove('hidden');
            void backdrop.offsetWidth; // Force reflow for transition
            backdrop.classList.remove('opacity-0');

            drawer.classList.remove('-translate-x-full');
            drawer.style.transform = 'translateX(0)';
            document.body.classList.add('overflow-hidden');
        }

        function closeMobileDrawer() {
            const drawer = document.getElementById('mobile-drawer');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            if (!backdrop || !drawer) return;

            drawer.style.transform = '';
            drawer.classList.add('-translate-x-full');
            backdrop.classList.add('opacity-0');
            document.body.classList.remove('overflow-hidden');

            setTimeout(() => {
                if (backdrop.classList.contains('opacity-0')) {
                    backdrop.classList.add('hidden');
                }
            }, 300);
        }

        window.openMobileDrawer = openMobileDrawer;
        window.closeMobileDrawer = closeMobileDrawer;

        document.addEventListener('DOMContentLoaded', function () {
            const openDrawer = openMobileDrawer;
            const closeDrawer = closeMobileDrawer;

            // Delegated listener for mobile drawer triggers
            document.addEventListener('click', function (e) {
                if (e.target.closest('#mobile-menu-btn')) {
                    e.preventDefault();
                    openMobileDrawer();
                    return;
                }
                if (e.target.closest('#mobile-menu-close') || e.target.closest('#mobile-menu-backdrop')) {
                    e.preventDefault();
                    closeMobileDrawer();
                    return;
                }
                if (e.target.closest('#mobile-drawer a')) {
                    closeMobileDrawer();
                }
            });

            // Accessibility: Close drawer on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeMobileDrawer();
                }
            });

            // 2. High-Performance Seamless Page Transition Engine
            const progressBar = document.getElementById('page-progress-bar');
            let isTransitioning = false;
            let progressInterval = null;

            function startProgress() {
                if (!progressBar) return;
                clearInterval(progressInterval);
                progressBar.classList.add('is-loading');
                progressBar.style.width = '25%';
                
                let current = 25;
                progressInterval = setInterval(() => {
                    if (current < 80) {
                        current += Math.random() * 12;
                        progressBar.style.width = current + '%';
                    }
                }, 100);
            }

            function finishProgress() {
                if (!progressBar) return;
                clearInterval(progressInterval);
                progressBar.style.width = '100%';
                setTimeout(() => {
                    progressBar.classList.remove('is-loading');
                    setTimeout(() => {
                        progressBar.style.width = '0%';
                    }, 250);
                }, 180);
            }

            // Execute scripts inside swapped container
            function executeContainerScripts(container) {
                const scripts = container.querySelectorAll('script');
                scripts.forEach(oldScript => {
                    const newScript = document.createElement('script');
                    Array.from(oldScript.attributes).forEach(attr => {
                        newScript.setAttribute(attr.name, attr.value);
                    });
                    newScript.appendChild(document.createTextNode(oldScript.innerHTML));
                    oldScript.parentNode.replaceChild(newScript, oldScript);
                });
            }

            // Smooth Page Navigator
            async function navigateTo(targetUrlString, pushToHistory = true) {
                if (isTransitioning) return;
                
                const mainEl = document.getElementById('main-content');
                if (!mainEl) {
                    window.location.href = targetUrlString;
                    return;
                }

                isTransitioning = true;
                startProgress();
                closeDrawer();

                // Phase 1: Soft fade exit with slight upward drift (160ms)
                mainEl.classList.remove('page-fade-enter');
                mainEl.classList.add('page-fade-exit');

                try {
                    // Fetch in background (minimum wait 160ms so animation completes smoothly)
                    const fetchPromise = fetch(targetUrlString, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    const delayPromise = new Promise(resolve => setTimeout(resolve, 160));

                    const [response] = await Promise.all([fetchPromise, delayPromise]);

                    if (!response.ok) {
                        window.location.href = targetUrlString;
                        return;
                    }

                    const htmlText = await response.text();
                    const parser = new DOMParser();
                    const newDoc = parser.parseFromString(htmlText, 'text/html');

                    const newMain = newDoc.getElementById('main-content');
                    if (!newMain) {
                        window.location.href = targetUrlString;
                        return;
                    }

                    // Update Title
                    if (newDoc.title) {
                        document.title = newDoc.title;
                    }

                    // Update History
                    if (pushToHistory) {
                        window.history.pushState({ url: targetUrlString }, '', targetUrlString);
                    }

                    // Sync Navigation Active States
                    const newDesktopNav = newDoc.getElementById('desktop-nav');
                    const currentDesktopNav = document.getElementById('desktop-nav');
                    if (newDesktopNav && currentDesktopNav) {
                        currentDesktopNav.innerHTML = newDesktopNav.innerHTML;
                    }

                    const newMobileNav = newDoc.getElementById('mobile-drawer-links');
                    const currentMobileNav = document.getElementById('mobile-drawer-links');
                    if (newMobileNav && currentMobileNav) {
                        currentMobileNav.innerHTML = newMobileNav.innerHTML;
                    }

                    // Sync Cart Badges
                    const newDesktopCart = newDoc.getElementById('desktop-cart-container');
                    const currentDesktopCart = document.getElementById('desktop-cart-container');
                    if (newDesktopCart && currentDesktopCart) {
                        currentDesktopCart.innerHTML = newDesktopCart.innerHTML;
                    }

                    const newMobileCart = newDoc.getElementById('mobile-cart-container');
                    const currentMobileCart = document.getElementById('mobile-cart-container');
                    if (newMobileCart && currentMobileCart) {
                        currentMobileCart.innerHTML = newMobileCart.innerHTML;
                    }

                    // Swap Content
                    mainEl.innerHTML = newMain.innerHTML;

                    // Re-bind scripts inside container
                    executeContainerScripts(mainEl);

                    // Reset Scroll
                    window.scrollTo({ top: 0, behavior: 'instant' });

                    // Phase 2: Silky glide in (0.35s cubic-bezier)
                    mainEl.classList.remove('page-fade-exit');
                    mainEl.classList.add('page-fade-enter');

                    // Dispatch custom event for page listeners
                    window.dispatchEvent(new CustomEvent('page:swapped', { detail: { url: targetUrlString } }));

                    finishProgress();
                    isTransitioning = false;

                } catch (err) {
                    console.error('Page transition error, falling back:', err);
                    finishProgress();
                    window.location.href = targetUrlString;
                }
            }

            // Intercept internal link clicks with delegation
            document.addEventListener('click', function (e) {
                const link = e.target.closest('a');
                if (!link) return;

                const href = link.getAttribute('href');
                if (!href) return;

                // Handle in-page anchors smoothly
                if (href.startsWith('#')) {
                    if (href.length > 1) {
                        const targetElem = document.querySelector(href);
                        if (targetElem) {
                            e.preventDefault();
                            targetElem.scrollIntoView({ behavior: 'smooth' });
                        }
                    }
                    return;
                }

                // Ignore non-navigation links, language switchers, and action links
                if (
                    href.startsWith('javascript:') ||
                    href.startsWith('mailto:') ||
                    href.startsWith('tel:') ||
                    link.target === '_blank' ||
                    link.hasAttribute('download') ||
                    link.hasAttribute('data-no-ajax') ||
                    link.closest('[data-no-ajax]') ||
                    href.includes('/lang/') ||
                    e.ctrlKey || e.metaKey || e.shiftKey || e.altKey
                ) {
                    return;
                }

                try {
                    const targetUrl = new URL(link.href, window.location.origin);
                    
                    // Same origin check
                    if (targetUrl.origin === window.location.origin) {
                        // Same page check
                        if (targetUrl.pathname === window.location.pathname && targetUrl.search === window.location.search) {
                            if (targetUrl.hash) {
                                const targetElem = document.querySelector(targetUrl.hash);
                                if (targetElem) {
                                    e.preventDefault();
                                    targetElem.scrollIntoView({ behavior: 'smooth' });
                                }
                            }
                            return;
                        }

                        e.preventDefault();
                        navigateTo(targetUrl.href, true);
                    }
                } catch (err) {
                    // Fall back to default browser behavior
                }
            });

            // Handle browser Back / Forward buttons seamlessly
            window.addEventListener('popstate', function (event) {
                navigateTo(window.location.href, false);
            });
        });
    </script>
    <!-- Floating WhatsApp Quick Button -->
    <a href="https://wa.me/6285337369110?text=Halo%20Admin%20Bawang%20Hitam%20Sembalun,%20saya%20ingin%20konsultasi%20dan%20order"
       target="_blank"
       title="{{ __('Hubungi Kami via WhatsApp: +62 853-3736-9110') }}"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 px-4 py-3 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 group">
        <svg class="w-6 h-6 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
        <span class="text-xs font-bold tracking-wide hidden sm:inline-block">{{ __('Chat WhatsApp (+62 853-3736-9110)') }}</span>
    </a>

    @stack('scripts')
</body>
</html>
