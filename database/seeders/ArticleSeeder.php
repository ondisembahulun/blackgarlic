<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Mengenal Black Garlic Sembalun: Dari Lereng Rinjani Menjadi Superfood Dunia',
                'slug' => 'mengenal-black-garlic-sembalun',
                'category' => 'Edukasi',
                'summary' => 'Bagaimana bawang putih tunggal pegunungan Sembalun bertransformasi melalui proses fermentasi alami suhu terkontrol menjadi produk pangan fungsional bernilai tinggi.',
                'content' => 'Bawang putih tunggal (solo garlic) dari Sembalun di Lombok Timur memiliki keistimewaan tersendiri dibanding varietas lain di nusantara. Tumbuh di lembah vulkanis subur pada ketinggian lebih dari 1.100 meter di atas permukaan laut (mdpl), bawang ini menerima paparan sinar matahari tropis optimal dengan suhu sejuk pegunungan.

Melalui proses fermentasi termal lambat selama 30 hingga 40 hari pada suhu 60-70°C dengan kelembaban terkontrol (Maillard Reaction), senyawa pedas dan menyengat bernama allicin bertransformasi secara alami menjadi senyawa antioksidan larut air yang sangat kuat: S-Allyl-Cysteine (SAC).

Hasil akhirnya adalah siung bawang berwarna hitam pekat dengan tekstur kenyal layaknya buah kurma, cita rasa manis-asam legit tanpa rasa pedas getir, serta tidak meninggalkan aroma tajam di mulut setelah dikonsumsi. Inilah rahasia superfood alami yang semakin dicari untuk gaya hidup sehat masa kini.',
                'author' => 'Dr. Ir. Suwardi, M.Sc (Pakar Teknologi Pangan)',
                'reading_time' => '4 menit baca',
                'image_url' => '/images/articles/edukasi-black-garlic.jpg',
                'is_published' => true,
                'published_at' => '2026-10-10',
            ],
            [
                'title' => 'Riset Ilmiah: Lonjakan Senyawa Bioaktif Polifenol dan S-Allyl Cysteine pada Fermentasi Bawang Hitam',
                'slug' => 'riset-ilmiah-senyawa-bioaktif-sac',
                'category' => 'Penelitian',
                'summary' => 'Hasil pengujian laboratorium membuktikan kapasitas antioksidan (FRAP & DPPH) bawang hitam melonjak hingga 8 kali lipat dibanding bawang putih mentah biasa.',
                'content' => 'Penelitian komprehensif yang dilakukan oleh tim kolaborasi riset mengungkap bahwa selama proses pemanasan terkontrol, terjadi degradasi senyawa sulfur labil menjadi metabolit stabil yang jauh lebih mudah diserap oleh tubuh manusia.

Salah satu temuan kunci adalah peningkatan drastis kandungan S-Allyl Cysteine (SAC). Jika pada bawang putih mentah kadar SAC relatif rendah dan mudah rusak oleh asam lambung, pada bawang hitam kadar SAC meningkat drastis dan stabil pada rentang pH 2 hingga 8. 

Selain SAC, total polifenol dan flavonoid juga mengalami peningkatan signifikan yang bertanggung jawab terhadap penangkapan radikal bebas, perlindungan sel endotel pembuluh darah, dan pencegahan stres oksidatif penyebab penuaan dini.',
                'author' => 'Tim Peneliti Laboratorium Biokimia Pangan',
                'reading_time' => '5 menit baca',
                'image_url' => '/images/articles/penelitian-lab.jpg',
                'is_published' => true,
                'published_at' => '2026-10-18',
            ],
            [
                'title' => 'Inovasi Mikroenkapsulasi: Mengubah Bawang Hitam Menjadi Serbuk Larut Air Berkualitas Tinggi',
                'slug' => 'inovasi-mikroenkapsulasi-serbuk-bawang-hitam',
                'category' => 'Pengembangan Produk',
                'summary' => 'Teknologi mikroenkapsulasi melindungi senyawa fungsional bawang hitam agar tahan lama dan mudah diaplikasikan pada minuman fungsional modern.',
                'content' => 'Tantangan utama produk pasta dan siung bawang hitam basah adalah kadar air (moisture content) yang memerlukan penyimpanan hati-hati agar terhindar dari jamur. Untuk menjawab kebutuhan industri modern dan konsumen yang dinamis, dikembangkanlah teknologi mikroenkapsulasi.

Dengan menggunakan teknologi ultrasonik berenergi rendah, ekstrak bioaktif dipisahkan tanpa merusak struktur fitokimia. Selanjutnya, cairan ekstrak disalut menggunakan matriks enkapsulasi maltodekstrin alami berstandar food grade dan dikeringkan secara kilat dengan spray dryer.

Teknologi ini menghasilkan serbuk halus keemasan-cokelat gelap yang 100% larut air dingin maupun hangat, stabil terhadap perubahan suhu ruangan, dan membuka peluang besar bagi formulasi nutraceutical serta seasoning gourmet berkelas internasional.',
                'author' => 'Tim Rekayasa Proses & Inovasi Pangan',
                'reading_time' => '4 menit baca',
                'image_url' => '/images/articles/mikroenkapsulasi.jpg',
                'is_published' => true,
                'published_at' => '2026-10-28',
            ],
            [
                'title' => 'Kemitraan Malsye & Petani Bawang Lembah Sembalun Bumbung: Hilirisasi Komoditas Bernilai Tinggi',
                'slug' => 'pemberdayaan-petani-lembah-sembalun',
                'category' => 'Kegiatan',
                'summary' => 'Kolaborasi strategis bersama mitra Malsye dan kelompok tani Sembalun Bumbung menghadirkan kepastian harga panen dan sertifikasi ketertelusuran (traceability) dari ladang hingga ke tangan konsumen.',
                'content' => 'Selama bertahun-tahun, fluktuasi harga komoditas bawang putih pascapanen seringkali merugikan para petani lokal di Sembalun saat panen raya tiba. Lewat kolaborasi strategis bersama mitra kami Malsye di Sembalun Bumbung, bahan baku dipasok dan diproses dengan standar harga berkeadilan serta teknologi fermentasi higienis.

Tidak hanya membeli hasil panen, kemitraan bersama Malsye di Sembalun Bumbung ini juga memberikan pendampingan seleksi bibit bawang nunggal berbobot unggul, pemantauan plot lahan lereng Rinjani, serta pencatatan kode batch (Traceability System). 

Dengan sistem ini, konsumen dapat mengetahui persis riwayat asal-usul dari mitra Malsye di Sembalun Bumbung, ketinggian lahan budidaya 1.100+ mdpl, hingga tanggal panen dan durasi proses produksinya.',
                'author' => 'Divisi Kemitraan Malsye Sembalun',
                'reading_time' => '3 menit baca',
                'image_url' => '/images/articles/kegiatan-petani.jpg',
                'is_published' => true,
                'published_at' => '2026-11-05',
            ],
            [
                'title' => 'Panduan Konsumsi Harian Black Garlic untuk Menjaga Vitalitas dan Imunitas Optimal',
                'slug' => 'panduan-konsumsi-harian-black-garlic',
                'category' => 'Edukasi',
                'summary' => 'Berapa banyak siung yang aman dikonsumsi setiap hari? Kapan waktu terbaik menikmatinya? Simak panduan lengkap ahli gizi di sini.',
                'content' => 'Bawang hitam adalah suplemen makanan alami utuh, bukan obat kimia sintetis, sehingga sangat aman dikonsumsi setiap hari sebagai bagian dari diet seimbang.

1. Waktu Terbaik: 
Konsumsi terbaik adalah di pagi hari sebelum sarapan dengan segelas air hangat, atau di malam hari sebelum tidur untuk membantu relaksasi pembuluh darah.

2. Dosis Dianjurkan:
- Menjaga kebugaran harian: 1 hingga 2 siung per hari.
- Membantu terapi pemulihan stamina atau menjaga tekanan darah: 2 hingga 3 siung per hari.
- Bentuk serbuk: 1 sendok teh (3-5 gram) diseduh dengan 150ml air hangat, dapat dikombinasikan dengan 1 sendok madu murni.

3. Penyimpanan:
Simpan di tempat kering dan sejuk, hindari sinar matahari langsung. Untuk kerenyahan dan tekstur kenyal maksimal, dapat disimpan di lemari pendingin (kulkas).',
                'author' => 'Tim Edukasi Gizi & Kesehatan',
                'reading_time' => '3 menit baca',
                'image_url' => '/images/articles/cara-konsumsi.jpg',
                'is_published' => true,
                'published_at' => '2026-11-12',
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }
    }
}
