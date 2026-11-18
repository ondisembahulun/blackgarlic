<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProcessController extends Controller
{
    public function index(): View
    {
        $steps = [
            [
                'step' => 1,
                'title' => __('Bawang Putih Tunggal Sembalun'),
                'badge' => __('Bahan Baku Unggulan'),
                'description' => __('Sortasi ketat bawang putih tunggal hasil panen mitra Malsye di Sembalun Bumbung pada elevasi 1.100+ mdpl dengan kadar allicin alami tertinggi.'),
                'icon' => 'garlic',
                'details' => [
                    __('Diameter minimal 3.2 cm'),
                    __('Bebas pestisida sintetis berbahaya'),
                    __('Kadar air pascapanen terstandarisasi'),
                ],
            ],
            [
                'step' => 2,
                'title' => __('Fermentasi (Black Garlic)'),
                'badge' => __('30 - 40 Hari Alami'),
                'description' => __('Proses reaksi Maillard termal pada temperatur terkontrol (65°C - 70°C) dan kelembaban 80% tanpa tambahan gula atau zat pewarna.'),
                'icon' => 'chamber',
                'details' => [
                    __('Perubahan warna hitam pekat alami'),
                    __('Rasa manis asam legit menyerupai kismis'),
                    __('Senyawa pedas allicin bermutasi menjadi SAC stabil'),
                ],
            ],
            [
                'step' => 3,
                'title' => __('Ekstraksi Senyawa Bioaktif'),
                'badge' => __('Teknologi Presisi'),
                'description' => __('Optimasi ekstraksi berbantu ultrasonik (UAE) untuk memisahkan molekul aktif S-allyl cysteine, flavonoid, dan polifenol tanpa degradasi panas.'),
                'icon' => 'lab',
                'details' => [
                    __('Kapasitas antioksidan maksimal'),
                    __('Pelarut aqueous ramah lingkungan (Green Extraction)'),
                    __('Uji metabolit terstandarisasi laboratorium'),
                ],
            ],
            [
                'step' => 4,
                'title' => __('Mikroenkapsulasi (Serbuk)'),
                'badge' => __('Formulasi Modern'),
                'description' => __('Penyalutan senyawa bioaktif dengan matriks pembawa alami, dilanjutkan pengeringan cepat spray-drying untuk menghasilkan serbuk fungsional larut air.'),
                'icon' => 'powder',
                'details' => [
                    __('Ukuran partikel mikro seragam'),
                    __('Bioavailabilitas cepat diserap saluran cerna'),
                    __('Umur simpan lebih panjang dan stabil'),
                ],
            ],
        ];

        return view('pages.process', compact('steps'));
    }
}
