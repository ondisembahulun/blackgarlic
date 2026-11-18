<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\TraceabilityBatch;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::where('is_featured', true)->get();
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::take(2)->get();
        }

        $allProducts = Product::take(4)->get();
        $educationArticles = Article::where('category', 'Edukasi')->latest()->take(2)->get();
        $recentNews = Article::latest()->take(3)->get();
        $sampleBatch = TraceabilityBatch::first();

        return view('pages.home', compact(
            'featuredProducts',
            'allProducts',
            'educationArticles',
            'recentNews',
            'sampleBatch'
        ));
    }
}
