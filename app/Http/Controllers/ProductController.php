<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = $request->query('kategori', 'Semua');

        $query = Product::query();

        if ($selectedCategory !== 'Semua') {
            $query->where('category', $selectedCategory);
        }

        $products = $query->get();
        $categories = ['Semua', 'Utuh', 'Serbuk', 'Turunan'];

        return view('pages.products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where('category', $product->category)
            ->take(3)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::where('id', '!=', $product->id)->take(3)->get();
        }

        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
