@extends('layouts.admin')

@section('title', 'Edit Batch: ' . $batch->batch_code)
@section('header_title', 'Edit Batch Traceability')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Edit Batch Ketertelusuran: {{ $batch->batch_code }}</h2>
            <p class="text-xs text-stone-500 mt-0.5">Perbarui data uji mutu lab, tanggal fermentasi, atau status verifikasi.</p>
        </div>
        <a href="{{ route('admin.traceability.index') }}" class="text-xs font-bold text-stone-600 hover:text-stone-900 bg-white px-3.5 py-2 rounded-xl border border-stone-200 transition-colors">
            &larr; Kembali
        </a>
    </div>

    <form action="{{ route('admin.traceability.update', $batch) }}" method="POST" class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 sm:p-8 space-y-8">
        @csrf
        @method('PUT')

        <!-- Section 1: Asal Usul & Petani -->
        <div class="space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-amber-600 pb-2 border-b border-stone-100 flex items-center gap-2">
                <span>1. Identitas Batch & Kebun Panen Sembalun</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="batch_code" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Nomor / Kode Batch <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="batch_code" id="batch_code" required value="{{ old('batch_code', $batch->batch_code) }}" class="w-full px-3.5 py-2.5 text-xs font-mono font-bold rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="product_name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Nama Produk Terkait <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="product_name" id="product_name" list="product-list" required value="{{ old('product_name', $batch->product_name) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                    <datalist id="product-list">
                        @foreach($products as $pName)
                            <option value="{{ $pName }}"></option>
                        @endforeach
                    </datalist>
                </div>

                <div>
                    <label for="farm_origin" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Lokasi Asal Kebun <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="farm_origin" id="farm_origin" required value="{{ old('farm_origin', $batch->farm_origin) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="elevation" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Elevasi Ketinggian <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="elevation" id="elevation" required value="{{ old('elevation', $batch->elevation) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="farmer_name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Nama Petani Mitra / Poktan <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="farmer_name" id="farmer_name" required value="{{ old('farmer_name', $batch->farmer_name) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="harvest_date" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Tanggal Panen Bawang <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="harvest_date" id="harvest_date" required value="{{ old('harvest_date', $batch->harvest_date ? $batch->harvest_date->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div class="sm:col-span-2">
                    <label for="raw_material_grade" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Grade Bahan Baku <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="raw_material_grade" id="raw_material_grade" required value="{{ old('raw_material_grade', $batch->raw_material_grade) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>
            </div>
        </div>

        <!-- Section 2: Proses Fermentasi -->
        <div class="space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-amber-600 pb-2 border-b border-stone-100 flex items-center gap-2">
                <span>2. Parameter Proses Fermentasi Alami</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="fermentation_start_date" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Mulai Fermentasi <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="fermentation_start_date" id="fermentation_start_date" required value="{{ old('fermentation_start_date', $batch->fermentation_start_date ? $batch->fermentation_start_date->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="fermentation_end_date" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Selesai Fermentasi <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="fermentation_end_date" id="fermentation_end_date" required value="{{ old('fermentation_end_date', $batch->fermentation_end_date ? $batch->fermentation_end_date->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="fermentation_duration_days" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Durasi (Hari) <span class="text-rose-500">*</span>
                    </label>
                    <input type="number" name="fermentation_duration_days" id="fermentation_duration_days" required min="1" value="{{ old('fermentation_duration_days', $batch->fermentation_duration_days) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div class="sm:col-span-2">
                    <label for="fermentation_chamber" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Ruang Inkubasi / Chamber <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="fermentation_chamber" id="fermentation_chamber" required value="{{ old('fermentation_chamber', $batch->fermentation_chamber) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="extraction_method" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Metode Ekstraksi / Olah
                    </label>
                    <input type="text" name="extraction_method" id="extraction_method" value="{{ old('extraction_method', $batch->extraction_method) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>
            </div>
        </div>

        <!-- Section 3: Uji Mutu Lab & Pengemasan -->
        <div class="space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-amber-600 pb-2 border-b border-stone-100 flex items-center gap-2">
                <span>3. Uji Mutu Laboratorium, Kemasan & Validasi</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="sac_polyphenol_level" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Kadar SAC & Polifenol <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="sac_polyphenol_level" id="sac_polyphenol_level" required value="{{ old('sac_polyphenol_level', $batch->sac_polyphenol_level) }}" class="w-full px-3.5 py-2.5 text-xs font-mono rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="moisture_content" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Kadar Kelembapan (Moisture) <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="moisture_content" id="moisture_content" required value="{{ old('moisture_content', $batch->moisture_content) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="quality_test_status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Status Kelayakan Uji Mutu <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="quality_test_status" id="quality_test_status" required value="{{ old('quality_test_status', $batch->quality_test_status) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="lab_test_cert_number" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Nomor Sertifikat Uji Lab <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="lab_test_cert_number" id="lab_test_cert_number" required value="{{ old('lab_test_cert_number', $batch->lab_test_cert_number) }}" class="w-full px-3.5 py-2.5 text-xs font-mono rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="packaging_date" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Tanggal Pengemasan <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="packaging_date" id="packaging_date" required value="{{ old('packaging_date', $batch->packaging_date ? $batch->packaging_date->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="expiry_date" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Tanggal Kedaluwarsa (Expired) <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="expiry_date" id="expiry_date" required value="{{ old('expiry_date', $batch->expiry_date ? $batch->expiry_date->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>

                <div>
                    <label for="status" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Status Verifikasi Batch <span class="text-rose-500">*</span>
                    </label>
                    <select name="status" id="status" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                        <option value="Verified" {{ old('status', $batch->status) === 'Verified' ? 'selected' : '' }}>Verified (Terverifikasi Penuh & Siap Beredar)</option>
                        <option value="In Testing" {{ old('status', $batch->status) === 'In Testing' ? 'selected' : '' }}>In Testing (Masih Uji Lab Mutu)</option>
                        <option value="Archived" {{ old('status', $batch->status) === 'Archived' ? 'selected' : '' }}>Archived (Batch Telah Selesai Terjual)</option>
                    </select>
                </div>

                <div>
                    <label for="notes" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1">
                        Catatan Internal Batch
                    </label>
                    <input type="text" name="notes" id="notes" value="{{ old('notes', $batch->notes) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-stone-200 flex justify-end gap-3">
            <a href="{{ route('admin.traceability.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-stone-600 hover:bg-stone-100 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
                Perbarui Batch Traceability
            </button>
        </div>

    </form>

</div>
@endsection
