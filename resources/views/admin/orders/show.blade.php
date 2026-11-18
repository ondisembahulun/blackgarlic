@extends('layouts.admin')

@section('title', 'Detail Pesanan: ' . $order->order_number)
@section('header_title', 'Detail Pesanan Konsumen')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 rounded-3xl border border-stone-200 shadow-xs">
        <div>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold uppercase tracking-wider text-stone-500">Nomor Pesanan:</span>
                <span class="font-mono font-black text-lg text-stone-900">{{ $order->order_number }}</span>
            </div>
            <p class="text-xs text-stone-500 mt-0.5">Dibuat pada {{ $order->created_at->format('d F Y, H:i') }} WIB</p>
        </div>
        
        <div class="flex items-center gap-2">
            <!-- Hubungi WhatsApp -->
            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $order->customer_phone)) }}?text=Halo%20{{ urlencode($order->customer_name) }},%20kami%20dari%20Admin%20Bawang%20Hitam%20Sembalun%20mengenai%20pesanan%20{{ $order->order_number }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-colors shadow-xs">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                <span>Chat WA Konsumen</span>
            </a>

            <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-stone-600 hover:text-stone-900 bg-stone-100 px-3.5 py-2 rounded-xl border border-stone-200 transition-colors">
                &larr; Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Customer, Shipping & Items (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Customer & Shipping Card -->
            <div class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 space-y-4">
                <h3 class="font-bold text-sm text-stone-900 pb-3 border-b border-stone-100 flex items-center justify-between">
                    <span>Informasi Penerima & Alamat Kirim</span>
                    <span class="text-xs text-amber-700 bg-amber-50 px-2.5 py-0.5 rounded-full font-bold">{{ $order->courier }}</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-stone-400 block font-semibold">Nama Penerima</span>
                        <div class="font-bold text-stone-900 text-sm mt-0.5">{{ $order->customer_name }}</div>
                    </div>
                    <div>
                        <span class="text-stone-400 block font-semibold">Kontak WhatsApp / HP</span>
                        <div class="font-bold text-stone-900 text-sm mt-0.5">{{ $order->customer_phone }}</div>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="text-stone-400 block font-semibold">Email</span>
                        <div class="font-medium text-stone-800 mt-0.5">{{ $order->customer_email }}</div>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="text-stone-400 block font-semibold">Alamat Lengkap Pengiriman</span>
                        <p class="text-stone-700 leading-relaxed mt-0.5 bg-stone-50 p-3 rounded-xl border border-stone-100">
                            {{ $order->shipping_address }}, {{ $order->shipping_city }}
                        </p>
                    </div>
                    @if($order->notes)
                        <div class="sm:col-span-2">
                            <span class="text-stone-400 block font-semibold">Catatan Khusus dari Pembeli</span>
                            <p class="text-stone-600 italic mt-0.5 bg-amber-50/60 p-2.5 rounded-xl border border-amber-100/80">
                                "{{ $order->notes }}"
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Ordered Products Table -->
            <div class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 space-y-4">
                <h3 class="font-bold text-sm text-stone-900 pb-3 border-b border-stone-100">
                    Daftar Produk yang Dipesan
                </h3>

                <div class="divide-y divide-stone-100 text-xs">
                    @foreach($order->items as $item)
                        <div class="py-3 flex justify-between items-center first:pt-0 last:pb-0">
                            <div>
                                <div class="font-bold text-stone-900 text-sm">{{ $item->product_name }}</div>
                                <div class="text-stone-500 font-mono mt-0.5">{{ $item->quantity }} x {{ $item->formatted_price }}</div>
                            </div>
                            <span class="font-black text-stone-900 text-sm">{{ $item->formatted_subtotal }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="pt-4 border-t border-stone-100 space-y-2 text-xs">
                    <div class="flex justify-between text-stone-600">
                        <span>Subtotal Produk</span>
                        <span class="font-bold text-stone-900">{{ $order->formatted_subtotal }}</span>
                    </div>
                    <div class="flex justify-between text-stone-600">
                        <span>Ongkos Kirim ({{ $order->courier }})</span>
                        <span class="font-bold text-stone-900">{{ $order->formatted_shipping_cost }}</span>
                    </div>
                    <div class="pt-2 border-t border-stone-200 flex justify-between items-baseline text-sm">
                        <span class="font-black text-stone-900 uppercase">Total Tagihan</span>
                        <span class="font-black text-lg text-amber-700">{{ $order->formatted_total_amount }}</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right: Status Update Form (5 cols) -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-stone-200 shadow-xs p-6 space-y-6">
            <h3 class="font-bold text-sm text-stone-900 pb-3 border-b border-stone-100">
                Pembaruan Status Pesanan & Pembayaran
            </h3>

            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Payment Status -->
                <div>
                    <label for="payment_status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Status Pembayaran <span class="text-rose-500">*</span>
                    </label>
                    <select name="payment_status" id="payment_status" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                        <option value="pending" {{ old('payment_status', $order->payment_status) === 'pending' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                        <option value="paid" {{ old('payment_status', $order->payment_status) === 'paid' ? 'selected' : '' }}>Lunas (Pembayaran Terverifikasi)</option>
                        <option value="failed" {{ old('payment_status', $order->payment_status) === 'failed' ? 'selected' : '' }}>Gagal / Batal</option>
                    </select>
                    <p class="text-[10px] text-stone-400 mt-1">Metode dipilih pembeli: <strong class="text-stone-700">{{ $order->payment_method }}</strong></p>
                </div>

                <!-- Order Status -->
                <div>
                    <label for="order_status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Status Alur Pesanan <span class="text-rose-500">*</span>
                    </label>
                    <select name="order_status" id="order_status" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                        <option value="processing" {{ old('order_status', $order->order_status) === 'processing' ? 'selected' : '' }}>Diproses (Menunggu Verifikasi & Fermentasi)</option>
                        <option value="confirmed" {{ old('order_status', $order->order_status) === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi (Sedang Dikemas / Packing)</option>
                        <option value="shipped" {{ old('order_status', $order->order_status) === 'shipped' ? 'selected' : '' }}>Dalam Pengiriman (Sudah Diserahkan ke Kurir)</option>
                        <option value="completed" {{ old('order_status', $order->order_status) === 'completed' ? 'selected' : '' }}>Selesai (Paket Diterima Pembeli)</option>
                        <option value="cancelled" {{ old('order_status', $order->order_status) === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>

                <!-- Shipping Tracking Number / Resi -->
                <div>
                    <label for="payment_reference" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Nomor Resi Pengiriman Kurir / Ref
                    </label>
                    <input type="text" name="payment_reference" id="payment_reference" value="{{ old('payment_reference', $order->payment_reference) }}" placeholder="Contoh: JT8923482938 / No Resi J&T" class="w-full px-3.5 py-2.5 text-xs font-mono rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                    <p class="text-[10px] text-stone-400 mt-1">Nomor resi ini akan dapat dilihat oleh konsumen saat melacak pesanan di halaman Lacak Pesanan.</p>
                </div>

                <div class="pt-4 border-t border-stone-100">
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                        Simpan Perubahan Status
                    </button>
                </div>
            </form>

            <!-- Order Tracking Preview Link -->
            <div class="pt-4 border-t border-stone-100 text-center">
                <a href="{{ route('order.track', ['q' => $order->order_number]) }}" target="_blank" class="text-xs text-amber-600 hover:text-amber-700 font-bold inline-flex items-center gap-1">
                    <span>Lihat Halaman Lacak Pembeli &rarr;</span>
                </a>
            </div>

        </div>

    </div>

</div>
@endsection
