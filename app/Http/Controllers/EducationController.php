<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function index(): View
    {
        $articles = Article::where('category', 'Edukasi')->latest()->get();

        $faqs = [
            [
                'q' => __('Apakah rasa Black Garlic masih terasa pedas dan berbau bawang menyengat?'),
                'a' => __('Tidak sama sekali. Proses fermentasi Maillard selama 35 hari mengubah senyawa pedas allicin menjadi senyawa SAC yang tidak menyengat. Rasanya menjadi manis, asam segar alami dengan aroma karamel gurih, dan kenyal mirip kismis atau dodol buah.'),
            ],
            [
                'q' => __('Mengapa bahan baku Bawang Putih Tunggal dari Sembalun sangat istimewa?'),
                'a' => __('Kawasan Sembalun terletak di kaldera purba lereng timur Gunung Rinjani pada ketinggian 1.100 - 1.250 mdpl. Tanah vulkanis yang kaya sulfur organik serta iklim mikro sejuk menghasilkan bawang putih tunggal dengan konsentrasi nutrisi dan senyawa allicin awal jauh lebih tinggi dibanding bawang dataran rendah.'),
            ],
            [
                'q' => __('Berapa banyak takaran konsumsi harian yang direkomendasikan?'),
                'a' => __('Untuk pemeliharaan kebugaran rutin, cukup 1-2 siung per hari saat pagi hari. Untuk membantu menjaga tensi dan kolesterol, dapat dikonsumsi 2-3 siung per hari. Untuk serbuk larut air, takaran 1 sendok teh (3-5 gram) diseduh dengan air hangat.'),
            ],
            [
                'q' => __('Apakah aman dikonsumsi oleh penderita maag atau asam lambung?'),
                'a' => __('Sangat aman. Berbeda dengan bawang mentah yang bersifat iritatif terhadap dinding lambung, proses fermentasi menurunkan tingkat keasaman tajam dan menjadikannya sangat ramah lambung bahkan jika dikonsumsi sebelum sarapan.'),
            ],
            [
                'q' => __('Bagaimana cara menyimpan Bawang Hitam agar tetap awet dan kenyal?'),
                'a' => __('Simpan di wadah kedap udara pada tempat sejuk dan terhindar dari cahaya matahari langsung. Jika ingin tekstur lebih kenyal dan masa simpan hingga lebih dari 1 tahun, simpan di dalam chiller kulkas.'),
            ],
        ];

        return view('pages.education', compact('articles', 'faqs'));
    }
}
