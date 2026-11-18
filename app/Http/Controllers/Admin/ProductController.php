<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request): View
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:Utuh,Serbuk,Turunan'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'net_weight' => ['required', 'string', 'max:50'],
            'stock_status' => ['required', 'string', 'in:Tersedia,Stok Terbatas,Habis'],
            'description' => ['required', 'string'],
            'ingredients' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'usage_instructions' => ['nullable', 'string'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'is_featured' => ['boolean'],
        ]);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }
        $validated['slug'] = $slug;

        // Process benefits text to array
        if (! empty($validated['benefits'])) {
            $validated['benefits'] = array_values(array_filter(
                array_map('trim', explode("\n", str_replace("\r", '', $validated['benefits'])))
            ));
        } else {
            $validated['benefits'] = [];
        }

        // Handle Image Upload if provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $validated['image_url'] = '/images/products/'.$filename;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk "'.$validated['name'].'" berhasil ditambahkan ke katalog!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:Utuh,Serbuk,Turunan'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'net_weight' => ['required', 'string', 'max:50'],
            'stock_status' => ['required', 'string', 'in:Tersedia,Stok Terbatas,Habis'],
            'description' => ['required', 'string'],
            'ingredients' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'usage_instructions' => ['nullable', 'string'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'is_featured' => ['boolean'],
        ]);

        if ($product->name !== $validated['name']) {
            $slug = Str::slug($validated['name']);
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
            $validated['slug'] = $slug;
        }

        // Process benefits text to array
        if (! empty($validated['benefits'])) {
            $validated['benefits'] = array_values(array_filter(
                array_map('trim', explode("\n", str_replace("\r", '', $validated['benefits'])))
            ));
        } else {
            $validated['benefits'] = [];
        }

        // Handle Image Upload if provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/products'), $filename);
            $validated['image_url'] = '/images/products/'.$filename;
        }

        unset($validated['image_file']);
        $validated['is_featured'] = $request->boolean('is_featured');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk "'.$product->name.'" berhasil diperbarui!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $name = $product->name;
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk "'.$name.'" berhasil dihapus.');
    }
}
