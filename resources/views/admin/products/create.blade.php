@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')
@section('header_title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Formulir Tambah Produk Baru</h2>
            <p class="text-xs text-stone-500 mt-0.5">Lengkapi spesifikasi produk hilirisasi bawang hitam Sembalun.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-stone-600 hover:text-stone-900 bg-white px-3.5 py-2 rounded-xl border border-stone-200 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 sm:p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Name -->
            <div class="sm:col-span-2">
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Nama Produk <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Contoh: Bawang Hitam Tunggal Premium 200gr" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Kategori <span class="text-rose-500">*</span>
                </label>
                <select name="category" id="category" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                    <option value="Utuh" {{ old('category') === 'Utuh' ? 'selected' : '' }}>Utuh (Bawang Utuh Siap Konsumsi)</option>
                    <option value="Serbuk" {{ old('category') === 'Serbuk' ? 'selected' : '' }}>Serbuk (Bumbu Rempah / Seduhan)</option>
                    <option value="Turunan" {{ old('category') === 'Turunan' ? 'selected' : '' }}>Turunan (Ekstrak Kapsul / Minuman / Madu)</option>
                </select>
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Sub-Judul / Varian Singkat
                </label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" placeholder="Contoh: Fermentasi 35 Hari Alami" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Harga Satuan (Rupiah) <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-2.5 text-xs text-stone-500 font-bold">Rp</span>
                    <input type="number" name="price" id="price" required min="0" step="500" value="{{ old('price', 65000) }}" class="w-full pl-11 pr-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>
            </div>

            <!-- Net Weight -->
            <div>
                <label for="net_weight" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Berat Bersih / Netto <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="net_weight" id="net_weight" required value="{{ old('net_weight', '200 gr') }}" placeholder="Contoh: 200 gr / 60 Kapsul" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Stock Status -->
            <div>
                <label for="stock_status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Status Ketersediaan Stok <span class="text-rose-500">*</span>
                </label>
                <select name="stock_status" id="stock_status" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                    <option value="Tersedia" {{ old('stock_status') === 'Tersedia' ? 'selected' : '' }}>Tersedia (Ready Stock)</option>
                    <option value="Stok Terbatas" {{ old('stock_status') === 'Stok Terbatas' ? 'selected' : '' }}>Stok Terbatas</option>
                    <option value="Habis" {{ old('stock_status') === 'Habis' ? 'selected' : '' }}>Habis (Out of Stock)</option>
                </select>
            </div>

            <!-- Image URL or Upload -->
            <div>
                <label for="image_url" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Pilihan Foto Template Default
                </label>
                <select name="image_url" id="image_url" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 mb-2">
                    <option value="/images/products/img_bawang_hitam_utuh.png" {{ old('image_url') === '/images/products/img_bawang_hitam_utuh.png' ? 'selected' : '' }}>Gambar: Bawang Hitam Utuh</option>
                    <option value="/images/products/img_serbuk_bawang_hitam.png" {{ old('image_url') === '/images/products/img_serbuk_bawang_hitam.png' ? 'selected' : '' }}>Gambar: Serbuk Rempah Bawang</option>
                    <option value="/images/products/img_ekstrak_kapsul.png" {{ old('image_url') === '/images/products/img_ekstrak_kapsul.png' ? 'selected' : '' }}>Gambar: Ekstrak Kapsul Herbal</option>
                </select>
                <div class="text-[11px] text-stone-400">Atau unggah foto baru dari perangkat Anda:</div>
                <input type="file" name="image_file" accept="image/*" class="mt-1 text-xs text-stone-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-stone-100 file:text-stone-700 hover:file:bg-stone-200">
            </div>

            <!-- Description -->
            <div class="sm:col-span-2">
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Deskripsi Lengkap Produk <span class="text-rose-500">*</span>
                </label>
                <textarea name="description" id="description" rows="4" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 leading-relaxed" placeholder="Jelaskan karakteristik, keunggulan rasa manis legit tanpa bau menyengat, serta nilai fungsionalnya...">{{ old('description') }}</textarea>
            </div>

            <!-- Benefits -->
            <div class="sm:col-span-2">
                <label for="benefits" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Daftar Khasiat & Manfaat (1 Baris = 1 Manfaat)
                </label>
                <textarea name="benefits" id="benefits" rows="4" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 leading-relaxed" placeholder="Membantu menurunkan tekanan darah tinggi
Membantu menstabilkan kadar gula darah
Kaya antioksidan S-Allylcysteine (SAC)">{{ old('benefits') }}</textarea>
                <p class="text-[11px] text-stone-400 mt-1">Setiap baris baru akan otomatis ditampilkan sebagai poin checklist centang di halaman detail produk.</p>
            </div>

            <!-- Ingredients -->
            <div>
                <label for="ingredients" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Komposisi Bahan
                </label>
                <input type="text" name="ingredients" id="ingredients" value="{{ old('ingredients', '100% Bawang Putih Tunggal (Single Clove Garlic) Sembalun Asli') }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Usage Instructions -->
            <div>
                <label for="usage_instructions" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Petunjuk Konsumsi
                </label>
                <input type="text" name="usage_instructions" id="usage_instructions" value="{{ old('usage_instructions', 'Konsumsi 1-2 butir setiap pagi sebelum sarapan.') }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Featured Checkbox -->
            <div class="sm:col-span-2 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 rounded-sm border-stone-300 text-amber-600 focus:ring-amber-500">
                    <span class="text-xs font-bold text-stone-800">Tampilkan sebagai Produk Unggulan (Featured) di Halaman Beranda</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-stone-200 flex justify-end gap-3">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-stone-600 hover:bg-stone-100 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                Simpan Produk Baru
            </button>
        </div>

    </form>

</div>
@endsection
