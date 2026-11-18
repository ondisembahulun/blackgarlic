@extends('layouts.app')

@section('title', __('Katalog Produk') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Pangan Fungsional Premium') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Katalog Produk Kami') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Pilihan produk olahan bawang hitam tunggal lereng Rinjani: Black Garlic Utuh, Serbuk Mikroenkapsulasi, serta Varian Produk Turunan.') }}
            </p>
        </div>
    </section>

    <!-- PRODUCT CATALOG & CATEGORY FILTER -->
    <section class="py-16 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Category Tabs (Semua, Utuh, Serbuk, Turunan) -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
                @foreach($categories as $category)
                    <a href="{{ route('produk.index', ['kategori' => $category]) }}" 
                       class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all {{ $selectedCategory === $category ? 'bg-amber-600 text-white shadow-md shadow-amber-900/10' : 'bg-white text-stone-700 hover:bg-stone-200 border border-stone-200' }}">
                        {{ $category === 'Semua' ? __('Semua Produk') : __('Kategori') . ' ' . __($category) }}
                    </a>
                @endforeach
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($products as $product)
                    <div class="bg-white rounded-3xl border border-stone-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        
                        <!-- Top Visual Area -->
                        <div class="relative bg-gradient-to-br from-stone-900 via-stone-850 to-stone-900 p-8 text-center text-white min-h-[200px] flex flex-col items-center justify-center">
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-stone-950">
                                {{ __($product->category) }}
                            </span>
                            <span class="absolute top-4 right-4 text-xs text-stone-300 font-mono bg-stone-950/60 px-2 py-0.5 rounded-md">
                                {{ __($product->net_weight) }}
                            </span>

                            <!-- Icon Iconography -->
                            <div class="w-20 h-20 rounded-2xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                                @if($product->category === 'Serbuk')
                                    <svg class="w-10 h-10 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7l-2 5h4l-2-5z" />
                                    </svg>
                                @elseif($product->category === 'Turunan')
                                    <svg class="w-10 h-10 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                @else
                                    <svg class="w-10 h-10 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v13" />
                                    </svg>
                                @endif
                            </div>

                            <h3 class="text-lg font-bold text-white tracking-tight leading-snug">{{ __($product->name) }}</h3>
                            <p class="text-xs text-amber-300/80 font-medium mt-1">{{ __($product->subtitle) }}</p>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-5">
                            <p class="text-stone-600 text-xs sm:text-sm leading-relaxed line-clamp-3">
                                {{ __($product->description) }}
                            </p>

                            <!-- Mini Features -->
                            @if(!empty($product->benefits))
                                <div class="space-y-1.5 pt-2 border-t border-stone-100">
                                    <div class="text-[10px] font-bold text-stone-500 uppercase tracking-wider">{{ __('Keunggulan:') }}</div>
                                    <p class="text-xs text-stone-700 flex items-start gap-1.5">
                                        <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ __($product->benefits[0] ?? '') }}</span>
                                    </p>
                                </div>
                            @endif

                            <!-- Bottom Price and Actions -->
                            <div class="pt-4 border-t border-stone-200 space-y-3">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-[10px] text-stone-400 uppercase font-semibold block">{{ __('Harga') }}</span>
                                        <div class="text-xl font-black text-stone-900">{{ $product->formatted_price }}</div>
                                    </div>
                                    <a href="{{ route('produk.show', $product->slug) }}" class="text-xs font-bold text-amber-700 hover:text-amber-800 hover:underline">
                                        {{ __('Lihat Detail') }} &rarr;
                                    </a>
                                </div>

                                <div class="grid grid-cols-2 gap-2 pt-1">
                                    <!-- Tambah ke Keranjang Form -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="w-full py-2.5 px-3 rounded-xl text-xs font-bold text-stone-800 bg-stone-100 hover:bg-stone-200 border border-stone-200 transition-colors flex items-center justify-center gap-1.5" title="{{ __('Tambah ke Keranjang') }}">
                                            <svg class="w-4 h-4 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                            <span>{{ __('+ Keranjang') }}</span>
                                        </button>
                                    </form>

                                    <!-- Beli Langsung (Instant Checkout) -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="direct_buy" value="1">
                                        <button type="submit" class="w-full py-2.5 px-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-sm transition-all flex items-center justify-center gap-1">
                                            <span>{{ __('Beli Langsung') }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-stone-200">
                        <p class="text-stone-500">{{ __('Tidak ada produk dalam kategori ini.') }}</p>
                        <a href="{{ route('produk.index') }}" class="inline-block mt-3 text-xs font-bold text-amber-600">{{ __('Tampilkan Semua Produk') }}</a>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
