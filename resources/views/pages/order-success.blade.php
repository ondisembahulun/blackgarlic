@extends('layouts.app')

@section('title', __('Bukti Pesanan') . ' #' . $order->order_number . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <section class="py-12 sm:py-16 bg-stone-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Success Hero Banner -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-stone-200 text-center space-y-4 shadow-sm">
                <div class="w-16 h-16 mx-auto rounded-3xl bg-emerald-100 text-emerald-600 flex items-center justify-center shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>

                <div class="space-y-1">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-50 text-emerald-800 border border-emerald-200">
                        {{ __('Transaksi Berhasil Diterima') }}
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-black text-stone-900 tracking-tight pt-2">
                        {{ __('Terima Kasih, :name!', ['name' => $order->customer_name]) }}
                    </h1>
                    <p class="text-xs sm:text-sm text-stone-500 max-w-lg mx-auto leading-relaxed">
                        {{ __('Pesanan Anda telah tercatat di sistem kami dengan nomor pesanan di bawah ini.') }}
                    </p>
                </div>

                <div class="inline-block bg-stone-100 px-5 py-2.5 rounded-2xl border border-stone-200 font-mono text-sm sm:text-base font-bold text-stone-900">
                    {{ __('No. Pesanan:') }} <span class="text-amber-700">{{ $order->order_number }}</span>
                </div>
            </div>

            <!-- Payment Instruction Box -->
            <div class="bg-gradient-to-br from-stone-900 via-stone-850 to-stone-900 text-white rounded-3xl p-6 sm:p-8 border border-stone-800 shadow-xl space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 border-b border-stone-800">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-400">{{ __('Instruksi Pembayaran') }}</span>
                        <h2 class="text-lg sm:text-xl font-bold text-white mt-0.5">
                            {{ __('Metode:') }} {{ __($order->payment_method) }}
                        </h2>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30 w-fit">
                        {{ __('Status: Menunggu Pembayaran') }}
                    </span>
                </div>

                @if(str_contains($order->payment_method, 'BCA'))
                    <!-- BCA Details -->
                    <div class="bg-stone-950/70 p-5 rounded-2xl border border-stone-800 space-y-3">
                        <div class="flex items-center justify-between text-xs text-stone-400">
                            <span>{{ __('Bank Tujuan:') }}</span>
                            <span class="font-bold text-white">Bank Central Asia (BCA)</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-y border-stone-800">
                            <div>
                                <span class="text-[10px] text-stone-400 uppercase font-semibold block">{{ __('Nomor Rekening') }}</span>
                                <span class="text-lg sm:text-xl font-mono font-black text-amber-400" id="rek-bca">8210998877</span>
                            </div>
                            <button type="button" onclick="navigator.clipboard.writeText('8210998877'); alert('{{ __('Nomor rekening BCA berhasil disalin!') }}');" class="px-3 py-1.5 rounded-xl bg-stone-800 hover:bg-stone-700 text-xs font-semibold text-white transition-colors">
                                {{ __('Salin No Rek') }}
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-xs text-stone-400">
                            <span>{{ __('Atas Nama:') }}</span>
                            <span class="font-semibold text-white">Bawang Hitam Sembalun Official</span>
                        </div>
                    </div>
                @elseif(str_contains($order->payment_method, 'Mandiri'))
                    <!-- Mandiri Details -->
                    <div class="bg-stone-950/70 p-5 rounded-2xl border border-stone-800 space-y-3">
                        <div class="flex items-center justify-between text-xs text-stone-400">
                            <span>{{ __('Bank Tujuan:') }}</span>
                            <span class="font-bold text-white">Bank Mandiri</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-y border-stone-800">
                            <div>
                                <span class="text-[10px] text-stone-400 uppercase font-semibold block">{{ __('Nomor Rekening') }}</span>
                                <span class="text-lg sm:text-xl font-mono font-black text-amber-400">1610011223345</span>
                            </div>
                            <button type="button" onclick="navigator.clipboard.writeText('1610011223345'); alert('{{ __('Nomor rekening Mandiri berhasil disalin!') }}');" class="px-3 py-1.5 rounded-xl bg-stone-800 hover:bg-stone-700 text-xs font-semibold text-white transition-colors">
                                {{ __('Salin No Rek') }}
                            </button>
                        </div>
                        <div class="flex items-center justify-between text-xs text-stone-400">
                            <span>{{ __('Atas Nama:') }}</span>
                            <span class="font-semibold text-white">Bawang Hitam Sembalun Official</span>
                        </div>
                    </div>
                @elseif(str_contains($order->payment_method, 'QRIS'))
                    <!-- QRIS Mockup -->
                    <div class="bg-stone-950/70 p-6 rounded-2xl border border-stone-800 text-center space-y-4">
                        <div class="w-36 h-36 mx-auto bg-white rounded-2xl p-2.5 flex items-center justify-center border-2 border-amber-400">
                            <svg class="w-full h-full text-stone-900" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M2 2h8v8H2V2zm2 2v4h4V4H4zm10-2h8v8h-8V2zm2 2v4h4V4h-4zM2 14h8v8H2v-8zm2 2v4h4v-4H4zm14-2h4v2h-4v-2zm-4 2h2v4h-2v-4zm2 2h2v4h-2v-4zm2 2h4v2h-4v-2zM5 5h2v2H5V5zm12 0h2v2h-2V5zM5 17h2v2H5v-2z"/>
                            </svg>
                        </div>
                        <div class="space-y-1">
                            <span class="text-xs font-bold text-amber-400">NMID: ID1020261117001</span>
                            <p class="text-[11px] text-stone-400">{{ __('Buka aplikasi mobile banking atau e-wallet (BCA, GoPay, OVO, Dana, ShopeePay) lalu scan kode di atas.') }}</p>
                        </div>
                    </div>
                @else
                    <!-- COD -->
                    <div class="bg-stone-950/70 p-5 rounded-2xl border border-stone-800 space-y-2 text-xs text-stone-300">
                        <p>{{ __('Pesanan Anda akan dikirim menggunakan kurir') }} <strong>{{ $order->courier }}</strong>. {{ __('Mohon siapkan uang tunai sebesar') }} <strong>{{ $order->formatted_total_amount }}</strong> {{ __('saat kurir mengantarkan paket ke alamat Anda.') }}</p>
                    </div>
                @endif

                <!-- Total Amount To Pay -->
                <div class="p-4 rounded-2xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-amber-300 uppercase font-bold block">{{ __('Total Tagihan Pembayaran') }}</span>
                        <div class="text-2xl sm:text-3xl font-black text-amber-400">{{ $order->formatted_total_amount }}</div>
                    </div>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ (int)$order->total_amount }}'); alert('{{ __('Nominal tagihan berhasil disalin!') }}');" class="px-3.5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-stone-950 text-xs font-bold transition-colors">
                        {{ __('Salin Nominal') }}
                    </button>
                </div>
            </div>

            <!-- Order Details -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-stone-200 shadow-sm space-y-6">
                <h3 class="font-bold text-lg text-stone-900 pb-3 border-b border-stone-200">{{ __('Rincian Pengiriman & Produk') }}</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs">
                    <div class="space-y-1.5">
                        <span class="text-stone-400 uppercase font-semibold block">{{ __('Tujuan Pengiriman') }}</span>
                        <div class="font-bold text-stone-900 text-sm">{{ $order->customer_name }} ({{ $order->customer_phone }})</div>
                        <p class="text-stone-600 leading-relaxed">{{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
                    </div>

                    <div class="space-y-1.5">
                        <span class="text-stone-400 uppercase font-semibold block">{{ __('Ekspedisi Pengiriman') }}</span>
                        <div class="font-bold text-stone-900 text-sm">{{ $order->courier }}</div>
                        <p class="text-stone-600">{{ __('Ongkos Kirim:') }} {{ $order->formatted_shipping_cost }}</p>
                        @if($order->notes)
                            <p class="text-stone-500 italic mt-1">{{ __('Catatan:') }} "{{ $order->notes }}"</p>
                        @endif
                    </div>
                </div>

                <!-- Products Table -->
                <div class="pt-4 border-t border-stone-200 space-y-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-stone-500 block">{{ __('Item Produk') }}</span>
                    <div class="divide-y divide-stone-100 text-xs">
                        @foreach($order->items as $item)
                            <div class="py-3 flex justify-between items-center">
                                <div>
                                    <span class="font-bold text-stone-900 text-sm">{{ __($item->product_name) }}</span>
                                    <div class="text-stone-500 font-mono">{{ $item->quantity }} x {{ $item->formatted_price }}</div>
                                </div>
                                <span class="font-black text-stone-900 text-sm">{{ $item->formatted_subtotal }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Summary Breakdown -->
                <div class="pt-4 border-t border-stone-200 space-y-2 text-xs">
                    <div class="flex justify-between text-stone-600">
                        <span>{{ __('Subtotal Produk') }}</span>
                        <span class="font-bold text-stone-900">{{ $order->formatted_subtotal }}</span>
                    </div>
                    <div class="flex justify-between text-stone-600">
                        <span>{{ __('Biaya Pengiriman') }} ({{ $order->courier }})</span>
                        <span class="font-bold text-stone-900">{{ $order->formatted_shipping_cost }}</span>
                    </div>
                    <div class="pt-2 border-t border-stone-200 flex justify-between text-sm items-baseline">
                        <span class="font-black text-stone-900">{{ __('Total Akhir') }}</span>
                        <span class="font-black text-lg text-amber-700">{{ $order->formatted_total_amount }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                <a href="{{ route('order.track', ['q' => $order->order_number]) }}" class="w-full sm:w-auto px-6 py-3.5 rounded-2xl text-xs font-bold uppercase tracking-wider text-stone-800 bg-white border border-stone-300 hover:bg-stone-100 transition-colors text-center">
                    {{ __('Lacak Status Pesanan') }}
                </a>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button type="button" onclick="window.print()" class="w-full sm:w-auto px-5 py-3.5 rounded-2xl text-xs font-bold uppercase tracking-wider text-stone-800 bg-stone-200 hover:bg-stone-300 transition-colors">
                        {{ __('Cetak Bukti') }}
                    </button>
                    
                    <a href="https://wa.me/6285337369110?text={{ urlencode('Halo Admin Bawang Hitam Sembalun, saya telah melakukan pemesanan dengan No. Pesanan ' . $order->order_number . ' total ' . $order->formatted_total_amount . '. Mohon diproses ya.') }}" target="_blank" class="w-full sm:w-auto px-6 py-3.5 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-emerald-600 hover:bg-emerald-700 transition-colors flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                        <span>{{ __('Konfirmasi via WhatsApp') }}</span>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
