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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // 'Utuh', 'Serbuk', 'Turunan'
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('net_weight')->default('200 gr');
            $table->text('ingredients')->nullable();
            $table->json('benefits')->nullable();
            $table->text('usage_instructions')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('stock_status')->default('Tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
