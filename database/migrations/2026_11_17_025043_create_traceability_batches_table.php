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
        Schema::create('traceability_batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_code')->unique(); // e.g. BHS-2026-A01
            $table->string('product_name');
            $table->string('farm_origin'); // e.g. Desa Sembalun Bumbung (Mitra Malsye), Lombok Timur
            $table->string('elevation')->default('1.180 mdpl');
            $table->string('farmer_name');
            $table->date('harvest_date');
            $table->string('raw_material_grade')->default('Grade A - Bawang Putih Tunggal');
            $table->date('fermentation_start_date');
            $table->date('fermentation_end_date');
            $table->integer('fermentation_duration_days')->default(35);
            $table->string('fermentation_chamber')->default('Chamber C-01 (Suhu 65°C - 70°C, RH 80%)');
            $table->string('extraction_method')->nullable();
            $table->date('packaging_date');
            $table->date('expiry_date');
            $table->string('moisture_content')->default('12.4%');
            $table->string('sac_polyphenol_level')->default('SAC: 1.84 mg/g, Total Polifenol: 42.5 mg GAE/g');
            $table->string('quality_test_status')->default('Lolos Uji Mutu Laboratorium (Grade A+)');
            $table->string('lab_test_cert_number')->default('LAB-BHS/XI/2026-088');
            $table->string('status')->default('Verified');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traceability_batches');
    }
};
