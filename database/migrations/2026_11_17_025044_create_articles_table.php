<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // 'Edukasi', 'Kegiatan', 'Penelitian', 'Pengembangan Produk'
            $table->text('summary');
            $table->longText('content');
            $table->string('author')->default('Tim Riset Bawang Hitam Sembalun');
            $table->string('reading_time')->default('3 menit baca');
            $table->string('image_url')->nullable();
            $table->boolean('is_published')->default(true);
            $table->date('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
