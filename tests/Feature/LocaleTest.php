<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_default_locale_is_indonesian_with_top_bar_info(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Sembalun Bumbung, Lombok Timur, NTB');
        $response->assertSee('+62 853-3736-9110');
        $response->assertSee('Beranda');
        $response->assertSee('Produk Kami');
        $response->assertSee('Tentang Kami');
    }

    public function test_can_switch_locale_to_english_and_translates_all_pages(): void
    {
        $response = $this->get('/lang/en');

        $response->assertRedirect('/');
        $response->assertSessionHas('locale', 'en');
        $response->assertCookie('app_locale', 'en');

        // Home page (static + dynamic products & articles + top bar)
        $home = $this->withSession(['locale' => 'en'])->get('/');
        $home->assertStatus(200);
        $home->assertSee('Sembalun Bumbung, East Lombok, West Nusa Tenggara');
        $home->assertSee('+62 853-3736-9110');
        $home->assertSee('Home');
        $home->assertSee('Our Products');
        $home->assertSee('About Us');
        $home->assertSee('Premium Whole Black Garlic');
        $home->assertSee('35 Days');

        // About page
        $about = $this->withSession(['locale' => 'en'])->get('/tentang-kami');
        $about->assertStatus(200);
        $about->assertSee('Brand Profile');
        $about->assertSee('Our Vision');
        $about->assertSee('Our Mission');
        $about->assertSee('Sembalun Valley');

        // Products catalog & detail
        $products = $this->withSession(['locale' => 'en'])->get('/produk');
        $products->assertStatus(200);
        $products->assertSee('Our Product Catalog');
        $products->assertSee('Premium Whole Black Garlic');
        $products->assertSee('Microencapsulated Black Garlic Powder');

        $productDetail = $this->withSession(['locale' => 'en'])->get('/produk/black-garlic-utuh-premium');
        $productDetail->assertStatus(200);
        $productDetail->assertSee('Product Description');
        $productDetail->assertSee('Health Benefits:');
        $productDetail->assertSee('Buy Now');

        // Process page
        $process = $this->withSession(['locale' => 'en'])->get('/proses-inovasi');
        $process->assertStatus(200);
        $process->assertSee('Production Process & Innovation');
        $process->assertSee('Microencapsulation (Powder)');

        // Traceability page
        $trace = $this->withSession(['locale' => 'en'])->get('/traceability?kode=BHS-2026-A01');
        $trace->assertStatus(200);
        $trace->assertSee('Traceability (Product Traceability)');
        $trace->assertSee('Passed Laboratory Quality Test (Grade A+)');
        $trace->assertSee('Malsye Partner Center');

        // Education page
        $education = $this->withSession(['locale' => 'en'])->get('/edukasi');
        $education->assertStatus(200);
        $education->assertSee('Black Garlic Education Center');
        $education->assertSee('What is Black Garlic?');
        $education->assertSee('Does Black Garlic still taste spicy');

        // News index & detail (including multi-paragraph translated body)
        $news = $this->withSession(['locale' => 'en'])->get('/berita');
        $news->assertStatus(200);
        $news->assertSee('News / Research Articles');
        $news->assertSee('Discovering Sembalun Black Garlic');

        $newsDetail = $this->withSession(['locale' => 'en'])->get('/berita/mengenal-black-garlic-sembalun');
        $newsDetail->assertStatus(200);
        $newsDetail->assertSee('Back to News Index');
        $newsDetail->assertSee('Single-clove garlic (solo garlic) from Sembalun');

        // Contact page
        $contact = $this->withSession(['locale' => 'en'])->get('/kontak');
        $contact->assertStatus(200);
        $contact->assertSee('Contact Us');
        $contact->assertSee('Official Communication Channels');
        $contact->assertSee('Send Us a Message');

        // Cart & Track Order
        $cart = $this->withSession(['locale' => 'en'])->get('/keranjang');
        $cart->assertStatus(200);
        $cart->assertSee('Your Shopping Cart is Empty');

        $track = $this->withSession(['locale' => 'en'])->get('/lacak-pesanan');
        $track->assertStatus(200);
        $track->assertSee('Track Your Order Status');
    }

    public function test_can_switch_locale_back_to_indonesian(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/lang/id');

        $response->assertRedirect('/');
        $response->assertSessionHas('locale', 'id');

        $responseId = $this->withSession(['locale' => 'id'])->get('/');

        $responseId->assertStatus(200);
        $responseId->assertSee('Beranda');
        $responseId->assertSee('Produk Kami');
        $responseId->assertSee('Sembalun Bumbung, Lombok Timur, NTB');
    }

    public function test_invalid_locale_is_ignored(): void
    {
        $response = $this->get('/lang/es');

        $response->assertRedirect('/');
        $this->assertNotEquals('es', session('locale'));
    }

    public function test_all_translation_keys_exist_in_english_json(): void
    {
        $enTranslations = json_decode(file_get_contents(lang_path('en.json')), true, 512, JSON_THROW_ON_ERROR);
        $idTranslations = json_decode(file_get_contents(lang_path('id.json')), true, 512, JSON_THROW_ON_ERROR);

        $this->assertIsArray($enTranslations);
        $this->assertIsArray($idTranslations);

        $scanPaths = [
            resource_path('views/layouts/app.blade.php'),
            resource_path('views/pages'),
            app_path('Http/Controllers'),
            app_path('Models/Order.php'),
        ];

        $missingKeys = [];

        foreach ($scanPaths as $path) {
            $files = is_file($path)
                ? [$path]
                : iterator_to_array(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)));

            foreach ($files as $file) {
                $filePath = is_string($file) ? $file : $file->getPathname();
                if (! is_file($filePath) || ! str_ends_with($filePath, '.php')) {
                    continue;
                }

                $content = file_get_contents($filePath);
                preg_match_all("/__\('((?:[^'\\\\]|\\\\.)*)'/", $content, $matches);

                foreach ($matches[1] as $rawKey) {
                    $key = str_replace("\\'", "'", $rawKey);
                    if (! array_key_exists($key, $enTranslations)) {
                        $missingKeys[$key] = $filePath;
                    }
                }
            }
        }

        $this->assertEmpty(
            $missingKeys,
            'Missing English translations for keys: '.json_encode($missingKeys, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }
}
