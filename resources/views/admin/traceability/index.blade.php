@extends('layouts.admin')

@section('title', 'Kelola Batch Ketertelusuran (Traceability)')
@section('header_title', 'Batch Ketertelusuran')

@section('content')
<div class="space-y-6">

    <!-- Header Actions & Search -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 rounded-3xl border border-stone-200 shadow-xs">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Batch Ketertelusuran (Traceability) Lereng Rinjani</h2>
            <p class="text-xs text-stone-500 mt-0.5">Kelola data asal kebun, tanggal fermentasi, sertifikat mutu lab, dan kode QR kemasan.</p>
        </div>
        <a href="{{ route('admin.traceability.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-stone-950 bg-amber-400 hover:bg-amber-300 transition-colors shadow-xs">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Batch Baru</span>
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-3xl border border-stone-200 shadow-xs flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="{{ route('admin.traceability.index') }}" method="GET" class="w-full flex flex-col sm:flex-row gap-3 items-center">
            <div class="relative w-full sm:w-96">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode batch (misal: BHS-2026-A01), nama petani, atau kebun..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                <svg class="w-4 h-4 text-stone-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <button type="submit" class="w-full sm:w-auto px-4 py-2 text-xs font-semibold text-stone-700 bg-stone-100 hover:bg-stone-200 rounded-xl transition-colors">
                Cari
            </button>

            @if(request()->has('search'))
                <a href="{{ route('admin.traceability.index') }}" class="text-xs text-stone-500 hover:text-rose-600 underline">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- Batches Table -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100 text-stone-500 font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-6">Kode Batch</th>
                        <th class="py-3.5 px-4">Produk</th>
                        <th class="py-3.5 px-4">Asal & Petani Mitra</th>
                        <th class="py-3.5 px-4">Fermentasi</th>
                        <th class="py-3.5 px-4">Uji Mutu Lab</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($batches as $batch)
                        <tr class="hover:bg-stone-50/70 transition-colors">
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="font-mono font-bold text-sm text-stone-900">{{ $batch->batch_code }}</div>
                                <div class="text-[10px] text-stone-400">Panen: {{ $batch->harvest_date ? $batch->harvest_date->format('d M Y') : '-' }}</div>
                            </td>
                            <td class="py-4 px-4 font-bold text-stone-800">
                                {{ $batch->product_name }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="font-medium text-stone-900">{{ $batch->farmer_name }}</div>
                                <div class="text-[11px] text-stone-500">{{ $batch->farm_origin }} ({{ $batch->elevation }})</div>
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="font-semibold text-stone-800">{{ $batch->fermentation_duration_days }} Hari</div>
                                <div class="text-[10px] text-stone-400">{{ $batch->fermentation_start_date ? $batch->fermentation_start_date->format('d/m/y') : '' }} - {{ $batch->fermentation_end_date ? $batch->fermentation_end_date->format('d/m/y') : '' }}</div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-lg inline-block border border-emerald-200">
                                    {{ $batch->quality_test_status }}
                                </div>
                                <div class="text-[10px] text-stone-500 mt-1 font-mono">{{ $batch->sac_polyphenol_level }}</div>
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                @if($batch->status === 'Verified')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Terverifikasi
                                    </span>
                                @elseif($batch->status === 'In Testing')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                        Proses Uji
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-stone-100 text-stone-600">
                                        Diarsipkan
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.traceability.edit', $batch) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-800 bg-amber-50 hover:bg-amber-100 px-3 py-1.5 rounded-xl transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('admin.traceability.destroy', $batch) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus batch ketertelusuran ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-xl transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-stone-400 text-xs">
                                Belum ada data batch traceability yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($batches->hasPages())
            <div class="p-4 border-t border-stone-100">
                {{ $batches->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
