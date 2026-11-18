<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTransactionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_can_add_product_to_cart(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $response = $this->post('/keranjang/tambah', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        $response->assertSessionHas('cart');
        $cart = session('cart');
        $this->assertArrayHasKey($product->id, $cart);
        $this->assertEquals(2, $cart[$product->id]['quantity']);
    }

    public function test_can_update_cart_quantity(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $this->post('/keranjang/tambah', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->post('/keranjang/update', [
            'product_id' => $product->id,
            'quantity' => 5,
        ]);

        $response->assertRedirect('/keranjang');
        $this->assertEquals(5, session('cart')[$product->id]['quantity']);
    }

    public function test_can_remove_product_from_cart(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $this->post('/keranjang/tambah', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->post('/keranjang/hapus', [
            'product_id' => $product->id,
        ]);

        $response->assertRedirect('/keranjang');
        $this->assertArrayNotHasKey($product->id, session('cart', []));
    }

    public function test_checkout_page_redirects_if_cart_is_empty(): void
    {
        $response = $this->get('/checkout');

        $response->assertRedirect('/produk');
        $response->assertSessionHas('error');
    }

    public function test_checkout_page_renders_with_cart_items(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $this->post('/keranjang/tambah', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this->get('/checkout');

        $response->assertStatus(200);
        $response->assertSee('Informasi Penerima Pesanan');
        $response->assertSee($product->name);
    }

    public function test_can_complete_order_transaction_in_app(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        // 1. Add item to cart
        $this->post('/keranjang/tambah', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        // 2. Submit checkout transaction directly
        $checkoutData = [
            'customer_name' => 'Lalu Muhammad',
            'customer_phone' => '081234567890',
            'customer_email' => 'lalu@example.com',
            'shipping_address' => 'Jl. Pariwisata Sembalun No. 45',
            'shipping_city' => 'Lombok Timur',
            'courier' => 'J&T Express',
            'payment_method' => 'Transfer Bank BCA',
            'notes' => 'Tolong kirim dengan bubble wrap.',
        ];

        $response = $this->post('/checkout', $checkoutData);

        // 3. Verify order created in database
        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Lalu Muhammad',
            'customer_email' => 'lalu@example.com',
            'shipping_city' => 'Lombok Timur',
            'payment_method' => 'Transfer Bank BCA',
        ]);

        $order = Order::where('customer_email', 'lalu@example.com')->first();
        $this->assertNotNull($order);
        $this->assertCount(1, $order->items);
        $this->assertEquals(2, $order->items->first()->quantity);

        // 4. Verify redirected to order success / invoice page
        $response->assertRedirect('/pesanan/'.$order->order_number);

        // 5. Verify cart is cleared after order
        $this->assertEmpty(session('cart', []));
    }

    public function test_order_invoice_page_is_accessible(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $order = Order::create([
            'order_number' => 'BHS-20261117-TEST1',
            'customer_name' => 'Siti Nurhaliza',
            'customer_phone' => '081987654321',
            'customer_email' => 'siti@example.com',
            'shipping_address' => 'Dusun Bumbung',
            'shipping_city' => 'Sembalun',
            'courier' => 'J&T Express',
            'shipping_cost' => 15000,
            'subtotal' => 95000,
            'total_amount' => 110000,
            'payment_method' => 'Transfer Bank BCA',
            'payment_status' => 'pending',
            'order_status' => 'processing',
        ]);

        $order->items()->create([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'subtotal' => $product->price,
        ]);

        $response = $this->get('/pesanan/'.$order->order_number);

        $response->assertStatus(200);
        $response->assertSee('BHS-20261117-TEST1');
        $response->assertSee('Siti Nurhaliza');
        $response->assertSee('Transfer Bank BCA');
    }

    public function test_can_track_order_by_order_number(): void
    {
        $order = Order::create([
            'order_number' => 'BHS-20261117-TRACK',
            'customer_name' => 'Dewi Lestari',
            'customer_phone' => '087765432100',
            'customer_email' => 'dewi@example.com',
            'shipping_address' => 'Jl. Sembalun Bumbung',
            'shipping_city' => 'Lombok Timur',
            'courier' => 'SiCepat REG',
            'shipping_cost' => 16000,
            'subtotal' => 120000,
            'total_amount' => 136000,
            'payment_method' => 'QRIS Dinamis',
            'payment_status' => 'pending',
            'order_status' => 'processing',
        ]);

        $response = $this->get('/lacak-pesanan?q='.$order->order_number);

        $response->assertStatus(200);
        $response->assertSee('BHS-20261117-TRACK');
        $response->assertSee('Dewi Lestari');
    }
}
