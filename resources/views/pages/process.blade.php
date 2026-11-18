@extends('layouts.app')

@section('title', __('Proses & Inovasi') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Teknologi Pengolahan Pangan') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Proses Produksi & Inovasi') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Transformasi ilmiah dari bawang putih tunggal pegunungan Sembalun melalui fermentasi Maillard presisi hingga mikroenkapsulasi senyawa bioaktif.') }}
            </p>
        </div>
    </section>

    <!-- 4 TAHAPAN DIAGRAM PROSES -->
    <section class="py-16 bg-white border-b border-stone-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                    {{ __('Diagram Alur Tahapan') }}
                </span>
                <h2 class="text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                    {{ __('4 Tahap Menuju Superfood Bermutu Tinggi') }}
                </h2>
                <p class="text-stone-500 text-sm mt-1">
                    {{ __('Setiap tahapan dikendalikan menggunakan sensor presisi dan standar higienitas ketat.') }}
                </p>
            </div>

            <!-- Flow Timeline Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
                @foreach($steps as $index => $step)
                    <div class="bg-stone-50 rounded-3xl p-6 border border-stone-200 relative flex flex-col justify-between hover:border-amber-500/50 hover:shadow-xl transition-all duration-300 group">
                        
                        <!-- Step Badge -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="w-10 h-10 rounded-2xl bg-stone-900 text-amber-400 font-black text-sm flex items-center justify-center shadow-md">
                                    0{{ $step['step'] }}
                                </span>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800">
                                    {{ $step['badge'] }}
                                </span>
                            </div>

                            <!-- Icon Visual -->
                            <div class="w-14 h-14 rounded-2xl bg-white border border-stone-200 flex items-center justify-center text-amber-600 mb-4 group-hover:scale-110 transition-transform">
                                @if($step['icon'] === 'garlic')
                                    <svg class="w-8 h-8 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 2C8.5 6 4 10 4 15a8 8 0 0016 0c0-5-4.5-9-8-13z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v13"/></svg>
                                @elseif($step['icon'] === 'chamber')
                                    <svg class="w-8 h-8 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @elseif($step['icon'] === 'lab')
                                    <svg class="w-8 h-8 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                                @else
                                    <svg class="w-8 h-8 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16c0 3.314 3.582 6 8 6s8-2.686 8-6H4z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7l-2 5h4l-2-5z"/></svg>
                                @endif
                            </div>

                            <h3 class="font-bold text-base text-stone-900 leading-snug mb-2">
                                {{ $step['title'] }}
                            </h3>
                            <p class="text-xs text-stone-600 leading-relaxed mb-4">
                                {{ $step['description'] }}
                            </p>
                        </div>

                        <!-- Checkpoints -->
                        <div class="pt-3 border-t border-stone-200/80 space-y-1.5">
                            @foreach($step['details'] as $detail)
                                <div class="flex items-center gap-2 text-[11px] text-stone-700">
                                    <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $detail }}</span>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- VIDEO SHOWCASE & INOVASI PENGEMBANGAN -->
    <section class="py-20 bg-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Video Section (Player Mockup) -->
                <div class="lg:col-span-7">
                    <div class="rounded-3xl bg-stone-950 p-4 border border-stone-800 shadow-2xl relative overflow-hidden group">
                        
                        <!-- Video Frame Preview -->
                        <div class="relative aspect-video rounded-2xl bg-gradient-to-br from-stone-900 to-stone-800 flex flex-col items-center justify-center p-8 text-center text-white border border-stone-800">
                            <div class="absolute inset-0 garlic-pattern opacity-40"></div>
                            
                            <!-- Play Button -->
                            <div class="relative w-20 h-20 rounded-full bg-amber-500 text-stone-950 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform cursor-pointer">
                                <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>

                            <div class="relative mt-6 space-y-1">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-stone-800 text-amber-400 border border-stone-700">
                                    {{ __('Video Dokumenter Riset') }}
                                </span>
                                <h3 class="text-base sm:text-lg font-bold text-white">
                                    {{ __('Proses Fermentasi & Riset Mikroenkapsulasi Bawang Hitam') }}
                                </h3>
                                <p class="text-xs text-stone-400">
                                    {{ __('Durasi 03:45 menit • Laboratorium & Sentra Produksi Sembalun') }}
                                </p>
                            </div>

                            <!-- Video Controller Bar Mockup -->
                            <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between text-xs text-stone-400 bg-stone-950/80 px-3 py-1.5 rounded-xl border border-stone-800">
                                <div class="flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <span class="text-[10px] font-mono">01:14 / 03:45</span>
                                </div>
                                <div class="w-1/2 h-1 bg-stone-700 rounded-full overflow-hidden">
                                    <div class="w-1/3 h-full bg-amber-500"></div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] uppercase font-bold text-stone-400">HD 1080p</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Inovasi Pengembangan Checklist -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-amber-600 bg-amber-50 px-3 py-1 rounded-full">
                            {{ __('R&D Roadmap') }}
                        </span>
                        <h2 class="text-3xl font-extrabold text-stone-900 tracking-tight mt-2">
                            {{ __('Inovasi Pengembangan Produk') }}
                        </h2>
                        <p class="text-stone-600 text-sm mt-1">
                            {{ __('Fokus riset hilirisasi lanjutan untuk memperluas diversifikasi produk turunan bernilai ekonomi tinggi.') }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        
                        <!-- Check 1 -->
                        <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-xs flex items-start gap-4">
                            <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-sm text-stone-900">{{ __('Ekstraksi Senyawa Bioaktif Terstandar') }}</h4>
                                <p class="text-xs text-stone-600 leading-relaxed">
                                    {{ __('Pengembangan protokol green extraction untuk memaksimalkan retensi S-allyl-cysteine (SAC) dan polifenol bebas toksin pelarut kimia.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Check 2 -->
                        <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-xs flex items-start gap-4">
                            <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-sm text-stone-900">{{ __('Mikroenkapsulasi Berbasis Pangan Alami') }}</h4>
                                <p class="text-xs text-stone-600 leading-relaxed">
                                    {{ __('Teknologi penyalutan mikro untuk menjaga stabilitas zat aktif terhadap suhu dan oksigen, mempermudah formulasi minuman fungsional.') }}
                                </p>
                            </div>
                        </div>

                        <!-- Check 3 -->
                        <div class="p-5 rounded-2xl bg-white border border-stone-200 shadow-xs flex items-start gap-4">
                            <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div class="space-y-1">
                                <h4 class="font-bold text-sm text-stone-900">{{ __('Diversifikasi Produk Turunan Komprehensif') }}</h4>
                                <p class="text-xs text-stone-600 leading-relaxed">
                                    {{ __('Formulasi turunan mulai dari kapsul suplemen herbal konsentrat, sinergi madu fermentasi, hingga teh herbal infusi ramah lambung.') }}
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="pt-2">
                        <a href="{{ route('traceability') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-amber-700 hover:text-amber-800">
                            <span>{{ __('Pelajari Sistem Ketertelusuran Produksi') }} &rarr;</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
