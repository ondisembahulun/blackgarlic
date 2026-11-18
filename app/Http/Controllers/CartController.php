<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return view('pages.cart', compact('cart', 'subtotal'));
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'direct_buy' => 'nullable|boolean',
        ]);

        $productId = (int) $request->input('product_id');
        $quantity = max(1, (int) $request->input('quantity', 1));
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'category' => $product->category,
                'net_weight' => $product->net_weight,
                'price' => (float) $product->price,
                'image_url' => $product->image_url,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        if ($request->boolean('direct_buy')) {
            return redirect()->route('checkout.index');
        }

        return redirect()->back()->with('success', __(':product berhasil ditambahkan ke keranjang belanja!', ['product' => __($product->name)]));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0',
        ]);

        $productId = (int) $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', __('Keranjang belanja berhasil diperbarui.'));
    }

    public function remove(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        $productId = (int) $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $name = $cart[$productId]['name'];
            unset($cart[$productId]);
            session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('success', __(':product telah dihapus dari keranjang.', ['product' => __($name)]));
        }

        return redirect()->route('cart.index');
    }

    public function clear(): RedirectResponse
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', __('Keranjang belanja telah dikosongkan.'));
    }
}
