@extends('layouts.admin')

@section('title', 'Dashboard Ringkasan Admin')
@section('header_title', 'Dashboard Ringkasan')

@section('content')
<div class="space-y-8">
    
    <!-- Top Welcome Banner -->
    <div class="rounded-3xl bg-gradient-to-r from-stone-900 via-stone-850 to-stone-900 text-white p-6 sm:p-8 border border-stone-800 shadow-sm relative overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30 mb-3">
                Sistem Manajemen Konten Terintegrasi
            </span>
            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                Selamat Datang di Panel Admin Bawang Hitam Sembalun
            </h2>
            <p class="text-xs sm:text-sm text-stone-300 mt-2 leading-relaxed">
                Kelola katalog produk, publikasi artikel edukasi & riset, pembaruan data ketertelusuran (traceability) lereng Rinjani, serta pantau transaksi pemesanan langsung secara mudah.
            </p>
            <div class="flex flex-wrap gap-2.5 mt-5">
                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>+ Tambah Produk</span>
                </a>
                <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-stone-800 hover:bg-stone-700 transition-colors border border-stone-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span>+ Tulis Artikel</span>
                </a>
                <a href="{{ route('admin.traceability.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-stone-800 hover:bg-stone-700 transition-colors border border-stone-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>+ Tambah Batch Traceability</span>
                </a>
            </div>
        </div>
        <div class="absolute right-0 bottom-0 translate-x-10 translate-y-10 opacity-10 pointer-events-none hidden lg:block">
            <svg class="w-80 h-80 text-amber-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
        </div>
    </div>

    <!-- Metric Counter Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Products -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-stone-500 uppercase tracking-wider block">Total Produk</span>
                <div class="text-2xl sm:text-3xl font-black text-stone-900 mt-1">{{ $productsCount }}</div>
                <a href="{{ route('admin.products.index') }}" class="text-[11px] font-bold text-amber-600 hover:underline mt-2 inline-block">
                    Kelola Katalog &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
        </div>

        <!-- Articles -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-stone-500 uppercase tracking-wider block">Artikel & Edukasi</span>
                <div class="text-2xl sm:text-3xl font-black text-stone-900 mt-1">{{ $articlesCount }}</div>
                <a href="{{ route('admin.articles.index') }}" class="text-[11px] font-bold text-amber-600 hover:underline mt-2 inline-block">
                    Kelola Berita &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            </div>
        </div>

        <!-- Batches -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-stone-500 uppercase tracking-wider block">Batch Traceability</span>
                <div class="text-2xl sm:text-3xl font-black text-stone-900 mt-1">{{ $batchesCount }}</div>
                <a href="{{ route('admin.traceability.index') }}" class="text-[11px] font-bold text-amber-600 hover:underline mt-2 inline-block">
                    Lihat Batch &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

        <!-- Orders -->
        <div class="bg-white rounded-3xl p-5 sm:p-6 border border-stone-200 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-stone-500 uppercase tracking-wider block">Pesanan Masuk</span>
                <div class="flex items-baseline gap-2 mt-1">
                    <span class="text-2xl sm:text-3xl font-black text-stone-900">{{ $ordersCount }}</span>
                    @if($pendingOrdersCount > 0)
                        <span class="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full border border-rose-200">
                            {{ $pendingOrdersCount }} baru
                        </span>
                    @endif
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-[11px] font-bold text-amber-600 hover:underline mt-2 inline-block">
                    Pantau Pesanan &rarr;
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
        </div>
    </div>

    <!-- Two Columns: Recent Orders & Recent Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Recent Orders (8 cols) -->
        <div class="lg:col-span-8 bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-stone-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-base text-stone-900">Pesanan Masuk Terbaru</h3>
                    <p class="text-xs text-stone-500 mt-0.5">Transaksi langsung yang dibuat dari aplikasi</p>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-stone-50 border-b border-stone-100 text-stone-500 font-bold uppercase tracking-wider">
                            <th class="py-3 px-5">No. Pesanan</th>
                            <th class="py-3 px-4">Pelanggan</th>
                            <th class="py-3 px-4">Kurir</th>
                            <th class="py-3 px-4">Total</th>
                            <th class="py-3 px-4">Status Bayar</th>
                            <th class="py-3 px-4">Status Pesanan</th>
                            <th class="py-3 px-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($recentOrders as $order)
                            <tr class="hover:bg-stone-50/80 transition-colors">
                                <td class="py-3.5 px-5 font-mono font-bold text-stone-900">
                                    {{ $order->order_number }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-stone-900">{{ $order->customer_name }}</div>
                                    <div class="text-[11px] text-stone-400">{{ $order->customer_phone }}</div>
                                </td>
                                <td class="py-3.5 px-4 text-stone-600">
                                    {{ $order->courier }}
                                </td>
                                <td class="py-3.5 px-4 font-bold text-stone-900">
                                    {{ $order->formatted_total_amount }}
                                </td>
                                <td class="py-3.5 px-4">
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
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-stone-100 text-stone-700">
                                        {{ ucfirst($order->order_status) }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-5 text-right">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-600 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 px-2.5 py-1 rounded-lg transition-colors">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-stone-400">
                                    Belum ada transaksi pesanan yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Contact Messages (4 cols) -->
        <div class="lg:col-span-4 bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden flex flex-col">
            <div class="p-6 border-b border-stone-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-base text-stone-900">Pesan Pengunjung</h3>
                    <p class="text-xs text-stone-500 mt-0.5">Dari formulir kontak website</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700">
                    Semua &rarr;
                </a>
            </div>

            <div class="p-4 flex-1 divide-y divide-stone-100 overflow-y-auto">
                @forelse($recentMessages as $msg)
                    <div class="py-3 first:pt-0 last:pb-0">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-bold text-xs text-stone-900">{{ $msg->name }}</span>
                            <span class="text-[10px] text-stone-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-stone-600 line-clamp-2">{{ $msg->message }}</p>
                        <div class="mt-2 flex items-center justify-between">
                            <span class="text-[10px] text-stone-400 font-mono">{{ $msg->email }}</span>
                            <a href="{{ route('admin.messages.show', $msg) }}" class="text-[11px] font-bold text-amber-600 hover:underline">
                                Baca &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="py-8 text-center text-stone-400 text-xs">
                        Belum ada pesan pengunjung yang masuk.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
