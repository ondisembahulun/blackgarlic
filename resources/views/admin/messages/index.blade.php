@extends('layouts.admin')

@section('title', 'Pesan Masuk Pengunjung')
@section('header_title', 'Pesan Kontak Pengunjung')

@section('content')
<div class="space-y-6">

    <!-- Header Actions & Search -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-5 rounded-3xl border border-stone-200 shadow-xs">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Pesan & Pertanyaan Pengunjung Website</h2>
            <p class="text-xs text-stone-500 mt-0.5">Pertanyaan konsultasi, kerjasama kemitraan, dan pesan dari halaman Kontak.</p>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-3xl border border-stone-200 shadow-xs flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="{{ route('admin.messages.index') }}" method="GET" class="w-full flex flex-col sm:flex-row gap-3 items-center">
            <div class="relative w-full sm:w-80">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau isi pesan..." class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500">
                <svg class="w-4 h-4 text-stone-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="status" onchange="this.form.submit()" class="w-full sm:w-44 py-2 px-3 text-xs rounded-xl border border-stone-200 focus:outline-hidden focus:border-amber-500 text-stone-700">
                <option value="">Semua Status</option>
                <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
            </select>

            <button type="submit" class="w-full sm:w-auto px-4 py-2 text-xs font-semibold text-stone-700 bg-stone-100 hover:bg-stone-200 rounded-xl transition-colors">
                Cari
            </button>

            @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.messages.index') }}" class="text-xs text-stone-500 hover:text-rose-600 underline">
                    Reset Filter
                </a>
            @endif
        </form>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-100 text-stone-500 font-bold uppercase tracking-wider">
                        <th class="py-3.5 px-6">Pengirim</th>
                        <th class="py-3.5 px-4">Subjek / Topik</th>
                        <th class="py-3.5 px-4">Ringkasan Pesan</th>
                        <th class="py-3.5 px-4">Waktu Masuk</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-stone-50/70 transition-colors {{ !$msg->is_read ? 'bg-amber-50/40 font-semibold' : '' }}">
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="font-bold text-stone-900">{{ $msg->name }}</div>
                                <div class="text-[11px] text-stone-500 font-mono">{{ $msg->email }}</div>
                                @if($msg->phone)
                                    <div class="text-[10px] text-stone-400">{{ $msg->phone }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-stone-800">
                                {{ $msg->subject ?? 'Pesan Umum' }}
                            </td>
                            <td class="py-4 px-4">
                                <p class="text-stone-600 line-clamp-1 max-w-xs">{{ $msg->message }}</p>
                            </td>
                            <td class="py-4 px-4 text-stone-500 whitespace-nowrap">
                                {{ $msg->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap">
                                @if(!$msg->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800">
                                        Baru
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-stone-100 text-stone-600">
                                        Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.messages.show', $msg) }}" class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 hover:text-amber-800 bg-amber-50 hover:bg-amber-100 px-3 py-1.5 rounded-xl transition-colors">
                                    <span>Buka Pesan &rarr;</span>
                                </a>

                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-xs font-bold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-2.5 py-1.5 rounded-xl transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-stone-400 text-xs">
                                Tidak ada pesan masuk yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="p-4 border-t border-stone-100">
                {{ $messages->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
