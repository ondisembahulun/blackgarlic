@extends('layouts.app')

@section('title', __('Hubungi Kami') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Layanan Pelanggan & Kemitraan') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Hubungi Kami') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Punya pertanyaan seputar produk, peluang kerja sama penelitian, kemitraan kelompok tani, atau pemesanan grosir? Kami siap membantu Anda.') }}
            </p>
        </div>
    </section>

    <!-- CONTACT FORM & INFO SECTION -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Info Kontak -->
                <div class="lg:col-span-5 space-y-8">
                    <div>
                        <h2 class="text-2xl font-extrabold text-stone-900 tracking-tight">
                            {{ __('Saluran Komunikasi Resmi') }}
                        </h2>
                        <p class="text-stone-600 text-sm mt-2 leading-relaxed">
                            {{ __('Silakan hubungi kami melalui saluran komunikasi resmi di bawah ini atau kunjungi sentra produksi kami di Sembalun.') }}
                        </p>
                    </div>

                    <div class="space-y-6">
                        
                        <!-- WhatsApp Card -->
                        <a href="https://wa.me/6285337369110?text=Halo%20Admin%20Bawang%20Hitam%20Sembalun,%20saya%20ingin%20bertanya" target="_blank" class="p-5 rounded-2xl bg-emerald-50/70 border border-emerald-200 hover:border-emerald-400 hover:shadow-md transition-all flex items-start gap-4 group">
                            <div class="w-12 h-12 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-sm group-hover:scale-105 transition-transform">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.668-.699c.983.537 1.954.819 3.014.819l.002.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.768-5.766zm9.969 5.766c0 5.514-4.486 10-10 10-1.688 0-3.275-.424-4.664-1.168l-5.336 1.396 1.424-5.207c-.838-1.442-1.324-3.12-1.324-4.908 0-5.514 4.486-10 10-10 5.514 0 10 4.486 10 10z"/></svg>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800">{{ __('Layanan Chat Cepat') }}</span>
                                <div class="font-bold text-stone-900 group-hover:text-emerald-700 transition-colors">+62 853-3736-9110</div>
                                <p class="text-xs text-stone-500">{{ __('Respon cepat Senin - Sabtu (08.00 - 20.00 WITA)') }}</p>
                            </div>
                        </a>

                        <!-- Email Card -->
                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-stone-500">{{ __('Surel Resmi') }}</span>
                                <div class="font-bold text-stone-900">info@bawanghitamsembalun.id</div>
                                <p class="text-xs text-stone-500">{{ __('Untuk korespondensi kemitraan & riset ilmiah') }}</p>
                            </div>
                        </div>

                        <!-- Alamat Card -->
                        <div class="p-5 rounded-2xl bg-stone-50 border border-stone-200 flex items-start gap-4">
                            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-700 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-stone-500">{{ __('Sentra Produksi & Kemitraan') }}</span>
                                <div class="font-bold text-stone-900">{{ __('Desa Sembalun Bumbung (Mitra Malsye)') }}</div>
                                <p class="text-xs text-stone-500 leading-relaxed">
                                    {{ __('Kecamatan Sembalun, Kabupaten Lombok Timur, Nusa Tenggara Barat (83656) • Sentra Kemitraan Malsye Lereng Timur Rinjani') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right: Formulir Kirim Pesan -->
                <div class="lg:col-span-7">
                    <div class="bg-stone-50 rounded-3xl p-8 sm:p-10 border border-stone-200 shadow-md">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-stone-900">{{ __('Kirimkan Pesan Anda') }}</h3>
                            <p class="text-xs text-stone-500 mt-1">{{ __('Formulir ini tersimpan langsung di database kami.') }}</p>
                        </div>

                        <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
                            @csrf
                            
                            <!-- Nama -->
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                    {{ __('Nama Lengkap') }} <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                                       placeholder="{{ __('Nama Anda') }}"
                                       class="w-full bg-white border border-stone-300 rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('name') border-rose-500 @enderror">
                                @error('name')
                                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Alamat Email') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                                           placeholder="nama@email.com"
                                           class="w-full bg-white border border-stone-300 rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('email') border-rose-500 @enderror">
                                    @error('email')
                                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- WhatsApp / Phone -->
                                <div>
                                    <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                        {{ __('Nomor WhatsApp / HP') }}
                                    </label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                                           placeholder="085337369110"
                                           class="w-full bg-white border border-stone-300 rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                                </div>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                    {{ __('Subjek Pesan') }}
                                </label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                                       placeholder="{{ __('Pemesanan Produk / Tanya Khasiat / Kemitraan') }}"
                                       class="w-full bg-white border border-stone-300 rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-1.5">
                                    {{ __('Pesan atau Pertanyaan') }} <span class="text-rose-500">*</span>
                                </label>
                                <textarea name="message" id="message" rows="4" required 
                                          placeholder="{{ __('Tuliskan pesan, rincian pesanan, atau pertanyaan Anda di sini...') }}"
                                          class="w-full bg-white border border-stone-300 rounded-2xl p-4 text-sm text-stone-900 focus:outline-hidden focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 @error('message') border-rose-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full py-4 px-6 rounded-2xl text-xs font-bold uppercase tracking-wider text-white bg-stone-900 hover:bg-stone-800 shadow-lg shadow-stone-900/10 transition-all flex items-center justify-center gap-2 group">
                                <span>{{ __('Kirim Pesan') }}</span>
                                <svg class="w-4 h-4 text-amber-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
