@extends('layouts.app')

@section('title', __($product->name) . ' - ' . __('Detail Produk'))

@section('content')
    <!-- BREADCRUMB & HEADER -->
    <div class="bg-stone-100 border-b border-stone-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-amber-600">{{ __('Beranda') }}</a>
                <span>/</span>
                <a href="{{ route('produk.index') }}" class="hover:text-amber-600">{{ __('Produk') }}</a>
                <span>/</span>
                <span class="text-stone-900 font-semibold truncate">{{ __($product->name) }}</span>
            </div>
        </div>
    </div>

    <!-- PRODUCT DETAIL VIEW -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left: Product Image / Visual Showcase -->
                <div class="lg:col-span-6 space-y-4">
                    <div class="relative rounded-3xl bg-gradient-to-br from-stone-950 via-stone-900 to-stone-850 p-12 text-white border border-stone-700 shadow-xl flex flex-col items-center justify-center min-h-[360px]">
                        <span class="absolute top-6 left-6 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500 text-stone-950">
                            {{ __('Kategori') }} {{ __($product->category) }}
                        </span>
                        <span class="absolute top-6 right-6 text-xs text-stone-300 font-mono bg-stone-800/80 px-3 py-1 rounded-lg">
                            {{ __($product->net_weight) }}
                        </span>

                        <div class="w-32 h-32 rounded-3xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center shadow-inner my-6">
                            @if($product->category === 'Serbuk')
                                <svg class="w-16 h-16 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7l-2 5h4l-2-5z" />
                                </svg>
                            @else
                                <svg class="w-16 h-16 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v13" />
                                </svg>
                            @endif
                        </div>

                        <div class="text-center">
                            <div class="text-sm text-amber-400 font-bold uppercase tracking-wider">{{ __('Garansi Keaslian') }}</div>
                            <div class="text-xs text-stone-400 mt-1">{{ __('100% Bawang Putih Tunggal Sembalun • Bebas Pengawet') }}</div>
                        </div>
                    </div>

                    <!-- Trust Cards -->
                    <div class="grid grid-cols-3 gap-3 text-center">
                        <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                            <div class="text-xs font-bold text-stone-900">{{ __('35 Hari') }}</div>
                            <div class="text-[10px] text-stone-500 mt-0.5">{{ __('Fermentasi Alami') }}</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                            <div class="text-xs font-bold text-stone-900">Traceable</div>
                            <div class="text-[10px] text-stone-500 mt-0.5">{{ __('Terkontrol Batch') }}</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-stone-50 border border-stone-200">
                            <div class="text-xs font-bold text-stone-900">{{ __('Ramah Maag') }}</div>
                            <div class="text-[10px] text-stone-500 mt-0.5">{{ __('Tidak Iritatif') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Specifications & Order -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <div class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-50 text-amber-800 border border-amber-200 mb-2">
                            {{ __($product->stock_status) }}
                        </div>
                        <h1 class="text-3xl sm:text-4xl font-black text-stone-900 tracking-tight leading-tight">
                            {{ __($product->name) }}
                        </h1>
                        <p class="text-sm font-semibold text-amber-600 mt-1">
                            {{ __($product->subtitle) }}
                        </p>
                    </div>

                    <!-- Price Card -->
                    <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-stone-500 block uppercase tracking-wider font-semibold">{{ __('Harga Resmi') }}</span>
                            <div class="text-3xl font-black text-stone-900">{{ $product->formatted_price }}</div>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-stone-500 block font-medium">{{ __('Kemasan / Netto') }}</span>
                            <div class="text-sm font-bold text-stone-800">{{ __($product->net_weight) }}</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-stone-900">{{ __('Deskripsi Produk') }}</h3>
                        <p class="text-stone-600 text-sm leading-relaxed">
                            {{ __($product->description) }}
                        </p>
                    </div>

                    <!-- Ingredients -->
                    @if($product->ingredients)
                        <div class="space-y-1.5 pt-3 border-t border-stone-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-stone-900">{{ __('Komposisi Bahan:') }}</h3>
                            <p class="text-xs text-stone-700 bg-stone-50 p-3 rounded-xl border border-stone-200">
                                {{ __($product->ingredients) }}
                            </p>
                        </div>
                    @endif

                    <!-- Benefits List -->
                    @if(!empty($product->benefits))
                        <div class="space-y-2 pt-3 border-t border-stone-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-stone-900">{{ __('Khasiat & Manfaat Kesehatan:') }}</h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-stone-700">
                                @foreach($product->benefits as $benefit)
                                    <li class="flex items-start gap-2.5">
                                        <svg class="w-4 h-4 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ __($benefit) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Usage Instructions -->
                    @if($product->usage_instructions)
                        <div class="space-y-1.5 pt-3 border-t border-stone-100">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-stone-900">{{ __('Petunjuk Konsumsi & Penyimpanan:') }}</h3>
                            <p class="text-xs text-stone-600 leading-relaxed bg-amber-50/60 p-3 rounded-xl border border-amber-200/80">
                                {{ __($product->usage_instructions) }}
                            </p>
                        </div>
                    @endif

                    <!-- In-App Purchase & Order Actions -->
                    <div class="pt-6 border-t border-stone-200 space-y-4">
                        <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <!-- Quantity Selector -->
                            <div class="flex items-center gap-4">
                                <label for="qty-input" class="text-xs font-bold uppercase tracking-wider text-stone-700">{{ __('Jumlah:') }}</label>
                                <div class="flex items-center border border-stone-300 rounded-xl bg-white overflow-hidden">
                                    <button type="button" onclick="const q = document.getElementById('qty-input'); if(q.value > 1) q.value--;" class="px-3.5 py-2 text-stone-600 hover:bg-stone-100 font-bold text-sm">−</button>
                                    <input type="number" name="quantity" id="qty-input" value="1" min="1" max="99" class="w-12 text-center text-sm font-bold border-0 focus:ring-0 p-1 font-mono">
                                    <button type="button" onclick="const q = document.getElementById('qty-input'); q.value++;" class="px-3.5 py-2 text-stone-600 hover:bg-stone-100 font-bold text-sm">+</button>
                                </div>
                                <span class="text-xs text-stone-400">{{ __('Stok:') }} <strong class="text-emerald-700">{{ __('Tersedia Siap Kirim') }}</strong></span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                                <!-- Tambah ke Keranjang -->
                                <button type="submit" class="py-3.5 px-6 rounded-2xl text-xs font-bold uppercase tracking-wider text-stone-900 bg-stone-100 hover:bg-stone-200 border border-stone-300 transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-stone-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    <span>{{ __('+ Keranjang') }}</span>
                                </button>

                                <!-- Beli Langsung (Checkout Instant) -->
                                <button type="submit" name="direct_buy" value="1" class="py-3.5 px-6 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-md shadow-amber-900/10 flex items-center justify-center gap-2 transition-all">
                                    <span>{{ __('Beli Sekarang') }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </button>
                            </div>
                        </form>

                        <!-- Alternatif Chat WA & Cek Batch -->
                        <div class="flex items-center justify-between text-xs pt-2">
                            <a href="https://wa.me/6285337369110?text={{ urlencode('Halo Admin Bawang Hitam Sembalun, saya ingin konsultasi mengenai ' . $product->name) }}" target="_blank" class="text-stone-500 hover:text-emerald-700 flex items-center gap-1 font-medium">
                                <svg class="w-3.5 h-3.5 text-emerald-600 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                                {{ __('Tanya CS via WhatsApp (+62 853-3736-9110)') }}
                            </a>
                            <a href="{{ route('traceability') }}" class="text-amber-700 hover:underline font-medium">
                                {{ __('Cek Sertifikat Batch') }} &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- RELATED PRODUCTS -->
    @if($relatedProducts->isNotEmpty())
        <section class="py-16 bg-stone-50 border-t border-stone-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-bold text-stone-900 mb-6">{{ __('Produk Terkait Lainnya') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-white p-5 rounded-2xl border border-stone-200 hover:shadow-md transition-shadow flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">
                                    {{ __($rel->category) }}
                                </span>
                                <h3 class="font-bold text-base text-stone-900 mt-2">{{ __($rel->name) }}</h3>
                                <p class="text-xs text-stone-500 mt-1 line-clamp-2">{{ __($rel->description) }}</p>
                            </div>
                            <div class="pt-4 mt-4 border-t border-stone-100 flex items-center justify-between">
                                <span class="font-bold text-stone-900 text-sm">{{ $rel->formatted_price }}</span>
                                <a href="{{ route('produk.show', $rel->slug) }}" class="text-xs font-bold text-amber-600 hover:underline">
                                    {{ __('Lihat') }} &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
