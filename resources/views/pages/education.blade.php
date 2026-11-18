@extends('layouts.app')

@section('title', __('Pusat Edukasi & Khasiat') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Literasi Gizi & Kesehatan') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Pusat Edukasi Bawang Hitam') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Pahami sains di balik fermentasi alami, profil senyawa bioaktif, khasiat klinis, hingga tips konsumsi harian terbaik.') }}
            </p>
        </div>
    </section>

    <!-- 3 MAIN PILLARS -->
    <section class="py-16 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- 1. Apa Itu Black Garlic? -->
                <div class="p-8 rounded-3xl bg-stone-50 border border-stone-200 flex flex-col justify-between space-y-6 hover:shadow-lg transition-shadow">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-600 text-white flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v13"/></svg>
                        </div>
                        <h2 class="text-xl font-extrabold text-stone-900">{{ __('Apa Itu Black Garlic?') }}</h2>
                        <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                            {{ __('Bawang hitam adalah bawang putih tunggal segar yang telah mengalami proses penuaan termal (reaksi Maillard) secara alami pada suhu 60-70°C selama 30-40 hari. Warna hitam pekat bukan karena pembakaran, melainkan karamelisasi alami asam amino dan gula.') }}
                        </p>
                    </div>
                    <ul class="text-xs text-stone-700 space-y-2 border-t border-stone-200 pt-4">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span> {{ __('100% alami tanpa ragi sintetis') }}</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span> {{ __('Rasa manis gurih tanpa rasa pedas') }}</li>
                    </ul>
                </div>

                <!-- 2. Manfaat Black Garlic -->
                <div class="p-8 rounded-3xl bg-stone-50 border border-stone-200 flex flex-col justify-between space-y-6 hover:shadow-lg transition-shadow">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <h2 class="text-xl font-extrabold text-stone-900">{{ __('Manfaat Utama Tubuh') }}</h2>
                        <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                            {{ __('Senyawa S-allyl cysteine (SAC) dan polifenol bekerja sebagai pembersih radikal bebas kuat. Berkhasiat membantu menjaga elastisitas pembuluh darah, mengontrol LDL, dan memelihara stamina tubuh.') }}
                        </p>
                    </div>
                    <ul class="text-xs text-stone-700 space-y-2 border-t border-stone-200 pt-4">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> {{ __('Antioksidan 6-10x dibanding bawang putih mentah') }}</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> {{ __('Menjaga kesehatan kardiovaskular') }}</li>
                    </ul>
                </div>

                <!-- 3. Cara Konsumsi -->
                <div class="p-8 rounded-3xl bg-stone-50 border border-stone-200 flex flex-col justify-between space-y-6 hover:shadow-lg transition-shadow">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-stone-900 text-amber-400 flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h2 class="text-xl font-extrabold text-stone-900">{{ __('Panduan Konsumsi') }}</h2>
                        <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                            {{ __('Bawang hitam aman dimakan langsung seperti permen atau buah kering. Konsumsi rutin 1-2 siung di pagi hari sebelum makan besar, atau seduh bentuk serbuk mikroenkapsulasi bersama air hangat dan madu hutan.') }}
                        </p>
                    </div>
                    <ul class="text-xs text-stone-700 space-y-2 border-t border-stone-200 pt-4">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-stone-900"></span> {{ __('Sangat nyaman untuk penderita maag') }}</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-stone-900"></span> {{ __('Bebas bau mulut setelah konsumsi') }}</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- ARTIKEL EDUKASI -->
    <section class="py-16 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-100/60 px-3 py-1 rounded-full">
                    {{ __('Artikel Edukatif') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                    {{ __('Koleksi Artikel Pangan Sehat & Riset') }}
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($articles as $art)
                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-stone-200 shadow-xs flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-xs text-stone-400">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase bg-amber-50 text-amber-800">
                                    {{ __($art->category) }}
                                </span>
                                <span>{{ __($art->reading_time) }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-stone-900 leading-snug">
                                {{ __($art->title) }}
                            </h3>
                            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                                {{ __($art->summary) }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                            <span class="text-xs text-stone-500 font-medium">{{ __($art->author) }}</span>
                            <a href="{{ route('berita.show', $art->slug) }}" class="text-xs font-bold text-amber-700 hover:underline">
                                {{ __('Baca Artikel') }} &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ SECTION (Accordion) -->
    <section class="py-16 bg-white border-t border-stone-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="text-center">
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                    {{ __('Pertanyaan Populer') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                    {{ __('Tanya Jawab Seputar Bawang Hitam (FAQ)') }}
                </h2>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $faq)
                    <details class="group bg-stone-50 border border-stone-200 rounded-2xl p-5 [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center justify-between cursor-pointer font-bold text-stone-900 text-sm">
                            <span>{{ $faq['q'] }}</span>
                            <span class="transition duration-300 group-open:-rotate-180 text-amber-600 ml-4 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </span>
                        </summary>
                        <p class="mt-3 text-xs sm:text-sm text-stone-600 leading-relaxed pt-3 border-t border-stone-200/60">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
@endsection
