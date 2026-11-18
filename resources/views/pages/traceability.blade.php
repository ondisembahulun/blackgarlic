@extends('layouts.app')

@section('title', __('Traceability') . ' - ' . __('Ketertelusuran Produk Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                {{ __('Transparansi Mutu Pangan') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Traceability (Ketertelusuran Produk)') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Telusuri perjalanan produk Bawang Hitam Sembalun, mulai dari asal bahan baku petani lokal, proses produksi fermentasi, hingga informasi batch dan hasil uji mutu laboratorium.') }}
            </p>
        </div>
    </section>

    <!-- TRACE SEARCH SECTION -->
    <section class="py-12 bg-white border-b border-stone-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-stone-50 rounded-3xl p-6 sm:p-10 border border-stone-200 shadow-md">
                
                <form action="{{ route('traceability') }}" method="GET" class="space-y-4">
                    <label for="kode" class="block text-xs font-bold uppercase tracking-wider text-stone-700">
                        {{ __('Masukkan Kode Batch / Lot Produk') }}
                    </label>
                    <div class="relative flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-stone-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                            </div>
                            <input type="text" name="kode" id="kode" value="{{ $code }}" placeholder="{{ __('Contoh: BHS-2026-A01') }}" 
                                   class="w-full bg-white border border-stone-300 rounded-2xl pl-12 pr-4 py-3.5 text-stone-900 font-mono uppercase tracking-wider text-sm focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                        </div>
                        <button type="submit" class="px-8 py-3.5 rounded-2xl text-xs font-bold uppercase tracking-wider bg-stone-900 hover:bg-stone-800 text-white shadow-md flex items-center justify-center gap-2 transition-all">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <span>{{ __('Lacak Batch') }}</span>
                        </button>
                    </div>

                    <!-- Quick Sample Batch Links -->
                    <div class="flex flex-wrap items-center gap-2 pt-2 text-xs text-stone-500">
                        <span class="font-semibold text-stone-700">{{ __('Pilih Batch Pengujian Cepat:') }}</span>
                        @foreach($sampleBatches as $sBatch)
                            <a href="{{ route('traceability', ['kode' => $sBatch->batch_code]) }}" 
                               class="px-2.5 py-1 rounded-lg font-mono text-[11px] font-bold transition-colors {{ $code === $sBatch->batch_code ? 'bg-amber-600 text-white' : 'bg-white text-amber-800 border border-stone-200 hover:bg-stone-200' }}">
                                {{ $sBatch->batch_code }}
                            </a>
                        @endforeach
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- 5 TAHAPAN KETERTELUSURAN -->
    <section class="py-12 bg-stone-100 border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <span class="text-[11px] font-bold uppercase tracking-wider text-amber-700 bg-amber-50 px-3 py-1 rounded-full">
                    {{ __('Standar Alur Ketertelusuran') }}
                </span>
                <h3 class="text-xl font-bold text-stone-900 mt-2">
                    {{ __('5 Titik Kontrol Mutu Terintegrasi') }}
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <!-- 1. Asal Bahan Baku -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 text-center space-y-2">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xs">
                        1
                    </div>
                    <h4 class="font-bold text-xs uppercase tracking-wide text-stone-900">{{ __('Asal Bahan Baku') }}</h4>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        {{ __('Bawang Putih Tunggal Sembalun (1.100+ mdpl)') }}
                    </p>
                </div>

                <!-- 2. Proses Produksi -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 text-center space-y-2">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xs">
                        2
                    </div>
                    <h4 class="font-bold text-xs uppercase tracking-wide text-stone-900">{{ __('Proses Produksi') }}</h4>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        {{ __('Fermentasi 35 Hari, Ekstraksi & Mikroenkapsulasi') }}
                    </p>
                </div>

                <!-- 3. Informasi Batch -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 text-center space-y-2">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xs">
                        3
                    </div>
                    <h4 class="font-bold text-xs uppercase tracking-wide text-stone-900">{{ __('Informasi Batch') }}</h4>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        {{ __('Tanggal Produksi, Lot Number & Kedaluwarsa') }}
                    </p>
                </div>

                <!-- 4. Uji Mutu & Kualitas -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 text-center space-y-2">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs">
                        4
                    </div>
                    <h4 class="font-bold text-xs uppercase tracking-wide text-stone-900">{{ __('Uji Mutu & Kualitas') }}</h4>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        {{ __('Kadar Air, SAC & Total Polifenol Lab') }}
                    </p>
                </div>

                <!-- 5. Produk Siap Edar -->
                <div class="bg-white p-5 rounded-2xl border border-stone-200 text-center space-y-2">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs">
                        5
                    </div>
                    <h4 class="font-bold text-xs uppercase tracking-wide text-stone-900">{{ __('Produk Siap Edar') }}</h4>
                    <p class="text-[11px] text-stone-500 leading-relaxed">
                        {{ __('Segel Keaslian & QR Traceability Konsumen') }}
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- TRACEABILITY RESULT DISPLAY -->
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($searched && $batch)
                <!-- RESULT FOUND -->
                <div class="rounded-3xl bg-white border-2 border-emerald-500/40 shadow-xl overflow-hidden space-y-8 p-6 sm:p-10">
                    
                    <!-- Verified Header Banner -->
                    <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center shadow-md">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-200/60 px-2.5 py-0.5 rounded-md">
                                    {{ __($batch->status) }} {{ __('Authenticated') }}
                                </span>
                                <h2 class="text-2xl font-black text-stone-900 mt-1">
                                    {{ __($batch->product_name) }}
                                </h2>
                                <p class="text-xs text-stone-500 font-mono mt-0.5">{{ __('Kode Batch:') }} <strong>{{ $batch->batch_code }}</strong> • {{ __('No. Uji Lab:') }} {{ $batch->lab_test_cert_number }}</p>
                            </div>
                        </div>

                        <div class="text-center sm:text-right">
                            <span class="text-[10px] text-stone-500 uppercase font-semibold block">{{ __('Tanggal Kemas') }}</span>
                            <span class="text-sm font-bold text-stone-800">{{ $batch->packaging_date->translatedFormat('d F Y') }}</span>
                            <span class="text-[11px] text-emerald-700 block mt-0.5">Exp: {{ $batch->expiry_date->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>

                    <!-- 4 Detail Sections -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Box 1: Hulu Bahan Baku -->
                        <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-4">
                            <div class="flex items-center gap-2 text-stone-900 font-bold text-sm uppercase tracking-wide">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 20l9-16 9 16H3z"/></svg>
                                <span>{{ __('1. Asal Bahan Baku & Petani') }}</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Kelompok Tani Mitra:') }}</span>
                                    <span class="font-semibold text-stone-900 text-right">{{ __($batch->farm_origin) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Nama Petani Penanggung Jawab:') }}</span>
                                    <span class="font-semibold text-stone-900 text-right">{{ __($batch->farmer_name) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Elevasi Ketinggian Lahan:') }}</span>
                                    <span class="font-semibold text-amber-700 text-right">{{ __($batch->elevation) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Tanggal Panen:') }}</span>
                                    <span class="font-semibold text-stone-900">{{ $batch->harvest_date->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="flex justify-between py-1.5">
                                    <span class="text-stone-500">{{ __('Grade Sortasi Bawang:') }}</span>
                                    <span class="font-semibold text-emerald-700 text-right">{{ __($batch->raw_material_grade) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Box 2: Proses Produksi & Fermentasi -->
                        <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-4">
                            <div class="flex items-center gap-2 text-stone-900 font-bold text-sm uppercase tracking-wide">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                <span>{{ __('2. Proses Fermentasi & Pengolahan') }}</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Mulai Fermentasi:') }}</span>
                                    <span class="font-semibold text-stone-900">{{ $batch->fermentation_start_date->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Selesai Fermentasi:') }}</span>
                                    <span class="font-semibold text-stone-900">{{ $batch->fermentation_end_date->translatedFormat('d F Y') }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Durasi Suhu Terkontrol:') }}</span>
                                    <span class="font-semibold text-amber-700">{{ $batch->fermentation_duration_days }} {{ __('Hari') }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Ruang & Parameter:') }}</span>
                                    <span class="font-semibold text-stone-900 text-right">{{ __($batch->fermentation_chamber) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5">
                                    <span class="text-stone-500">{{ __('Teknologi Formulasi:') }}</span>
                                    <span class="font-semibold text-stone-900 text-right">{{ __($batch->extraction_method ?? 'Natural Curing') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Box 3: Hasil Uji Laboratorium Mutu -->
                        <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 space-y-4">
                            <div class="flex items-center gap-2 text-stone-900 font-bold text-sm uppercase tracking-wide">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ __('3. Parameter Mutu Laboratorium') }}</span>
                            </div>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Kadar Air:') }}</span>
                                    <span class="font-semibold text-stone-900 text-right">{{ __($batch->moisture_content) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Kadar Senyawa Aktif:') }}</span>
                                    <span class="font-semibold text-amber-800 text-right">{{ __($batch->sac_polyphenol_level) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5 border-b border-stone-200">
                                    <span class="text-stone-500">{{ __('Status Verifikasi Mutu:') }}</span>
                                    <span class="font-bold text-emerald-700 text-right">{{ __($batch->quality_test_status) }}</span>
                                </div>
                                <div class="flex justify-between py-1.5">
                                    <span class="text-stone-500">{{ __('No. Sertifikat Lab:') }}</span>
                                    <span class="font-mono text-stone-800">{{ $batch->lab_test_cert_number }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Box 4: Catatan Batch & QR Verifikasi -->
                        <div class="p-6 rounded-2xl bg-stone-50 border border-stone-200 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <div class="text-stone-900 font-bold text-sm uppercase tracking-wide">
                                    {{ __('4. Catatan Analisis Ahli') }}
                                </div>
                                <p class="text-xs text-stone-600 leading-relaxed italic bg-white p-3 rounded-xl border border-stone-200">
                                    "{{ __($batch->notes ?? 'Produk teruji bebas cemaran mikroba dan memiliki bioavailabilitas antioksidan sesuai spesifikasi SNI.') }}"
                                </p>
                            </div>
                            <div class="pt-3 border-t border-stone-200 flex items-center justify-between text-[11px] text-stone-500">
                                <span>{{ __('Status Kemasan:') }} <strong>{{ __('Segel Terverifikasi') }}</strong></span>
                                <span class="text-emerald-700 font-bold">{{ __('100% Original Sembalun') }}</span>
                            </div>
                        </div>

                    </div>

                </div>

            @elseif($searched)
                <!-- RESULT NOT FOUND -->
                <div class="text-center py-12 px-6 bg-rose-50 rounded-3xl border border-rose-200 space-y-4">
                    <div class="w-16 h-16 mx-auto rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-rose-900">{{ __('Kode Batch ":code" Tidak Ditemukan', ['code' => $code]) }}</h3>
                    <p class="text-xs text-rose-700 max-w-md mx-auto leading-relaxed">
                        {{ __('Mohon periksa kembali kode batch yang tercetak di stiker segel kemasan Anda. Pastikan format penulisan sesuai (contoh:') }} <code>BHS-2026-A01</code>).
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('traceability', ['kode' => 'BHS-2026-A01']) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-stone-900 hover:bg-stone-800">
                            {{ __('Coba dengan Contoh Batch BHS-2026-A01') }}
                        </a>
                    </div>
                </div>

            @else
                <!-- INITIAL PROMPT -->
                <div class="text-center py-16 px-6 bg-stone-50 rounded-3xl border border-dashed border-stone-300 space-y-4">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">{{ __('Siap Melacak Produk Anda') }}</h3>
                    <p class="text-xs text-stone-500 max-w-md mx-auto leading-relaxed">
                        {{ __('Masukkan kode lot yang tertera pada kemasan atau klik salah satu tombol batch uji coba di atas untuk melihat simulasi hasil verifikasi ketertelusuran produk.') }}
                    </p>
                </div>
            @endif
        </div>
    </section>
@endsection
