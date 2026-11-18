@extends('layouts.app')

@section('title', __('Tentang Kami') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION (Wireframe 2: Tentang Kami) -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Profil & Dedikasi') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Tentang Kami (About)') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Membangun hilirisasi komoditas bawang putih lereng Rinjani melalui riset fermentasi terstandar dan pemberdayaan petani Sembalun.') }}
            </p>
        </div>
    </section>

    <!-- CONTENT SECTIONS -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- 1. Profil Merek & Cerita -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-5">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                        {{ __('Profil Merek') }}
                    </span>
                    <h2 class="text-3xl font-extrabold text-stone-900 tracking-tight">
                        {{ __('Dedikasi Menghadirkan Superfood Asli Nusantara') }}
                    </h2>
                    <p class="text-stone-600 text-sm leading-relaxed">
                        <strong>{{ __('Bawang Hitam Sembalun') }}</strong> {{ __('lahir dari gagasan untuk meningkatkan nilai tambah komoditas bawang putih lokal di kawasan Sembalun, Lombok Timur. Bawang putih tunggal (solo garlic) yang selama ini diperdagangkan dalam bentuk mentah rentan terhadap anjloknya harga pasar pascapanen.') }}
                    </p>
                    <p class="text-stone-600 text-sm leading-relaxed">
                        {{ __('Melalui inovasi teknologi fermentasi termal presisi, kami mengubah bawang putih tunggal menjadi Black Garlic bermutu farmasi dan gastronomi tinggi: tekstur lembut legit seperti kurma, rasa manis tanpa aroma pedas menyengat, serta memiliki kapasitas antioksidan berkali-kali lipat lebih kuat.') }}
                    </p>
                </div>

                <div class="lg:col-span-6 bg-stone-100 rounded-3xl p-8 border border-stone-200 shadow-inner">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-500 text-stone-950 flex items-center justify-center font-bold">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-stone-900">{{ __('Identitas Produk') }}</h3>
                                <p class="text-xs text-stone-500">{{ __('Bawang Putih Tunggal Fermentasi Alami') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-stone-200">
                            <div>
                                <div class="text-xs text-stone-500 uppercase font-bold">{{ __('Varietas') }}</div>
                                <div class="text-sm font-semibold text-stone-900 mt-0.5">Allium sativum L. (Solo Garlic)</div>
                            </div>
                            <div>
                                <div class="text-xs text-stone-500 uppercase font-bold">{{ __('Lokasi Kebun') }}</div>
                                <div class="text-sm font-semibold text-stone-900 mt-0.5">{{ __('Sembalun, Lombok Timur') }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-stone-500 uppercase font-bold">{{ __('Metode Fermentasi') }}</div>
                                <div class="text-sm font-semibold text-stone-900 mt-0.5">{{ __('Reaksi Maillard (35 Hari)') }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-stone-500 uppercase font-bold">{{ __('Komitmen Kualitas') }}</div>
                                <div class="text-sm font-semibold text-stone-900 mt-0.5">{{ __('Traceable & Bebas Bahan Kimia') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Asal Bahan Baku (Sembalun) -->
            <div class="bg-gradient-to-br from-stone-900 via-stone-850 to-stone-900 rounded-3xl p-8 sm:p-12 text-white border border-stone-800 shadow-xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="w-full max-w-sm rounded-2xl bg-stone-800/80 p-6 border border-stone-700 space-y-4 text-center">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-amber-500/20 text-amber-400 flex items-center justify-center">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 20l9-16 9 16H3zM9 14l3-5 3 5H9z"/></svg>
                            </div>
                            <div>
                                <div class="text-2xl font-black text-white">{{ __('Lembah Sembalun') }}</div>
                                <div class="text-xs text-amber-400 font-semibold tracking-wider uppercase mt-1">{{ __('Lereng Gunung Rinjani • 1.100 - 1.250 mdpl') }}</div>
                            </div>
                            <p class="text-xs text-stone-400 leading-relaxed">
                                {{ __('Kelembaban udara pegunungan dan paparan sinar matahari sejuk khas dataran tinggi menjadikan bawang Sembalun memiliki kandungan sulfur organik dan nutrisi padat alami.') }}
                            </p>
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-4">
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/60 border border-emerald-800 px-3 py-1 rounded-full">
                            {{ __('Asal Bahan Baku') }}
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                            {{ __('Berkah Tanah Vulkanik Pegunungan Sembalun') }}
                        </h2>
                        <p class="text-stone-300 text-sm leading-relaxed">
                            {{ __('Lembah Sembalun di Pulau Lombok sejak lama dikenal sebagai sentra bawang putih legendaris nusantara. Terletak persis di kaldera kaki Gunung Rinjani, tanahnya kaya akan mineral vulkanik alami yang tidak ditemukan di daerah dataran rendah.') }}
                        </p>
                        <p class="text-stone-300 text-sm leading-relaxed">
                            {{ __('Bawang putih tunggal yang dipanen dari daerah ini memiliki aroma dasar lebih kuat dan kadar senyawa allicin awal yang tinggi. Ketika melalui siklus fermentasi terkontrol, allicin tersebut terkonversi secara optimal menjadi S-allyl-cysteine (SAC) dengan konsentrasi luar biasa.') }}
                        </p>
                    </div>

                </div>
            </div>

            <!-- 3. Visi & Misi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Visi -->
                <div class="p-8 rounded-3xl bg-amber-50/60 border border-amber-200/80 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-600 text-white flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900">{{ __('Visi Kami') }}</h3>
                    <p class="text-stone-700 text-sm leading-relaxed">
                        {{ __('Menjadi pionir hilirisasi pangan fungsional berbasis bawang putih nusantara yang berdaya saing global, berkelanjutan, dan menjadi simbol kebanggaan ketahanan pangan berbasis kearifan lokal lereng Rinjani.') }}
                    </p>
                </div>

                <!-- Misi -->
                <div class="p-8 rounded-3xl bg-emerald-50/60 border border-emerald-200/80 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-stone-900">{{ __('Misi Kami') }}</h3>
                    <ul class="space-y-2 text-stone-700 text-sm leading-relaxed">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-600 font-bold">•</span>
                            <span>{{ __('Menerapkan standar riset biokimia dan teknologi fermentasi presisi pada pengolahan bawang putih tunggal.') }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-600 font-bold">•</span>
                            <span>{{ __('Membangun ekosistem kemitraan berkeadilan yang menyejahterakan mitra kami Malsye dan kelompok tani di Lembah Sembalun Bumbung.') }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-600 font-bold">•</span>
                            <span>{{ __('Menjamin transparansi mutu produk melalui integrasi sistem ketertelusuran (Traceability) digital.') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 4. Cerita Kami (Kolaborasi Riset) -->
            <div class="p-8 sm:p-12 rounded-3xl bg-stone-50 border border-stone-200 space-y-6">
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-100/60 px-3 py-1 rounded-full">
                    {{ __('Cerita Kami') }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-stone-900">
                    {{ __('Sinergi Petani Lokal, Inovasi Akademik & Teknologi Modern') }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                    <div class="bg-white p-5 rounded-2xl border border-stone-200 space-y-2">
                        <div class="text-amber-600 font-black text-xl">{{ __('01. Dari Ladang') }}</div>
                        <h4 class="font-bold text-sm text-stone-900">{{ __('Pemberdayaan Petani') }}</h4>
                        <p class="text-xs text-stone-600 leading-relaxed">
                            {{ __('Bermitra erat bersama Malsye di Sembalun Bumbung untuk pemilahan varietas bawang tunggal terbaik dan jaminan harga pascapanen yang stabil.') }}
                        </p>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-stone-200 space-y-2">
                        <div class="text-amber-600 font-black text-xl">{{ __('02. Di Laboratorium') }}</div>
                        <h4 class="font-bold text-sm text-stone-900">{{ __('Riset & Validasi') }}</h4>
                        <p class="text-xs text-stone-600 leading-relaxed">
                            {{ __('Pengembangan protokol fermentasi optimal dan pengujian profil antioksidan (SAC, polifenol, flavonoid) terakreditasi.') }}
                        </p>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-stone-200 space-y-2">
                        <div class="text-amber-600 font-black text-xl">{{ __('03. Ke Konsumen') }}</div>
                        <h4 class="font-bold text-sm text-stone-900">{{ __('Kualitas Tepercaya') }}</h4>
                        <p class="text-xs text-stone-600 leading-relaxed">
                            {{ __('Menghadirkan produk berkualitas tinggi yang terlacak asal-usulnya dan berkhasiat nyata bagi kesehatan masyarakat.') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
