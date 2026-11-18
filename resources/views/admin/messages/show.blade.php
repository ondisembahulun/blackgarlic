@extends('layouts.admin')

@section('title', 'Pesan dari: ' . $message->name)
@section('header_title', 'Baca Pesan Pengunjung')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-stone-900">Pesan Pengunjung Website</h2>
            <p class="text-xs text-stone-500 mt-0.5">Diterima pada {{ $message->created_at->format('d F Y, H:i') }} WIB</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-stone-600 hover:text-stone-900 bg-white px-3.5 py-2 rounded-xl border border-stone-200 transition-colors">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-stone-200 shadow-xs p-6 sm:p-8 space-y-6">
        
        <!-- Header Info -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-6 border-b border-stone-100">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-base">
                    {{ substr($message->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="font-bold text-base text-stone-900">{{ $message->name }}</h3>
                    <div class="text-xs text-stone-500 font-mono flex items-center gap-2 mt-0.5">
                        <a href="mailto:{{ $message->email }}" class="text-amber-600 hover:underline">{{ $message->email }}</a>
                        @if($message->phone)
                            <span>•</span>
                            <span>{{ $message->phone }}</span>
                        @endif
                    </div>
                </div>
            </div>

            @if($message->phone)
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $message->phone)) }}?text=Halo%20{{ urlencode($message->name) }},%20kami%20dari%20Bawang%20Hitam%20Sembalun%20membalas%20pesan%20Anda" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition-colors shadow-xs">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                    <span>Balas via WhatsApp</span>
                </a>
            @endif
        </div>

        <!-- Subject -->
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-stone-400 block mb-1">Subjek / Topik</span>
            <div class="font-bold text-sm text-stone-900 bg-stone-50 px-4 py-2.5 rounded-xl border border-stone-100">
                {{ $message->subject ?? 'Pesan Umum' }}
            </div>
        </div>

        <!-- Message Body -->
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-stone-400 block mb-1">Isi Pesan</span>
            <div class="text-sm text-stone-800 leading-relaxed bg-stone-50 p-5 rounded-2xl border border-stone-100 whitespace-pre-line">
                {{ $message->message }}
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="pt-6 border-t border-stone-100 flex items-center justify-between">
            <a href="mailto:{{ $message->email }}?subject=Re:%20{{ urlencode($message->subject ?? 'Pesan Bawang Hitam Sembalun') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-bold text-stone-700 bg-stone-100 hover:bg-stone-200 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Balas via Email</span>
            </a>

            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2.5 rounded-xl text-xs font-bold text-rose-600 hover:text-rose-700 hover:bg-rose-50 transition-colors">
                    Hapus Pesan
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
