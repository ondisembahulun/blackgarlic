<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Black Garlic Utuh Premium',
                'slug' => 'black-garlic-utuh-premium',
                'category' => 'Utuh',
                'subtitle' => 'Bawang Putih Tunggal Sembalun Fermentasi 35 Hari Alami',
                'description' => 'Diproduksi dari bawang putih tunggal (solo garlic) kualitas terbaik hasil panen petani lokal lereng Gunung Rinjani, Sembalun. Difermentasi menggunakan kontrol suhu dan kelembaban presisi selama 35 hari tanpa bahan kimia maupun pengawet. Menghasilkan tekstur kenyal seperti buah kering, rasa manis asam legit yang gurih, dan sama sekali tidak menimbulkan bau menyengat atau rasa getir.',
                'price' => 95000,
                'net_weight' => '250 gram (Jar Kaca Segel)',
                'ingredients' => '100% Bawang Putih Tunggal Sembalun (Allium sativum L.)',
                'benefits' => [
                    'Kaya antioksidan S-Allyl-Cysteine (SAC) hingga 6-10x lipat dibanding bawang segar',
                    'Membantu menstabilkan tekanan darah dan kadar kolesterol jahat (LDL)',
                    'Meningkatkan daya tahan tubuh dan mempercepat pemulihan energi',
                    'Sangat ramah lambung dan nyaman dikonsumsi penderita maag',
                    'Mendukung detoksifikasi hati dan kesehatan kardiovaskular',
                ],
                'usage_instructions' => 'Konsumsi 1-2 siung setiap pagi sebelum makan atau malam sebelum tidur. Simpan pada suhu ruang sejuk dan terhindar dari paparan sinar matahari langsung.',
                'image_url' => '/images/products/black-garlic-utuh.jpg',
                'is_featured' => true,
                'stock_status' => 'Tersedia',
            ],
            [
                'name' => 'Serbuk Black Garlic Mikroenkapsulasi',
                'slug' => 'serbuk-black-garlic-mikroenkapsulasi',
                'category' => 'Serbuk',
                'subtitle' => 'Inovasi Ekstrak Bioaktif Serbuk Larut Air',
                'description' => 'Produk hasil riset teknologi formulasi pangan fungsional. Melalui proses ekstraksi senyawa bioaktif berbasis gelombang ultrasonik ramah lingkungan, dilanjutkan dengan teknologi spray-drying mikroenkapsulasi. Menjaga molekul senyawa aktif S-allyl cysteine, polifenol, dan flavonoid tetap stabil, mudah larut dalam air, dan memiliki bioavailabilitas tinggi bagi tubuh.',
                'price' => 120000,
                'net_weight' => '100 gram (Pouch Foil Vacuum)',
                'ingredients' => 'Ekstrak Bawang Hitam Sembalun Murni, Enkapsulan Maltodekstrin Food Grade Alami',
                'benefits' => [
                    'Praktis diseduh langsung ke dalam air hangat, teh, madu, atau smoothies',
                    'Stabilitas senyawa bioaktif terlindungi dari degradasi oksidasi udara',
                    'Daya serap nutrisi lebih cepat di dalam saluran pencernaan',
                    'Dapat digunakan sebagai bumbu alami fungsional (healthy umami seasoning)',
                ],
                'usage_instructions' => 'Seduh 1 sendok teh (3-5 gram) ke dalam 150ml air hangat, dapat ditambahkan madu murni. Minum 1 kali sehari di pagi atau sore hari.',
                'image_url' => '/images/products/serbuk-black-garlic.jpg',
                'is_featured' => true,
                'stock_status' => 'Tersedia',
            ],
            [
                'name' => 'Kapsul Ekstrak Bioaktif Black Garlic',
                'slug' => 'kapsul-ekstrak-bioaktif-black-garlic',
                'category' => 'Turunan',
                'subtitle' => 'Suplemen Herbal Terstandar Konsentrasi Tinggi',
                'description' => 'Formulasi kapsul herbal praktis berisi ekstrak terstandar bawang hitam Sembalun. Dirancang untuk individu aktif yang menginginkan kepraktisan dalam menjaga imunitas dan sirkulasi darah tanpa perlu mengupas atau menyeduh.',
                'price' => 135000,
                'net_weight' => '60 Kapsul @ 500mg (Botol Higienis)',
                'ingredients' => 'Ekstrak Bawang Putih Fermentasi Sembalun, Cangkang Kapsul Nabati (Halal & Vegan)',
                'benefits' => [
                    'Dosis terukur dan mudah dibawa saat bepergian',
                    'Membantu meregulasi gula darah dan memelihara kebugaran fisik',
                    'Bebas bau mulut dan nyaman di perut',
                ],
                'usage_instructions' => 'Minum 2 kali sehari masing-masing 1 kapsul sesudah makan.',
                'image_url' => '/images/products/kapsul-black-garlic.jpg',
                'is_featured' => false,
                'stock_status' => 'Tersedia',
            ],
            [
                'name' => 'Madu Murni Fermentasi Black Garlic',
                'slug' => 'madu-murni-fermentasi-black-garlic',
                'category' => 'Turunan',
                'subtitle' => 'Sinergi Madu Hutan Liar Rinjani & Siung Bawang Hitam',
                'description' => 'Kombinasi eksklusif madu mentah nektar bunga hutan Sembalun dengan rendaman siung bawang hitam tunggal. Enzim alami madu memperkaya profil nutrisi dan menciptakan cita rasa manis karamel rempah yang sangat nikmat.',
                'price' => 110000,
                'net_weight' => '350 gram (Botol Kaca Hexagonal)',
                'ingredients' => 'Madu Mentah Alami Sembalun (80%), Siung Bawang Hitam Utuh (20%)',
                'benefits' => [
                    'Meredakan radang tenggorokan dan batuk kering',
                    'Sumber energi alami instan bagi stamina dan daya tahan',
                    'Kaya probiotik dan enzim aktif untuk pencernaan sehat',
                ],
                'usage_instructions' => 'Minum 1 sendok makan madu beserta 1 butir siung bawang hitam setiap pagi.',
                'image_url' => '/images/products/madu-black-garlic.jpg',
                'is_featured' => false,
                'stock_status' => 'Tersedia',
            ],
            [
                'name' => 'Teh Herbal Kulit & Infusi Black Garlic',
                'slug' => 'teh-herbal-infusi-black-garlic',
                'category' => 'Turunan',
                'subtitle' => 'Teh Hangat Kaya Antioksidan Rendah Kafein',
                'description' => 'Inovasi zero-waste pemanfaatan kulit ari dan serpihan bawang hitam fermentasi yang diproses higienis menjadi teh celup aromatik bernuansa rempah menenangkan.',
                'price' => 55000,
                'net_weight' => '20 Kantong Celup (Kotak Kraft Eco)',
                'ingredients' => 'Kulit & Ekstrak Bawang Hitam Fermentasi, Daun Mint Sembalun, Serai Kering',
                'benefits' => [
                    'Memberikan efek relaksasi dan membantu tidur lebih nyenyak',
                    'Mengurangi rasa kembung dan menghangatkan tubuh di cuaca dingin',
                    'Bebas kafein sehingga aman diminum kapan saja',
                ],
                'usage_instructions' => 'Seduh 1 kantong celup dengan 200ml air mendidih selama 3-5 menit. Nikmati hangat.',
                'image_url' => '/images/products/teh-black-garlic.jpg',
                'is_featured' => false,
                'stock_status' => 'Tersedia',
            ],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
