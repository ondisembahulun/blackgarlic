@extends('layouts.admin')

@section('title', 'Kelola Pesanan Masuk')
@section('header_title', 'Kelola Pesanan Transaksi')

@section('content')
<div class="space-y-6">

    <!-- Header Actions & Search -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 rounded-3xl border border-stone-200 shadow-xs">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Daftar Transaksi & Pesanan Konsumen</h2>
            <p class="text-xs text-stone-500 mt-0.5">Pantau status konfirmasi pembayaran, pengemasan, dan pengiriman resi kurir.</p>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-3xl border border-stone-200 shadow-xs">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-4 gap-3 items-center">
            <div class="sm:col-span-2 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No. Pesanan (BHS-...), nama, atau HP..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                <svg class="w-4 h-4 text-stone-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <div>
                <select name="status" onchange="this.form.submit()" class="w-full py-2 px-3 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 text-stone-700">
                    <option value="">Semua Status Pesanan</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Diproses (Menunggu Verifikasi)</option>
                    <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                    <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Dikirim (Dalam Pengiriman)</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <select name="payment_status" onchange="this.form.submit()" class="w-full py-2 px-3 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 text-stone-700">
                    <option value="">Status Bayar: Semua</option>
                    <option value="pending" {{ request('payment_status') === 'pending' ? 'selected' : '' }}>Menunggu Bayar</option>
                    <option value="paid" {{ request('payment_status') === 'paid' ? 'selected' : '' }}>Sudah Lunas</option>
                    <option value="failed" {{ request('payment_status') === 'failed' ? 'selected' : '' }}>Gagal / Kadaluarsa</option>
                </select>

                @if(request()->hasAny(['search', 'status', 'payment_status']))
                    <a href="{{ route('admin.orders.index') }}" class="text-xs text-stone-500 hover:text-rose-600 underline shrink-0">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100 text-stone-500 font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-6">Pesanan</th>
                        <th class="py-3.5 px-4">Penerima</th>
                        <th class="py-3.5 px-4">Kurir & Kota</th>
                        <th class="py-3.5 px-4">Total Tagihan</th>
                        <th class="py-3.5 px-4">Pembayaran</th>
                        <th class="py-3.5 px-4">Status Pesanan</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($orders as $order)
                        <tr class="hover:bg-stone-50/70 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="font-mono font-bold text-sm text-stone-900">{{ $order->order_number }}</div>
                                <div class="text-[10px] text-stone-400">{{ $order->created_at->format('d M Y, H:i') }} WIB</div>
                                <div class="text-[10px] text-stone-500 mt-0.5">{{ $order->items->count() }} jenis produk</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-bold text-stone-900">{{ $order->customer_name }}</div>
                                <div class="text-[11px] text-stone-500">{{ $order->customer_phone }}</div>
                                <div class="text-[10px] text-stone-400 truncate max-w-[180px]">{{ $order->customer_email }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-semibold text-stone-800">{{ $order->courier }}</div>
                                <div class="text-[11px] text-stone-500">{{ $order->shipping_city }}</div>
                            </td>
                            <td class="py-4 px-4 font-bold text-stone-900 text-sm whitespace-nowrap">
                                {{ $order->formatted_total_amount }}
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div>
                                    @if($order->payment_status === 'paid')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Lunas
                                        </span>
                                    @elseif($order->payment_status === 'pending')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            Gagal
                                        </span>
                                    @endif
                                </div>
                                <div class="text-[10px] text-stone-400 mt-1">{{ $order->payment_method }}</div>
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                @if($order->order_status === 'processing')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                        Diproses
                                    </span>
                                @elseif($order->order_status === 'confirmed')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-sky-100 text-sky-800">
                                        Dikonfirmasi
                                    </span>
                                @elseif($order->order_status === 'shipped')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-100 text-indigo-800">
                                        Dalam Pengiriman
                                    </span>
                                @elseif($order->order_status === 'completed')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Selesai
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-800 bg-amber-50 hover:bg-amber-100 px-3.5 py-1.5 rounded-xl transition-colors">
                                    <span>Kelola &rarr;</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-stone-400 text-xs">
                                Tidak ada transaksi pesanan yang sesuai dengan filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="p-4 border-t border-stone-100">
                {{ $orders->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
