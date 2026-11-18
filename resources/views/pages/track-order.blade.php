@extends('layouts.app')

@section('title', __('Lacak Status Pesanan') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Tracking Pesanan Real-Time') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Lacak Status Pesanan Anda') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Pantau proses verifikasi pembayaran, pengemasan produk higienis, dan pengiriman ekspedisi paket Anda.') }}
            </p>
        </div>
    </section>

    <!-- SEARCH SECTION -->
    <section class="py-12 bg-white border-b border-stone-200">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 shadow-sm">
                <form action="{{ route('order.track') }}" method="GET" class="space-y-4">
                    <label for="q" class="block text-xs font-bold uppercase tracking-wider text-stone-700">
                        {{ __('Masukkan Nomor Pesanan atau Nomor HP') }}
                    </label>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input type="text" name="q" id="q" value="{{ $query }}" required
                               placeholder="{{ __('Contoh: BHS-20261117-XXXXX atau 085337369110') }}" 
                               class="w-full bg-white border border-stone-300 rounded-xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 font-mono">
                        <button type="submit" class="px-7 py-3 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-stone-900 hover:bg-stone-800 transition-colors shrink-0">
                            {{ __('Lacak') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- RESULT SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($searched && $order)
                <div class="bg-stone-50 rounded-3xl p-6 sm:p-8 border border-stone-200 shadow-md space-y-6">
                    
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-stone-200">
                        <div>
                            <span class="text-xs text-stone-400 font-mono">{{ __('No. Pesanan:') }}</span>
                            <h2 class="text-xl font-black text-stone-900">{{ $order->order_number }}</h2>
                            <span class="text-xs text-stone-500">{{ $order->created_at->translatedFormat('d F Y, H:i') }} WITA</span>
                        </div>
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider {{ $order->status_badge['bg'] }} {{ $order->status_badge['text'] }} w-fit">
                            {{ $order->status_badge['label'] }}
                        </span>
                    </div>

                    <!-- Timeline Progress -->
                    <div class="py-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-stone-400 block mb-4">{{ __('Status Alur Pengiriman:') }}</span>
                        <div class="grid grid-cols-4 gap-2 text-center text-xs">
                            <div class="space-y-1">
                                <div class="w-8 h-8 mx-auto rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs">✓</div>
                                <span class="font-bold text-stone-800 text-[11px] block">{{ __('Dipesan') }}</span>
                            </div>
                            <div class="space-y-1">
                                <div class="w-8 h-8 mx-auto rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-xs">2</div>
                                <span class="font-bold text-stone-800 text-[11px] block">{{ __('Diproses') }}</span>
                            </div>
                            <div class="space-y-1">
                                <div class="w-8 h-8 mx-auto rounded-full bg-stone-200 text-stone-600 flex items-center justify-center font-bold text-xs">3</div>
                                <span class="text-stone-400 text-[11px] block">{{ __('Dikirim') }}</span>
                            </div>
                            <div class="space-y-1">
                                <div class="w-8 h-8 mx-auto rounded-full bg-stone-200 text-stone-600 flex items-center justify-center font-bold text-xs">4</div>
                                <span class="text-stone-400 text-[11px] block">{{ __('Tiba') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs pt-4 border-t border-stone-200">
                        <div>
                            <span class="text-stone-400 uppercase font-semibold block">{{ __('Penerima & Alamat:') }}</span>
                            <span class="font-bold text-stone-900 block mt-0.5">{{ $order->customer_name }}</span>
                            <p class="text-stone-600 leading-relaxed">{{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
                        </div>
                        <div>
                            <span class="text-stone-400 uppercase font-semibold block">{{ __('Kurir & Pembayaran:') }}</span>
                            <span class="font-bold text-stone-900 block mt-0.5">{{ $order->courier }} • {{ __($order->payment_method) }}</span>
                            <span class="text-stone-600">{{ __('Total:') }} <strong>{{ $order->formatted_total_amount }}</strong></span>
                        </div>
                    </div>

                    <!-- Ordered Items -->
                    <div class="pt-4 border-t border-stone-200 space-y-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-stone-400 block">{{ __('Produk Dipesan:') }}</span>
                        <div class="divide-y divide-stone-200 text-xs">
                            @foreach($order->items as $item)
                                <div class="py-2 flex justify-between items-center">
                                    <span class="font-medium text-stone-900">{{ __($item->product_name) }} (x{{ $item->quantity }})</span>
                                    <span class="font-bold text-stone-900">{{ $item->formatted_subtotal }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4 border-t border-stone-200 text-center">
                        <a href="{{ route('order.success', $order->order_number) }}" class="text-xs font-bold text-amber-700 hover:underline">
                            {{ __('Lihat Bukti Tagihan / Invoice Lengkap') }} &rarr;
                        </a>
                    </div>
                </div>

            @elseif($searched)
                <div class="text-center py-12 px-6 bg-rose-50 rounded-3xl border border-rose-200 space-y-3">
                    <div class="w-12 h-12 mx-auto rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">!</div>
                    <h3 class="text-base font-bold text-rose-900">{{ __('Pesanan Tidak Ditemukan') }}</h3>
                    <p class="text-xs text-rose-700 max-w-sm mx-auto">
                        {{ __('Nomor pesanan atau nomor HP') }} "<strong>{{ $query }}</strong>" {{ __('tidak cocok dengan data transaksi kami. Pastikan tidak ada kesalahan ketik.') }}
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
