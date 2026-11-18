<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Order;
use App\Models\Product;
use App\Models\TraceabilityBatch;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminContentManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);

        $this->adminUser = User::where('email', 'admin@blackgarlicsembalun.com')->firstOrFail();
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Portal Manajemen Admin');
        $response->assertSee('Masuk ke Admin Panel');
        $response->assertDontSee('Kredensial Default Admin');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@blackgarlicsembalun.com',
            'password' => 'SangatRahasia2026!',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->adminUser);
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@blackgarlicsembalun.com',
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_admin_can_access_dashboard(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Dashboard Ringkasan');
        $response->assertSee('Total Produk');
    }

    public function test_admin_can_create_update_and_delete_product(): void
    {
        // 1. Create Product
        $createResponse = $this->actingAs($this->adminUser)->post('/admin/products', [
            'name' => 'Bawang Hitam Madu Hutan Sembalun',
            'category' => 'Turunan',
            'subtitle' => 'Perpaduan Madu Asli & Bawang Hitam',
            'price' => 95000,
            'net_weight' => '350 gr',
            'stock_status' => 'Tersedia',
            'description' => 'Madu murni dipadukan dengan ekstrak bawang hitam fermentasi lereng Rinjani.',
            'benefits' => "Meningkatkan daya tahan tubuh\nMenjaga kesehatan lambung",
            'ingredients' => 'Madu Hutan Asli, Ekstrak Bawang Hitam Sembalun',
            'usage_instructions' => 'Diminum 1 sendok makan setiap pagi.',
            'image_url' => '/images/products/img_bawang_hitam_utuh.png',
            'is_featured' => 1,
        ]);

        $createResponse->assertRedirect(route('admin.products.index'));

        $product = Product::where('name', 'Bawang Hitam Madu Hutan Sembalun')->first();
        $this->assertNotNull($product);
        $this->assertEquals('Turunan', $product->category);
        $this->assertCount(2, $product->benefits);

        // 2. Update Product
        $updateResponse = $this->actingAs($this->adminUser)->put("/admin/products/{$product->id}", [
            'name' => 'Bawang Hitam Madu Hutan Sembalun Super',
            'category' => 'Turunan',
            'subtitle' => 'Edisi Terbatas',
            'price' => 110000,
            'net_weight' => '350 gr',
            'stock_status' => 'Stok Terbatas',
            'description' => 'Deskripsi diperbarui.',
            'benefits' => 'Khasiat tunggal',
            'ingredients' => 'Komposisi baru',
            'usage_instructions' => 'Petunjuk baru',
            'image_url' => '/images/products/img_bawang_hitam_utuh.png',
            'is_featured' => 0,
        ]);

        $updateResponse->assertRedirect(route('admin.products.index'));
        $product->refresh();
        $this->assertEquals('Bawang Hitam Madu Hutan Sembalun Super', $product->name);
        $this->assertEquals(110000, (int) $product->price);

        // 3. Delete Product
        $deleteResponse = $this->actingAs($this->adminUser)->delete("/admin/products/{$product->id}");
        $deleteResponse->assertRedirect(route('admin.products.index'));
        $this->assertNull(Product::find($product->id));
    }

    public function test_admin_can_create_update_and_delete_article(): void
    {
        // 1. Create Article
        $createResponse = $this->actingAs($this->adminUser)->post('/admin/articles', [
            'title' => 'Panduan Konsumsi Bawang Hitam untuk Lansia',
            'category' => 'Edukasi',
            'summary' => 'Ringkasan panduan konsumsi aman untuk usia lanjut.',
            'content' => 'Konten lengkap panduan konsumsi harian...',
            'author' => 'Dr. Farmasi Herbal',
            'reading_time' => '4 menit baca',
            'published_at' => '2026-11-17',
            'is_published' => 1,
        ]);

        $createResponse->assertRedirect(route('admin.articles.index'));
        $article = Article::where('title', 'Panduan Konsumsi Bawang Hitam untuk Lansia')->first();
        $this->assertNotNull($article);

        // 2. Update Article
        $updateResponse = $this->actingAs($this->adminUser)->put("/admin/articles/{$article->id}", [
            'title' => 'Panduan Konsumsi Bawang Hitam untuk Lansia (Revisi)',
            'category' => 'Edukasi',
            'summary' => 'Ringkasan revisi.',
            'content' => 'Konten revisi...',
            'author' => 'Dr. Farmasi Herbal',
            'reading_time' => '5 menit baca',
            'published_at' => '2026-11-17',
            'is_published' => 1,
        ]);

        $updateResponse->assertRedirect(route('admin.articles.index'));
        $article->refresh();
        $this->assertEquals('Panduan Konsumsi Bawang Hitam untuk Lansia (Revisi)', $article->title);

        // 3. Delete Article
        $deleteResponse = $this->actingAs($this->adminUser)->delete("/admin/articles/{$article->id}");
        $deleteResponse->assertRedirect(route('admin.articles.index'));
        $this->assertNull(Article::find($article->id));
    }

    public function test_admin_can_create_update_and_delete_traceability_batch(): void
    {
        // 1. Create Batch
        $createResponse = $this->actingAs($this->adminUser)->post('/admin/traceability', [
            'batch_code' => 'BHS-2026-TEST99',
            'product_name' => 'Bawang Hitam Tunggal',
            'farm_origin' => 'Sembalun Bumbung (Mitra Malsye)',
            'elevation' => '1.200 mdpl',
            'farmer_name' => 'Pak Rusdi',
            'harvest_date' => '2026-10-01',
            'raw_material_grade' => 'Grade A',
            'fermentation_start_date' => '2026-10-05',
            'fermentation_end_date' => '2026-11-09',
            'fermentation_duration_days' => 35,
            'fermentation_chamber' => 'Chamber C-01',
            'packaging_date' => '2026-11-10',
            'expiry_date' => '2028-05-10',
            'moisture_content' => '12.0%',
            'sac_polyphenol_level' => 'SAC: 1.88 mg/g',
            'quality_test_status' => 'Lolos Uji Mutu Lab',
            'lab_test_cert_number' => 'LAB-TEST-99',
            'status' => 'Verified',
        ]);

        $createResponse->assertRedirect(route('admin.traceability.index'));
        $batch = TraceabilityBatch::where('batch_code', 'BHS-2026-TEST99')->first();
        $this->assertNotNull($batch);

        // 2. Update Batch
        $updateResponse = $this->actingAs($this->adminUser)->put("/admin/traceability/{$batch->id}", [
            'batch_code' => 'BHS-2026-TEST99',
            'product_name' => 'Bawang Hitam Tunggal Super',
            'farm_origin' => 'Sembalun Bumbung (Mitra Malsye)',
            'elevation' => '1.250 mdpl',
            'farmer_name' => 'Pak Rusdi',
            'harvest_date' => '2026-10-01',
            'raw_material_grade' => 'Grade A+',
            'fermentation_start_date' => '2026-10-05',
            'fermentation_end_date' => '2026-11-09',
            'fermentation_duration_days' => 35,
            'fermentation_chamber' => 'Chamber C-01',
            'packaging_date' => '2026-11-10',
            'expiry_date' => '2028-05-10',
            'moisture_content' => '11.5%',
            'sac_polyphenol_level' => 'SAC: 1.95 mg/g',
            'quality_test_status' => 'Lolos Uji Mutu Lab',
            'lab_test_cert_number' => 'LAB-TEST-99',
            'status' => 'Verified',
        ]);

        $updateResponse->assertRedirect(route('admin.traceability.index'));
        $batch->refresh();
        $this->assertEquals('Bawang Hitam Tunggal Super', $batch->product_name);

        // 3. Delete Batch
        $deleteResponse = $this->actingAs($this->adminUser)->delete("/admin/traceability/{$batch->id}");
        $deleteResponse->assertRedirect(route('admin.traceability.index'));
        $this->assertNull(TraceabilityBatch::find($batch->id));
    }

    public function test_admin_can_update_order_status(): void
    {
        $order = Order::create([
            'order_number' => 'BHS-20261117-9999',
            'customer_name' => 'Budi Santoso',
            'customer_phone' => '081234567890',
            'customer_email' => 'budi@example.com',
            'shipping_address' => 'Jl. Merdeka No. 10',
            'shipping_city' => 'Mataram',
            'courier' => 'J&T Express',
            'shipping_cost' => 15000,
            'subtotal' => 65000,
            'total_amount' => 80000,
            'payment_method' => 'Transfer Bank BCA',
            'payment_status' => 'pending',
            'order_status' => 'processing',
        ]);

        $response = $this->actingAs($this->adminUser)->put("/admin/orders/{$order->id}", [
            'order_status' => 'shipped',
            'payment_status' => 'paid',
            'payment_reference' => 'JT9988776655',
            'notes' => 'Paket sudah diserahkan ke kurir J&T Sembalun',
        ]);

        $response->assertRedirect(route('admin.orders.show', $order));
        $order->refresh();
        $this->assertEquals('shipped', $order->order_status);
        $this->assertEquals('paid', $order->payment_status);
        $this->assertEquals('JT9988776655', $order->payment_reference);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->adminUser)->post('/admin/logout');

        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
