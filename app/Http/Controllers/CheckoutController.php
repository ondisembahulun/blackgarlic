<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('produk.index')
                ->with('error', __('Keranjang belanja Anda masih kosong. Silakan pilih produk terlebih dahulu.'));
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $couriers = [
            'J&T Express' => 15000,
            'JNE Regular' => 18000,
            'SiCepat REG' => 16000,
            'Pos Indonesia' => 14000,
        ];

        $paymentMethods = [
            'Transfer Bank BCA' => [
                'bank' => 'BCA',
                'account_number' => '8210-9988-77',
                'account_name' => 'Bawang Hitam Sembalun Official',
                'description' => __('Transfer manual atau m-Banking BCA dengan konfirmasi otomatis.'),
            ],
            'Transfer Bank Mandiri' => [
                'bank' => 'Mandiri',
                'account_number' => '161-00-1122334-5',
                'account_name' => 'Bawang Hitam Sembalun Official',
                'description' => __('Transfer via Livin by Mandiri atau ATM.'),
            ],
            'QRIS Dinamis' => [
                'bank' => 'QRIS (Gopay / OVO / Dana / ShopeePay / BCA)',
                'account_number' => 'NMID: ID1020261117001',
                'account_name' => 'QRIS Bawang Hitam Sembalun',
                'description' => __('Scan langsung menggunakan aplikasi e-wallet atau mobile banking apa saja.'),
            ],
            'COD (Bayar di Tempat)' => [
                'bank' => 'COD',
                'account_number' => '-',
                'account_name' => __('Bayar saat kurir mengantar'),
                'description' => __('Bayar tunai kepada kurir saat paket tiba di alamat Anda.'),
            ],
        ];

        return view('pages.checkout', compact('cart', 'subtotal', 'couriers', 'paymentMethods'));
    }

    public function store(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('produk.index')
                ->with('error', __('Keranjang belanja Anda kosong.'));
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string|max:25',
            'customer_email' => 'required|email|max:100',
            'shipping_address' => 'required|string|max:500',
            'shipping_city' => 'required|string|max:100',
            'courier' => 'required|string',
            'payment_method' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ], [
            'customer_name.required' => __('Nama lengkap penerima wajib diisi.'),
            'customer_phone.required' => __('Nomor WhatsApp / telepon aktif wajib diisi.'),
            'customer_email.required' => __('Alamat email wajib diisi untuk bukti pesanan.'),
            'shipping_address.required' => __('Alamat pengiriman lengkap wajib diisi.'),
            'shipping_city.required' => __('Kota atau kabupaten tujuan pengiriman wajib diisi.'),
        ]);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shippingRates = [
            'J&T Express' => 15000,
            'JNE Regular' => 18000,
            'SiCepat REG' => 16000,
            'Pos Indonesia' => 14000,
        ];

        $shippingCost = $shippingRates[$validated['courier']] ?? 15000;
        $totalAmount = $subtotal + $shippingCost;

        $orderNumber = 'BHS-'.date('Ymd').'-'.strtoupper(Str::random(5));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'],
            'shipping_address' => $validated['shipping_address'],
            'shipping_city' => $validated['shipping_city'],
            'courier' => $validated['courier'],
            'shipping_cost' => $shippingCost,
            'subtotal' => $subtotal,
            'total_amount' => $totalAmount,
            'payment_method' => $validated['payment_method'],
            'payment_status' => 'pending',
            'order_status' => 'processing',
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'] ?? null,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('order.success', $order->order_number)
            ->with('success', __('Transaksi berhasil dibuat! Silakan selesaikan pembayaran.'));
    }

    public function success(string $orderNumber): View
    {
        $order = Order::with('items')->where('order_number', $orderNumber)->firstOrFail();

        return view('pages.order-success', compact('order'));
    }

    public function track(Request $request): View
    {
        $query = trim((string) $request->query('q', ''));
        $order = null;
        $searched = false;

        if ($query !== '') {
            $searched = true;
            $order = Order::with('items')
                ->where('order_number', $query)
                ->orWhere('customer_phone', $query)
                ->latest()
                ->first();
        }

        return view('pages.track-order', compact('order', 'query', 'searched'));
    }
}
