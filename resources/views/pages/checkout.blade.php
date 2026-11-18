@extends('layouts.app')

@section('title', __('Checkout Pembayaran') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- BREADCRUMB -->
    <div class="bg-stone-100 border-b border-stone-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-amber-600">{{ __('Beranda') }}</a>
                <span>/</span>
                <a href="{{ route('cart.index') }}" class="hover:text-amber-600">{{ __('Keranjang') }}</a>
                <span>/</span>
                <span class="text-stone-900 font-semibold">{{ __('Formulir Checkout & Pembayaran') }}</span>
            </div>
        </div>
    </div>

    <section class="py-12 sm:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-10">
                <h1 class="text-2xl sm:text-3xl font-black text-stone-900 tracking-tight">
                    {{ __('Checkout & Pembayaran Langsung') }}
                </h1>
                <p class="text-xs sm:text-sm text-stone-500 mt-1">
                    {{ __('Lengkapi alamat pengiriman dan pilih metode pembayaran resmi Anda.') }}
                </p>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    
                    <!-- Left: Form Input (Alamat, Kurir, Pembayaran) -->
                    <div class="lg:col-span-8 space-y-8">
                        
                        <!-- 1. Data Penerima -->
                        <div class="bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 space-y-5">
                            <div class="flex items-center gap-3 pb-3 border-b border-stone-200">
                                <span class="w-8 h-8 rounded-xl bg-amber-600 text-white font-bold text-xs flex items-center justify-center">1</span>
                                <h2 class="font-bold text-base text-stone-900">{{ __('Informasi Penerima Pesanan') }}</h2>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="sm:col-span-2">
                                    <label for="customer_name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Nama Lengkap Penerima') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required 
                                           placeholder="{{ __('Contoh: Budi Santoso') }}"
                                           class="w-full bg-white border border-stone-300 rounded-xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('customer_name') border-rose-500 @enderror">
                                    @error('customer_name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="customer_phone" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Nomor WhatsApp / HP Aktif') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}" required 
                                           placeholder="085337369110"
                                           class="w-full bg-white border border-stone-300 rounded-xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('customer_phone') border-rose-500 @enderror">
                                    @error('customer_phone') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Alamat Email') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required 
                                           placeholder="nama@email.com"
                                           class="w-full bg-white border border-stone-300 rounded-xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('customer_email') border-rose-500 @enderror">
                                    @error('customer_email') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- 2. Alamat & Kurir Pengiriman -->
                        <div class="bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 space-y-5">
                            <div class="flex items-center gap-3 pb-3 border-b border-stone-200">
                                <span class="w-8 h-8 rounded-xl bg-amber-600 text-white font-bold text-xs flex items-center justify-center">2</span>
                                <h2 class="font-bold text-base text-stone-900">{{ __('Alamat Pengiriman & Kurir') }}</h2>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="shipping_city" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Kota / Kabupaten & Provinsi') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city') }}" required 
                                           placeholder="{{ __('Contoh: Mataram / Jakarta Selatan / Surabaya') }}"
                                           class="w-full bg-white border border-stone-300 rounded-xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('shipping_city') border-rose-500 @enderror">
                                    @error('shipping_city') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="shipping_address" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Alamat Lengkap (Jalan, No Rumah, RT/RW, Dusun/Kelurahan)') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <textarea name="shipping_address" id="shipping_address" rows="3" required 
                                              placeholder="{{ __('Tuliskan nama jalan, nomor rumah, RT/RW, patokan lokasi...') }}"
                                              class="w-full bg-white border border-stone-300 rounded-xl p-3.5 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('shipping_address') border-rose-500 @enderror">{{ old('shipping_address') }}</textarea>
                                    @error('shipping_address') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                                </div>

                                <!-- Courier Selection -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">
                                        {{ __('Pilih Ekspedisi Kurir') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        @foreach($couriers as $courierName => $rate)
                                            <label class="flex items-center justify-between p-3.5 bg-white border border-stone-300 rounded-2xl cursor-pointer hover:border-amber-500 transition-colors">
                                                <div class="flex items-center gap-3">
                                                    <input type="radio" name="courier" value="{{ $courierName }}" data-cost="{{ $rate }}" {{ $loop->first ? 'checked' : '' }} class="courier-radio text-amber-600 focus:ring-amber-500">
                                                    <div>
                                                        <div class="text-xs font-bold text-stone-900">{{ $courierName }}</div>
                                                        <div class="text-[10px] text-stone-400">{{ __('Estimasi 2-4 Hari Kerja') }}</div>
                                                    </div>
                                                </div>
                                                <span class="text-xs font-black text-stone-900">Rp {{ number_format($rate, 0, ',', '.') }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Metode Pembayaran -->
                        <div class="bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 space-y-5">
                            <div class="flex items-center gap-3 pb-3 border-b border-stone-200">
                                <span class="w-8 h-8 rounded-xl bg-amber-600 text-white font-bold text-xs flex items-center justify-center">3</span>
                                <h2 class="font-bold text-base text-stone-900">{{ __('Metode Pembayaran') }}</h2>
                            </div>

                            <div class="space-y-3">
                                @foreach($paymentMethods as $methodName => $method)
                                    <label class="block p-4 bg-white border border-stone-300 rounded-2xl cursor-pointer hover:border-amber-500 transition-all">
                                        <div class="flex items-start gap-3">
                                            <input type="radio" name="payment_method" value="{{ $methodName }}" {{ $loop->first ? 'checked' : '' }} class="mt-1 text-amber-600 focus:ring-amber-500">
                                            <div class="space-y-1">
                                                <div class="font-bold text-sm text-stone-900 flex items-center gap-2">
                                                    <span>{{ __($methodName) }}</span>
                                                    @if(str_contains($methodName, 'QRIS'))
                                                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-emerald-100 text-emerald-800">{{ __('Instant') }}</span>
                                                    @endif
                                                </div>
                                                <p class="text-xs text-stone-500">{{ $method['description'] }}</p>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <!-- Catatan Tambahan -->
                            <div class="pt-2">
                                <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                    {{ __('Catatan Tambahan untuk Penjual (Opsional)') }}
                                </label>
                                <input type="text" name="notes" id="notes" value="{{ old('notes') }}" placeholder="{{ __('Contoh: Harap bungkus bubble wrap tebal / kirim sebelum jam 3 sore') }}"
                                       class="w-full bg-white border border-stone-300 rounded-xl px-4 py-2.5 text-xs text-stone-900 focus:outline-hidden focus:border-amber-500">
                            </div>
                        </div>

                    </div>

                    <!-- Right: Order Summary Sticky Box -->
                    <div class="lg:col-span-4 bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 shadow-sm space-y-6 sticky top-28">
                        <h3 class="font-bold text-lg text-stone-900 pb-3 border-b border-stone-200">{{ __('Pesanan Anda') }}</h3>
                        
                        <!-- Item List Preview -->
                        <div class="space-y-3 max-h-60 overflow-y-auto pr-1 divide-y divide-stone-100 text-xs">
                            @foreach($cart as $item)
                                <div class="pt-2 first:pt-0 flex justify-between items-start gap-2">
                                    <div>
                                        <div class="font-bold text-stone-900 leading-snug">{{ __($item['name']) }}</div>
                                        <div class="text-[11px] text-stone-400 font-mono">{{ $item['quantity'] }}x @ Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                    </div>
                                    <div class="font-black text-stone-900 shrink-0">
                                        Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Calculations -->
                        <div class="space-y-2 pt-4 border-t border-stone-200 text-xs">
                            <div class="flex justify-between text-stone-600">
                                <span>{{ __('Subtotal Produk') }}</span>
                                <span class="font-bold text-stone-900" id="display-subtotal" data-subtotal="{{ $subtotal }}">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between text-stone-600">
                                <span>{{ __('Ongkos Kirim') }}</span>
                                <span class="font-bold text-stone-900" id="display-shipping">Rp 15.000</span>
                            </div>
                            <div class="pt-3 border-t border-stone-300 flex justify-between items-baseline">
                                <span class="text-sm font-black text-stone-900 uppercase tracking-wide">{{ __('Total Tagihan') }}</span>
                                <span class="text-xl font-black text-amber-700" id="display-total">
                                    Rp {{ number_format($subtotal + 15000, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-4 px-6 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-700 hover:to-amber-800 shadow-xl shadow-amber-900/10 flex items-center justify-center gap-2 transition-all">
                            <span>{{ __('Konfirmasi & Buat Pesanan') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </button>

                        <p class="text-[11px] text-stone-400 text-center leading-relaxed">
                            {{ __('Dengan mengklik tombol di atas, Anda memesan produk asli langsung dari sentra Bawang Hitam Sembalun.') }}
                        </p>
                    </div>

                </div>
            </form>

        </div>
    </section>

    <!-- DYNAMIC SHIPPING COST JS -->
    <script>
        (function() {
            function initCheckoutShipping() {
                const radios = document.querySelectorAll('.courier-radio');
                const subtotalElem = document.getElementById('display-subtotal');
                const shippingElem = document.getElementById('display-shipping');
                const totalElem = document.getElementById('display-total');

                if (!radios.length || !subtotalElem || !shippingElem || !totalElem) return;

                const subtotal = parseFloat(subtotalElem.getAttribute('data-subtotal')) || 0;

                function formatRupiah(amount) {
                    return 'Rp ' + amount.toLocaleString('id-ID');
                }

                radios.forEach(radio => {
                    radio.addEventListener('change', function () {
                        const cost = parseFloat(this.getAttribute('data-cost')) || 0;
                        shippingElem.textContent = formatRupiah(cost);
                        totalElem.textContent = formatRupiah(subtotal + cost);
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initCheckoutShipping);
            } else {
                initCheckoutShipping();
            }
            window.addEventListener('page:swapped', initCheckoutShipping);
        })();
    </script>
@endsection
