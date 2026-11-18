@extends('layouts.admin')

@section('title', 'Edit Artikel: ' . $article->title)
@section('header_title', 'Edit Artikel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Edit Artikel: {{ $article->title }}</h2>
            <p class="text-xs text-stone-500 mt-0.5">Perbarui teks edukasi, ringkasan, atau status publikasi.</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="text-xs font-bold text-stone-600 hover:text-stone-900 bg-white px-3.5 py-2 rounded-xl border border-stone-200 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 sm:p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="sm:col-span-2">
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Judul Artikel <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" required value="{{ old('title', $article->title) }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Kategori Artikel <span class="text-rose-500">*</span>
                </label>
                <select name="category" id="category" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                    <option value="Edukasi" {{ old('category', $article->category) === 'Edukasi' ? 'selected' : '' }}>Edukasi (Khasiat & Konsumsi)</option>
                    <option value="Kegiatan" {{ old('category', $article->category) === 'Kegiatan' ? 'selected' : '' }}>Kegiatan (Pemberdayaan Petani & Panen)</option>
                    <option value="Penelitian" {{ old('category', $article->category) === 'Penelitian' ? 'selected' : '' }}>Penelitian (Uji Klinis & Laboratorium)</option>
                    <option value="Pengembangan Produk" {{ old('category', $article->category) === 'Pengembangan Produk' ? 'selected' : '' }}>Pengembangan Produk (Inovasi & Standarisasi)</option>
                </select>
            </div>

            <!-- Author -->
            <div>
                <label for="author" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Nama Penulis / Tim Riset <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="author" id="author" required value="{{ old('author', $article->author) }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Published At -->
            <div>
                <label for="published_at" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Tanggal Rilis / Publikasi <span class="text-rose-500">*</span>
                </label>
                <input type="date" name="published_at" id="published_at" required value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Reading Time -->
            <div>
                <label for="reading_time" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Estimasi Waktu Baca
                </label>
                <input type="text" name="reading_time" id="reading_time" value="{{ old('reading_time', $article->reading_time) }}" class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
            </div>

            <!-- Summary -->
            <div class="sm:col-span-2">
                <label for="summary" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Ringkasan Singkat (Summary) <span class="text-rose-500">*</span>
                </label>
                <textarea name="summary" id="summary" rows="3" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 leading-relaxed">{{ old('summary', $article->summary) }}</textarea>
            </div>

            <!-- Content -->
            <div class="sm:col-span-2">
                <label for="content" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Isi Konten Artikel Lengkap <span class="text-rose-500">*</span>
                </label>
                <textarea name="content" id="content" rows="12" required class="w-full px-4 py-2.5 text-sm rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 leading-relaxed font-sans">{{ old('content', $article->content) }}</textarea>
            </div>

            <!-- Image Upload or Preset -->
            <div class="sm:col-span-2">
                <label for="image_file" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                    Ganti Foto Sampul Artikel
                </label>
                <input type="file" name="image_file" id="image_file" accept="image/*" class="text-xs text-stone-600 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-stone-100 file:text-stone-700 hover:file:bg-stone-200">
            </div>

            <!-- Published Checkbox -->
            <div class="sm:col-span-2 pt-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published) ? 'checked' : '' }} class="w-4 h-4 rounded-sm border-stone-300 text-amber-600 focus:ring-amber-500">
                    <span class="text-xs font-bold text-stone-800">Publikasikan Langsung ke Website (Terbaca oleh publik)</span>
                </label>
            </div>
        </div>

        <div class="pt-6 border-t border-stone-200 flex justify-end gap-3">
            <a href="{{ route('admin.articles.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-stone-600 hover:bg-stone-100 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                Perbarui Artikel
            </button>
        </div>

    </form>

</div>
@endsection
