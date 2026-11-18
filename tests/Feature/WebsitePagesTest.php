<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Product;
use App\Models\TraceabilityBatch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebsitePagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_home_page_is_accessible_and_renders_correctly(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Bawang Hitam Sembalun');
        $response->assertSee('Asal Sembalun');
        $response->assertSee('Proses Terstandar');
    }

    public function test_about_page_is_accessible(): void
    {
        $response = $this->get('/tentang-kami');

        $response->assertStatus(200);
        $response->assertSee('Tentang Kami');
        $response->assertSee('Profil Merek');
        $response->assertSee('Visi Kami');
    }

    public function test_products_catalog_is_accessible_and_can_filter_category(): void
    {
        $response = $this->get('/produk');

        $response->assertStatus(200);
        $response->assertSee('Katalog Produk Kami');

        $responseFiltered = $this->get('/produk?kategori=Utuh');
        $responseFiltered->assertStatus(200);
        $responseFiltered->assertSee('Black Garlic Utuh');
    }

    public function test_product_detail_page_is_accessible(): void
    {
        $product = Product::first();
        $this->assertNotNull($product);

        $response = $this->get('/produk/'.$product->slug);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->formatted_price);
    }

    public function test_process_and_innovation_page_is_accessible(): void
    {
        $response = $this->get('/proses-inovasi');

        $response->assertStatus(200);
        $response->assertSee('Proses Produksi');
        $response->assertSee('Mikroenkapsulasi (Serbuk)');
    }

    public function test_traceability_page_can_search_valid_batch(): void
    {
        $batch = TraceabilityBatch::first();
        $this->assertNotNull($batch);

        $response = $this->get('/traceability?kode='.$batch->batch_code);

        $response->assertStatus(200);
        $response->assertSee($batch->batch_code);
        $response->assertSee($batch->product_name);
        $response->assertSee($batch->farm_origin);
        $response->assertSee($batch->quality_test_status);
    }

    public function test_traceability_page_handles_invalid_batch(): void
    {
        $response = $this->get('/traceability?kode=INVALID-CODE-999');

        $response->assertStatus(200);
        $response->assertSee('Tidak Ditemukan');
    }

    public function test_education_page_is_accessible(): void
    {
        $response = $this->get('/edukasi');

        $response->assertStatus(200);
        $response->assertSee('Pusat Edukasi Bawang Hitam');
        $response->assertSee('Apa Itu Black Garlic?');
    }

    public function test_news_index_and_detail_pages_are_accessible(): void
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
        $response->assertSee('Berita / Artikel Riset');

        $article = Article::first();
        $this->assertNotNull($article);

        $detailResponse = $this->get('/berita/'.$article->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($article->title);
    }

    public function test_contact_form_stores_message_successfully(): void
    {
        $payload = [
            'name' => 'Ahmad Rinjani',
            'email' => 'ahmad@example.com',
            'phone' => '081298765432',
            'subject' => 'Pemesanan Serbuk Black Garlic',
            'message' => 'Halo, saya ingin memesan 5 pouch serbuk black garlic.',
        ];

        $response = $this->post('/kontak', $payload);

        $response->assertRedirect('/kontak');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'ahmad@example.com',
            'name' => 'Ahmad Rinjani',
        ]);
    }
}
