@extends('layouts.app')

@section('title', __('Keranjang Belanja') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- BREADCRUMB -->
    <div class="bg-stone-100 border-b border-stone-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-amber-600">{{ __('Beranda') }}</a>
                <span>/</span>
                <a href="{{ route('produk.index') }}" class="hover:text-amber-600">{{ __('Produk') }}</a>
                <span>/</span>
                <span class="text-stone-900 font-semibold">{{ __('Keranjang Belanja') }}</span>
            </div>
        </div>
    </div>

    <section class="py-12 sm:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-stone-200">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-black text-stone-900 tracking-tight">
                        {{ __('Keranjang Belanja') }}
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-500 mt-1">
                        {{ __('Periksa item produk pilihan Anda sebelum melanjutkan transaksi pembayaran.') }}
                    </p>
                </div>
                @if(!empty($cart))
                    <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('{{ __('Kosongkan semua item di keranjang?') }}');">
                        @csrf
                        <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700 hover:underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            {{ __('Kosongkan Keranjang') }}
                        </button>
                    </form>
                @endif
            </div>

            @if(empty($cart))
                <!-- EMPTY STATE -->
                <div class="text-center py-20 px-6 bg-stone-50 rounded-3xl border border-dashed border-stone-300 max-w-2xl mx-auto space-y-5">
                    <div class="w-20 h-20 mx-auto rounded-3xl bg-amber-100 text-amber-700 flex items-center justify-center">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-stone-900">{{ __('Keranjang Belanja Anda Kosong') }}</h2>
                        <p class="text-xs sm:text-sm text-stone-500 max-w-md mx-auto mt-1">
                            {{ __('Anda belum menambahkan produk Bawang Hitam Sembalun ke keranjang belanja.') }}
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('produk.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-stone-900 hover:bg-stone-800 shadow-md transition-all">
                            <span>{{ __('Mulai Belanja Produk') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

            @else
                <!-- CART ITEMS & SUMMARY -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    
                    <!-- Left: Cart Items List -->
                    <div class="lg:col-span-8 space-y-4">
                        @foreach($cart as $id => $item)
                            <div class="bg-stone-50 rounded-2xl p-5 border border-stone-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center shrink-0 text-amber-700">
                                        @if(($item['category'] ?? '') === 'Serbuk')
                                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z" /></svg>
                                        @else
                                            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z" /></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-amber-100 text-amber-800">
                                            {{ __($item['category']) }}
                                        </span>
                                        <h3 class="font-bold text-base text-stone-900 mt-1">
                                            <a href="{{ route('produk.show', $item['slug']) }}" class="hover:text-amber-600 transition-colors">
                                                {{ __($item['name']) }}
                                            </a>
                                        </h3>
                                        <p class="text-xs text-stone-500 font-mono">{{ __($item['net_weight']) }} • Rp {{ number_format($item['price'], 0, ',', '.') }} / item</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-6 pt-3 sm:pt-0 border-t sm:border-t-0 border-stone-200">
                                    <!-- Quantity Form Stepper -->
                                    <div class="flex items-center border border-stone-300 rounded-xl bg-white overflow-hidden">
                                        <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                            <button type="submit" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 font-bold text-sm" title="{{ __('Kurangi') }}">−</button>
                                        </form>
                                        <span class="px-3 py-1 text-xs font-bold text-stone-900 font-mono">{{ $item['quantity'] }}</span>
                                        <form action="{{ route('cart.update') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                            <button type="submit" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 font-bold text-sm" title="{{ __('Tambah') }}">+</button>
                                        </form>
                                    </div>

                                    <!-- Subtotal -->
                                    <div class="text-right min-w-[100px]">
                                        <span class="text-[10px] text-stone-400 block uppercase font-semibold">{{ __('Subtotal') }}</span>
                                        <span class="font-black text-sm text-stone-900">
                                            Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Delete Button -->
                                    <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $id }}">
                                        <button type="submit" class="text-stone-400 hover:text-rose-600 p-1 rounded-lg transition-colors" title="{{ __('Hapus produk') }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        @endforeach

                        <div class="pt-4">
                            <a href="{{ route('produk.index') }}" class="text-xs font-bold text-amber-700 hover:text-amber-800 flex items-center gap-1">
                                &larr; {{ __('Tambah Produk Lainnya') }}
                            </a>
                        </div>
                    </div>

                    <!-- Right: Order Summary Card -->
                    <div class="lg:col-span-4 bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 shadow-sm space-y-6">
                        <h3 class="font-bold text-lg text-stone-900">{{ __('Ringkasan Pesanan') }}</h3>
                        
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between text-stone-600">
                                <span>{{ __('Total Item') }}</span>
                                <span class="font-bold text-stone-900 font-mono">{{ array_sum(array_column($cart, 'quantity')) }} pcs</span>
                            </div>
                            <div class="flex justify-between text-stone-600">
                                <span>{{ __('Subtotal Belanja') }}</span>
                                <span class="font-bold text-stone-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-stone-600">
                                <span>{{ __('Estimasi Ongkir') }}</span>
                                <span class="text-xs text-stone-500 italic">{{ __('Dihitung di checkout') }}</span>
                            </div>
                            <div class="pt-3 border-t border-stone-200 flex justify-between items-baseline">
                                <span class="font-extrabold text-stone-900">{{ __('Total Sementara') }}</span>
                                <span class="font-black text-xl text-amber-700">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="w-full py-4 px-6 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-lg shadow-amber-900/10 flex items-center justify-center gap-2 transition-all">
                            <span>{{ __('Lanjut ke Pembayaran') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>

                        <div class="pt-2 border-t border-stone-200 space-y-2 text-[11px] text-stone-500">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                <span>{{ __('Transaksi Aman & Terenkripsi') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ __('Pengemasan Segel Vakum Higienis') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </section>
@endsection
