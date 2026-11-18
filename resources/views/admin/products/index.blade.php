@extends('layouts.admin')

@section('title', 'Kelola Produk')
@section('header_title', 'Katalog Produk')

@section('content')
<div class="space-y-5">

    <!-- Header Actions & Search -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 rounded-2xl border border-stone-200 shadow-xs">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Daftar Produk Bawang Hitam Sembalun</h2>
            <p class="text-xs text-stone-500 mt-0.5">Kelola seluruh produk, harga, stok, dan deskripsi khasiat.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Produk Baru</span>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-2xl border border-stone-200 shadow-xs flex flex-col md:flex-row gap-3 items-center justify-between">
        <form action="{{ route('admin.products.index') }}" method="GET" class="w-full flex flex-col sm:flex-row gap-3 items-center">
            <div class="relative w-full sm:w-80">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau kategori..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                <svg class="w-4 h-4 text-stone-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="category" onchange="this.form.submit()" class="w-full sm:w-44 py-2 px-3 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 text-stone-700">
                <option value="">Semua Kategori</option>
                <option value="Utuh" {{ request('category') === 'Utuh' ? 'selected' : '' }}>Utuh</option>
                <option value="Serbuk" {{ request('category') === 'Serbuk' ? 'selected' : '' }}>Serbuk</option>
                <option value="Turunan" {{ request('category') === 'Turunan' ? 'selected' : '' }}>Turunan</option>
            </select>

            <button type="submit" class="w-full sm:w-auto px-4 py-2 text-xs font-semibold text-stone-700 bg-stone-100 hover:bg-stone-200 rounded-xl transition-colors">
                Cari
            </button>

            @if(request()->hasAny(['search', 'category']))
                <a href="{{ route('admin.products.index') }}" class="text-xs text-stone-500 hover:text-rose-600 underline whitespace-nowrap">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- Product Table -->
    <div class="bg-white rounded-2xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100 text-stone-500 text-xs font-bold uppercase tracking-wider whitespace-nowrap">
                        <th class="py-3 px-5">Produk</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Harga & Berat</th>
                        <th class="py-3 px-4">Status Stok</th>
                        <th class="py-3 px-4">Featured</th>
                        <th class="py-3 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($products as $product)
                        @php
                            $hasLocalImage = $product->image_url && (
                                str_starts_with($product->image_url, 'http://') ||
                                str_starts_with($product->image_url, 'https://') ||
                                file_exists(public_path(ltrim($product->image_url, '/')))
                            );
                        @endphp
                        <tr class="hover:bg-stone-50/70 transition-colors">
                            <td class="py-3.5 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-stone-900 text-amber-400 border border-stone-200 overflow-hidden shrink-0 flex items-center justify-center">
                                        @if($hasLocalImage)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        @elseif($product->category === 'Serbuk')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7l-2 5h4l-2-5z"/></svg>
                                        @else
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-bold text-sm text-stone-900 leading-snug">{{ $product->name }}</div>
                                        <div class="text-xs text-stone-400 font-mono truncate max-w-[300px]">/produk/{{ $product->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-bold text-stone-900 text-sm">{{ $product->formatted_price }}</div>
                                <div class="text-xs text-stone-400">{{ $product->net_weight }}</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                @if($product->stock_status === 'Tersedia')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        {{ $product->stock_status }}
                                    </span>
                                @elseif($product->stock_status === 'Stok Terbatas')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                        {{ $product->stock_status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                        {{ $product->stock_status }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                @if($product->is_featured)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                        Unggulan
                                    </span>
                                @else
                                    <span class="text-stone-300 text-xs">-</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-800 bg-amber-50 hover:bg-amber-100 px-3 py-1.5 rounded-xl transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span>Edit</span>
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-xl transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-stone-400 text-xs">
                                Tidak ada produk yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-3.5 border-t border-stone-100">
                {{ $products->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
