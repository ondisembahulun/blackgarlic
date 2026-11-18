@extends('layouts.app')

@section('title', __('Beranda') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HERO BANNER SECTION (Sesuai Wireframe 1: Beranda) -->
    <section class="relative overflow-hidden bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-20 lg:py-28">
        <!-- Background Grid Pattern -->
        <div class="absolute inset-0 garlic-pattern opacity-40"></div>
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Hero Copy (Sesuai Teks Wireframe) -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 text-xs font-semibold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                        {{ __('Superfood Herbal Unggulan Nusa Tenggara Barat') }}
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-tight">
                        {{ __('Bawang Hitam') }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500">{{ __('Sembalun') }}</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-stone-300 font-light leading-relaxed max-w-2xl">
                        {{ __('Dari Bawang Putih Tunggal Sembalun untuk Inovasi Pangan Bernilai Tinggi. Diproses melalui fermentasi alami suhu terkontrol 35 hari, menghasilkan cita rasa manis legit tanpa bau menyengat dengan kandungan antioksidan berlipat ganda.') }}
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('produk.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl text-sm font-bold uppercase tracking-wider text-stone-950 bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500 hover:from-amber-300 hover:to-amber-400 shadow-xl shadow-amber-500/20 hover:scale-105 transition-all">
                            <span>{{ __('Lihat Produk') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('traceability') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 rounded-2xl text-sm font-bold uppercase tracking-wider text-white bg-stone-800/80 hover:bg-stone-800 border border-stone-700 hover:border-amber-500/50 transition-all">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                            <span>{{ __('Lacak Batch Produk') }}</span>
                        </a>
                    </div>

                    <!-- Highlight Meta -->
                    <div class="grid grid-cols-3 gap-4 pt-6 border-t border-stone-800/80 max-w-lg mx-auto lg:mx-0 text-center sm:text-left">
                        <div>
                            <div class="text-2xl font-black text-amber-400">1.100+</div>
                            <div class="text-xs text-stone-400">{{ __('mdpl Elevasi Rinjani') }}</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-amber-400">{{ __('35 Hari') }}</div>
                            <div class="text-xs text-stone-400">{{ __('Fermentasi Alami') }}</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-amber-400">{{ __('10x Lipat') }}</div>
                            <div class="text-xs text-stone-400">{{ __('Kadar Antioksidan SAC') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual Art Card / Illustration (Sesuai Ilustrasi Wireframe) -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md">
                        <!-- Glow ring -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-emerald-600 rounded-3xl blur-xl opacity-30 animate-pulse"></div>

                        <div class="relative rounded-3xl bg-gradient-to-b from-stone-800 to-stone-900 border border-stone-700/80 p-8 shadow-2xl text-center space-y-6">
                            
                            <!-- Bawang Hitam & Tunggal Graphic -->
                            <div class="w-40 h-40 mx-auto rounded-full bg-gradient-to-br from-amber-500/20 via-stone-800 to-stone-950 flex items-center justify-center border border-amber-500/30 shadow-inner">
                                <svg class="w-24 h-24 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M12 6v13M8.5 10c-.5 2-.5 4.5 0 6.5M15.5 10c.5 2 .5 4.5 0 6.5" />
                                    <circle cx="12" cy="15" r="3" fill="#1c1917" stroke="#f59e0b" stroke-width="1.5" />
                                </svg>
                            </div>

                            <div class="space-y-2">
                                <div class="inline-block px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-400/20 text-amber-300 border border-amber-400/30">
                                    Single Clove Garlic (Solo Garlic)
                                </div>
                                <h3 class="text-xl font-bold text-white">{{ __('Bawang Putih Tunggal Sembalun') }}</h3>
                                <p class="text-xs text-stone-400 leading-relaxed">
                                    {{ __('Varietas unggul berukuran bulat tunggal dengan konsentrasi nutrisi padat, dipanen langsung dari tanah vulkanik subur kaki Gunung Rinjani.') }}
                                </p>
                            </div>

                            <!-- Badges -->
                            <div class="grid grid-cols-2 gap-2 text-left pt-2 border-t border-stone-800">
                                <div class="bg-stone-950/60 p-2.5 rounded-xl border border-stone-800">
                                    <span class="text-[10px] text-amber-400 font-bold block uppercase">{{ __('Tekstur & Rasa') }}</span>
                                    <span class="text-xs font-semibold text-stone-200">{{ __('Kenyal, Manis Asam Legit') }}</span>
                                </div>
                                <div class="bg-stone-950/60 p-2.5 rounded-xl border border-stone-800">
                                    <span class="text-[10px] text-emerald-400 font-bold block uppercase">{{ __('Kelebihan Utama') }}</span>
                                    <span class="text-xs font-semibold text-stone-200">{{ __('Ramah Lambung & Maag') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- VALUE PROPOSITION (Sesuai Wireframe: 4 Kolom Keunggulan) -->
    <section class="py-16 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                    {{ __('Keunggulan Produk') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-3">
                    {{ __('4 Pilar Nilai Bawang Hitam Sembalun') }}
                </h2>
                <p class="text-stone-500 text-sm mt-2">
                    {{ __('Standar ketat dari hulu pertanian Sembalun hingga hilir riset inovasi pangan.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- 1. Asal Sembalun -->
                <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 hover:border-amber-500/40 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center font-bold mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2h-3l-2-3h-4L8 6H5a2 2 0 00-2 2v10a2 2 0 002 2zM12 11l4 6H8l4-6z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-stone-900 mb-2">{{ __('Asal Sembalun') }}</h3>
                    <p class="text-xs text-stone-600 leading-relaxed">
                        {{ __('Ditanam pada tanah vulkanik subur lereng Gunung Rinjani pada ketinggian 1.100+ mdpl dengan iklim sejuk alami.') }}
                    </p>
                </div>

                <!-- 2. Proses Terstandar -->
                <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 hover:border-amber-500/40 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center font-bold mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-stone-900 mb-2">{{ __('Proses Terstandar') }}</h3>
                    <p class="text-xs text-stone-600 leading-relaxed">
                        {{ __('Fermentasi termal terkontrol 65°C - 70°C selama 35 hari dengan pemantauan suhu dan kelembaban digital presisi.') }}
                    </p>
                </div>

                <!-- 3. Inovasi Pangan -->
                <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 hover:border-amber-500/40 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center font-bold mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-stone-900 mb-2">{{ __('Inovasi Pangan') }}</h3>
                    <p class="text-xs text-stone-600 leading-relaxed">
                        {{ __('Riset ekstraksi ultrasonik ramah lingkungan dan mikroenkapsulasi serbuk fungsional larut air cepat serap.') }}
                    </p>
                </div>

                <!-- 4. Aman & Berkualitas -->
                <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 hover:border-amber-500/40 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center font-bold mb-4 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-stone-900 mb-2">{{ __('Aman & Berkualitas') }}</h3>
                    <p class="text-xs text-stone-600 leading-relaxed">
                        {{ __('Uji mutu laboratorium mikrobiologi, bebas pengawet kimia, dan dilengkapi sertifikat ketertelusuran batch.') }}
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- PRODUK UNGGULAN (Sesuai Wireframe: Produk Unggulan Black Garlic Utuh & Serbuk) -->
    <section class="py-20 bg-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-100/60 px-3 py-1 rounded-full">
                        {{ __('Katalog Unggulan') }}
                    </span>
                    <h2 class="text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                        {{ __('Produk Unggulan Kami') }}
                    </h2>
                    <p class="text-stone-600 text-sm mt-1">
                        {{ __('Dua varian inti berstandar mutu premium yang dirancang untuk gaya hidup sehat Anda.') }}
                    </p>
                </div>
                <a href="{{ route('produk.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-amber-700 hover:text-amber-800 transition-colors">
                    {{ __('Lihat Semua Produk') }} &rarr;
                </a>
            </div>

            <!-- Two Featured Cards Matching Wireframe -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($featuredProducts as $item)
                    <div class="bg-white rounded-3xl border border-stone-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        
                        <!-- Top Image / Graphic Area -->
                        <div class="relative bg-gradient-to-br from-stone-900 to-stone-800 p-8 text-center text-white min-h-[220px] flex flex-col items-center justify-center">
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-amber-500 text-stone-950">
                                {{ __('Kategori') }} {{ __($item->category) }}
                            </span>
                            <span class="absolute top-4 right-4 text-xs text-stone-300 font-mono bg-stone-950/60 px-2.5 py-1 rounded-lg">
                                {{ __($item->net_weight) }}
                            </span>

                            <!-- Stylized Garlic Silhouette -->
                            <div class="w-24 h-24 rounded-full bg-amber-500/15 border border-amber-500/30 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                @if($item->category === 'Serbuk')
                                    <!-- Powder Dish Icon -->
                                    <svg class="w-12 h-12 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7l-2 5h4l-2-5z" />
                                    </svg>
                                @else
                                    <!-- Bulb Icon -->
                                    <svg class="w-12 h-12 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v13" />
                                    </svg>
                                @endif
                            </div>

                            <h3 class="text-xl font-black text-white tracking-tight">{{ __($item->name) }}</h3>
                            <p class="text-xs text-amber-300/90 font-medium mt-1">{{ __($item->subtitle) }}</p>
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between space-y-6">
                            <p class="text-stone-600 text-xs sm:text-sm leading-relaxed">
                                {{ Str::limit(__($item->description), 170) }}
                            </p>

                            <!-- Key Benefits Preview -->
                            @if(!empty($item->benefits))
                                <div class="space-y-2 pt-2 border-t border-stone-100">
                                    <div class="text-[11px] font-bold text-stone-900 uppercase tracking-wider">{{ __('Khasiat Utama:') }}</div>
                                    <ul class="space-y-1.5 text-xs text-stone-600">
                                        @foreach(array_slice($item->benefits, 0, 3) as $benefit)
                                             <li class="flex items-start gap-2">
                                                <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                <span>{{ __($benefit) }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Price & Action -->
                            <div class="pt-4 border-t border-stone-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div>
                                    <span class="text-[10px] text-stone-500 uppercase tracking-wider font-semibold block">{{ __('Harga Resmi') }}</span>
                                    <div class="text-2xl font-black text-stone-900">{{ $item->formatted_price }}</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('produk.show', $item->slug) }}" class="px-3.5 py-2.5 rounded-xl text-xs font-bold text-stone-800 bg-stone-100 hover:bg-stone-200 transition-colors">
                                        {{ __('Detail') }}
                                    </a>
                                    <!-- Add to Cart Form -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="direct_buy" value="1">
                                        <button type="submit" class="px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-md shadow-amber-900/10 transition-all flex items-center gap-1.5">
                                            <span>{{ __('Beli Langsung') }}</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- TRACEABILITY PROMO (Sesuai Wireframe: Traceability Input / Scan QR) -->
    <section class="py-20 bg-stone-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-stone-800 to-stone-850 rounded-3xl p-8 sm:p-12 border border-stone-700 shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-7 space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ __('Fitur Unggulan Ketertelusuran') }}
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                            {{ __('Transparansi Penuh: Lacak Riwayat Dari Petani ke Tangan Anda') }}
                        </h2>
                        <p class="text-stone-300 text-sm leading-relaxed">
                            {{ __('Setiap kemasan Bawang Hitam Sembalun memiliki Kode Batch Unik. Anda dapat melihat asal petani Sembalun, tanggal panen, grafik fermentasi, hingga sertifikat uji laboratorium secara langsung.') }}
                        </p>
                    </div>

                    <div class="lg:col-span-5 bg-stone-950/70 p-6 rounded-2xl border border-stone-700/80 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-500 text-stone-950 flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">{{ __('Periksa Batch Sekarang') }}</h3>
                                <p class="text-[11px] text-stone-400">{{ __('Masukkan kode pada kemasan produk Anda') }}</p>
                            </div>
                        </div>

                        <form action="{{ route('traceability') }}" method="GET" class="space-y-3">
                            <div class="relative">
                                <input type="text" name="kode" value="BHS-2026-A01" placeholder="{{ __('Contoh: BHS-2026-A01') }}" class="w-full bg-stone-900 border border-stone-700 rounded-xl px-4 py-3 text-sm text-white font-mono placeholder-stone-500 focus:outline-hidden focus:border-amber-400 uppercase tracking-wider">
                            </div>
                            <button type="submit" class="w-full py-3 px-4 rounded-xl text-xs font-bold uppercase tracking-wider bg-amber-500 hover:bg-amber-400 text-stone-950 transition-colors flex items-center justify-center gap-2">
                                <span>{{ __('Verifikasi Ketertelusuran') }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </form>

                        <div class="flex items-center justify-between text-[11px] text-stone-400 pt-1">
                            <span>{{ __('Contoh batch uji coba:') }}</span>
                            <a href="{{ route('traceability', ['kode' => 'BHS-2026-A01']) }}" class="text-amber-400 hover:underline font-mono">BHS-2026-A01</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- EDUKASI & BERITA HIGHLIGHT (Sesuai Wireframe: Edukasi & Berita / Artikel) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Edukasi Ringkas (Wireframe 6) -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                            {{ __('Pusat Edukasi') }}
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                            {{ __('Mengapa Bawang Hitam?') }}
                        </h2>
                        <p class="text-stone-500 text-sm mt-1">
                            {{ __('Kenali perubahan senyawa aktif dan manfaat klinisnya bagi kesehatan.') }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200">
                            <h3 class="font-bold text-sm text-stone-900 mb-1 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                {{ __('Apa itu S-Allyl-Cysteine (SAC)?') }}
                            </h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                {{ __('Senyawa bioaktif turunan sulfur yang terbentuk saat proses fermentasi lambat. SAC larut air, stabil terhadap asam lambung, dan diserap tubuh 100% lebih efisien dibanding allicin segar.') }}
                            </p>
                            <a href="{{ route('edukasi') }}" class="inline-block mt-3 text-xs font-bold text-amber-700 hover:underline">
                                {{ __('Baca Selengkapnya') }} &rarr;
                            </a>
                        </div>

                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200">
                            <h3 class="font-bold text-sm text-stone-900 mb-1 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                {{ __('Cara Konsumsi Harian') }}
                            </h3>
                            <p class="text-xs text-stone-600 leading-relaxed">
                                {{ __('Cukup nikmati 1-2 siung setiap pagi saat perut kosong, atau seduh 1 sendok teh serbuk dengan secangkir air hangat dan madu hutan Sembalun.') }}
                            </p>
                            <a href="{{ route('edukasi') }}" class="inline-block mt-3 text-xs font-bold text-amber-700 hover:underline">
                                {{ __('Panduan Lengkap Konsumsi') }} &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Berita / Riset Terkini (Wireframe 7) -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                                {{ __('Publikasi & Berita') }}
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                                {{ __('Riset & Kegiatan Terbaru') }}
                            </h2>
                        </div>
                        <a href="{{ route('berita.index') }}" class="text-xs font-bold text-amber-700 hover:text-amber-800">
                            {{ __('Lihat Semua') }} &rarr;
                        </a>
                    </div>

                    <div class="space-y-4">
                        @foreach($recentNews as $article)
                            <a href="{{ route('berita.show', $article->slug) }}" class="block p-5 rounded-2xl bg-white border border-stone-200 hover:border-amber-500/40 hover:shadow-md transition-all group">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-stone-100 text-stone-700 group-hover:bg-amber-100 group-hover:text-amber-800 transition-colors">
                                        {{ __($article->category) }}
                                    </span>
                                    <span class="text-xs text-stone-400">
                                        {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : __('Terbaru') }} • {{ __($article->reading_time) }}
                                    </span>
                                </div>
                                <h3 class="font-bold text-base text-stone-900 group-hover:text-amber-600 transition-colors leading-snug">
                                    {{ __($article->title) }}
                                </h3>
                                <p class="text-xs text-stone-500 line-clamp-2 mt-2 leading-relaxed">
                                    {{ __($article->summary) }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
