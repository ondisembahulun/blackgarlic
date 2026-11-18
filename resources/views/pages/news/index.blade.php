@extends('layouts.app')

@section('title', __('Berita & Artikel Riset') . ' - ' . __('Bawang Hitam Sembalun'))

@section('content')
    <!-- HEADER SECTION -->
    <section class="bg-gradient-to-b from-stone-950 via-stone-900 to-stone-900 text-white py-16 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 garlic-pattern opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                {{ __('Warta & Publikasi Ilmiah') }}
            </span>
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight">
                {{ __('Berita / Artikel Riset') }}
            </h1>
            <p class="text-stone-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                {{ __('Dokumentasi kegiatan kelompok tani Sembalun, publikasi penelitian biokimia, serta update inovasi pengembangan pangan.') }}
            </p>
        </div>
    </section>

    <!-- NEWS FEED & CATEGORY TABS -->
    <section class="py-16 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2">
                @foreach($categories as $category)
                    <a href="{{ route('berita.index', ['kategori' => $category]) }}" 
                       class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all {{ $selectedCategory === $category ? 'bg-stone-900 text-white shadow-md' : 'bg-white text-stone-700 hover:bg-stone-200 border border-stone-200' }}">
                        {{ $category === 'Semua' ? __('Semua Kategori') : __($category) }}
                    </a>
                @endforeach
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <article class="bg-white rounded-3xl border border-stone-200 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        
                        <!-- Top Visual Area -->
                        <div class="bg-gradient-to-br from-stone-900 to-stone-850 p-6 text-white min-h-[160px] flex flex-col justify-between relative overflow-hidden">
                            <div class="flex items-center justify-between">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500 text-stone-950">
                                    {{ __($article->category) }}
                                </span>
                                <span class="text-xs text-stone-400 font-mono">
                                    {{ __($article->reading_time) }}
                                </span>
                            </div>

                            <div class="mt-4">
                                <span class="text-xs text-amber-400 font-medium">
                                    {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : __('Terbaru') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Area -->
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between space-y-5">
                            <div class="space-y-3">
                                <h2 class="text-lg font-bold text-stone-900 group-hover:text-amber-600 transition-colors leading-snug">
                                    <a href="{{ route('berita.show', $article->slug) }}">
                                        {{ __($article->title) }}
                                    </a>
                                </h2>
                                <p class="text-xs sm:text-sm text-stone-600 leading-relaxed line-clamp-3">
                                    {{ __($article->summary) }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-stone-100 flex items-center justify-between">
                                <span class="text-[11px] text-stone-500 font-medium truncate max-w-[150px]">
                                    {{ __($article->author) }}
                                </span>
                                <a href="{{ route('berita.show', $article->slug) }}" class="text-xs font-bold text-amber-700 hover:text-amber-800 flex items-center gap-1">
                                    <span>{{ __('Baca') }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>

                    </article>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-stone-200">
                        <p class="text-stone-500">{{ __('Belum ada artikel dalam kategori ini.') }}</p>
                        <a href="{{ route('berita.index') }}" class="inline-block mt-3 text-xs font-bold text-amber-600">{{ __('Tampilkan Semua Artikel') }}</a>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
