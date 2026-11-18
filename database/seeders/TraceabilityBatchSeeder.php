<?php

namespace Database\Seeders;

use App\Models\TraceabilityBatch;
use Illuminate\Database\Seeder;

class TraceabilityBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = [
            [
                'batch_code' => 'BHS-2026-A01',
                'product_name' => 'Black Garlic Utuh Premium (250 gr)',
                'farm_origin' => 'Sentra Mitra Malsye, Dusun Lembah Hijau, Sembalun Bumbung',
                'elevation' => '1.185 mdpl (Lereng Timur Gunung Rinjani)',
                'farmer_name' => 'Mitra Malsye (Bpk. Amaq Sahrul & Tim Kelompok Tani)',
                'harvest_date' => '2026-08-14',
                'raw_material_grade' => 'Grade A+ (Bawang Putih Tunggal Super, Diameter 3.5 - 4.2 cm)',
                'fermentation_start_date' => '2026-08-22',
                'fermentation_end_date' => '2026-09-26',
                'fermentation_duration_days' => 35,
                'fermentation_chamber' => 'Chamber C-01 (Kontrol Otomatis Suhu 68°C, RH 82%)',
                'extraction_method' => 'Pengeringan Lambat Pasca Fermentasi (Slow Curing Room 7 Hari)',
                'packaging_date' => '2026-10-05',
                'expiry_date' => '2027-10-05',
                'moisture_content' => '12.8% (Standar SNI < 14.0%)',
                'sac_polyphenol_level' => 'SAC: 1.92 mg/g | Total Polifenol: 44.8 mg GAE/g',
                'quality_test_status' => 'Lolos Uji Mutu Laboratorium (Grade A+)',
                'lab_test_cert_number' => 'LAB-PANG-UNRAM/X/2026-0412',
                'status' => 'Verified',
                'notes' => 'Batch unggulan hasil panen musim kemarau dengan kadar allicin awal sangat pekat, menghasilkan aroma karamel manis legit alami dan tekstur kenyal sempurna.',
            ],
            [
                'batch_code' => 'BHS-2026-S02',
                'product_name' => 'Serbuk Black Garlic Mikroenkapsulasi (100 gr)',
                'farm_origin' => 'Kemitraan Mitra Malsye, Lembah Sembalun Bumbung',
                'elevation' => '1.220 mdpl (Dataran Tinggi Sembalun)',
                'farmer_name' => 'Mitra Malsye (Bpk. Lalu Ridwan & Ibu Baiq Rohana)',
                'harvest_date' => '2026-08-20',
                'raw_material_grade' => 'Grade A (Bawang Putih Tunggal Pilihan)',
                'fermentation_start_date' => '2026-08-28',
                'fermentation_end_date' => '2026-10-02',
                'fermentation_duration_days' => 35,
                'fermentation_chamber' => 'Chamber C-03 (Suhu 65°C - 70°C Presisi)',
                'extraction_method' => 'Ekstraksi Ultrasonik Ramah Lingkungan & Mikroenkapsulasi Spray Dryer',
                'packaging_date' => '2026-10-18',
                'expiry_date' => '2027-10-18',
                'moisture_content' => '3.8% (Standar Mutu Serbuk Kering < 5.0%)',
                'sac_polyphenol_level' => 'SAC: 2.15 mg/g | Bioavailabilitas Larut Air 98.4%',
                'quality_test_status' => 'Lolos Uji Mikrobiologi & Senyawa Bioaktif (SNI Standard)',
                'lab_test_cert_number' => 'LAB-BIO-LIPI/X/2026-0791',
                'status' => 'Verified',
                'notes' => 'Inovasi serbuk fungsional larut air cepat, tingkat retensi senyawa antioksidan mencapai 92.6% pasca proses enkapsulasi.',
            ],
            [
                'batch_code' => 'BHS-2026-T03',
                'product_name' => 'Kapsul Ekstrak Bioaktif Black Garlic (60 Kapsul)',
                'farm_origin' => 'Sentra Budidaya Mitra Malsye, Sembalun Bumbung',
                'elevation' => '1.150 mdpl',
                'farmer_name' => 'Mitra Malsye (Bpk. H. Mahmud)',
                'harvest_date' => '2026-09-02',
                'raw_material_grade' => 'Grade A Standar Riset Herbal',
                'fermentation_start_date' => '2026-09-10',
                'fermentation_end_date' => '2026-10-15',
                'fermentation_duration_days' => 35,
                'fermentation_chamber' => 'Chamber C-02 (Dual Sensor Sensor PID)',
                'extraction_method' => 'Spray Dry Encapsulation dengan Cangkang Nabati Halal',
                'packaging_date' => '2026-10-25',
                'expiry_date' => '2027-10-25',
                'moisture_content' => '4.1% (Kering Terstandar Farmasi)',
                'sac_polyphenol_level' => 'SAC: 2.30 mg/g | Polifenol: 46.2 mg GAE/g',
                'quality_test_status' => 'Lolos Uji Logam Berat, Cemaran Mikroba & Uji Disintegrasi Kapsul',
                'lab_test_cert_number' => 'LAB-FARM-X/2026-1033',
                'status' => 'Verified',
                'notes' => 'Tiap kapsul terisi konsentrat ekstrak 500mg, higroskopisitas terlindung botol segel tamper-evident.',
            ],
        ];

        foreach ($batches as $batch) {
            TraceabilityBatch::updateOrCreate(['batch_code' => $batch['batch_code']], $batch);
        }
    }
}
