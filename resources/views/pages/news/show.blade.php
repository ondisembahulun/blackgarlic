@extends('layouts.app')

@section('title', __($article->title) . ' - ' . __('Berita & Artikel'))

@section('content')
    <!-- BREADCRUMB -->
    <div class="bg-stone-100 border-b border-stone-200 py-4">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-stone-500">
                <a href="{{ route('home') }}" class="hover:text-amber-600">{{ __('Beranda') }}</a>
                <span>/</span>
                <a href="{{ route('berita.index') }}" class="hover:text-amber-600">{{ __('Berita & Riset') }}</a>
                <span>/</span>
                <span class="text-stone-900 font-semibold truncate">{{ Str::limit(__($article->title), 40) }}</span>
            </div>
        </div>
    </div>

    <!-- ARTICLE CONTENT -->
    <article class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Article Header -->
            <div class="space-y-4">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-amber-100 text-amber-800">
                        {{ __($article->category) }}
                    </span>
                    <span class="text-xs text-stone-400">
                        {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : __('Terbaru') }}
                    </span>
                    <span class="text-stone-300">•</span>
                    <span class="text-xs text-stone-400 font-mono">
                        {{ __($article->reading_time) }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-stone-900 tracking-tight leading-tight">
                    {{ __($article->title) }}
                </h1>

                <div class="flex items-center gap-3 pt-2 text-xs text-stone-600">
                    <div class="w-8 h-8 rounded-full bg-stone-900 text-amber-400 flex items-center justify-center font-bold text-xs">
                        BHS
                    </div>
                    <div>
                        <span class="font-bold text-stone-900 block">{{ __($article->author) }}</span>
                        <span class="text-[11px] text-stone-400">{{ __('Pusat Riset Bawang Hitam Sembalun') }}</span>
                    </div>
                </div>
            </div>

            <!-- Summary Lead -->
            <div class="p-6 rounded-2xl bg-amber-50/70 border-l-4 border-amber-600 text-stone-800 text-sm sm:text-base leading-relaxed font-medium">
                {{ __($article->summary) }}
            </div>

            <!-- Body Text -->
            <div class="text-stone-700 text-base leading-relaxed space-y-6 pt-4 border-t border-stone-200">
                {!! nl2br(e(\App\Support\ContentTranslator::text($article->content))) !!}
            </div>

            <!-- Back CTA -->
            <div class="pt-8 border-t border-stone-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-700 hover:text-stone-900">
                    &larr; {{ __('Kembali ke Indeks Berita') }}
                </a>
                <a href="https://wa.me/6285337369110?text={{ urlencode('Halo Admin Bawang Hitam Sembalun, saya membaca artikel ' . $article->title . ' dan ingin berdiskusi.') }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-700 hover:text-emerald-800">
                    {{ __('Diskusi Riset via WhatsApp') }} &rarr;
                </a>
            </div>

        </div>
    </article>

    <!-- RELATED ARTICLES -->
    @if($relatedArticles->isNotEmpty())
        <section class="py-16 bg-stone-50 border-t border-stone-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-lg font-bold text-stone-900 mb-6">{{ __('Artikel Terkait Lainnya') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($relatedArticles as $rel)
                        <div class="bg-white p-5 rounded-2xl border border-stone-200 space-y-2">
                            <span class="text-[10px] font-bold uppercase px-2.5 py-0.5 rounded-full bg-stone-100 text-stone-700">
                                {{ __($rel->category) }}
                            </span>
                            <h4 class="font-bold text-sm text-stone-900 hover:text-amber-600">
                                <a href="{{ route('berita.show', $rel->slug) }}">{{ __($rel->title) }}</a>
                            </h4>
                            <p class="text-xs text-stone-500 line-clamp-2">{{ __($rel->summary) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
