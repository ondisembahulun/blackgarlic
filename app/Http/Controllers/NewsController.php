<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = $request->query('kategori', 'Semua');

        $query = Article::where('is_published', true);

        if ($selectedCategory !== 'Semua') {
            $query->where('category', $selectedCategory);
        }

        $articles = $query->latest('published_at')->get();
        $categories = ['Semua', 'Kegiatan', 'Penelitian', 'Pengembangan Produk', 'Edukasi'];

        return view('pages.news.index', compact('articles', 'categories', 'selectedCategory'));
    }

    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedArticles->isEmpty()) {
            $relatedArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get();
        }

        return view('pages.news.show', compact('article', 'relatedArticles'));
    }
}
