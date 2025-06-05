<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Tomat Hijau',
            'location_city' => 'Jombang',
            'description' => 'Hadirkan sentuhan segar dan sedikit asam yang khas di setiap masakan Anda dengan Tomat Hijau pilihan kami, langsung dari Jombang! Dipetik saat matang sempurna, tomat hijau ini memiliki tekstur yang renyah dan rasa yang membangkitkan selera.',
            'image_path' => 'img/tomato.png',
            'whatsapp_link' => 'https://wa.me/+6285161236246',
            'instagram_link' => 'https://instagram.com/_chandrafebriyanto'
        ]);

        Product::create([
            'name' => 'Bayam Segar',
            'location_city' => 'Nganjuk',
            'description' => 'Rasakan kebaikan alam dengan Bayam Segar kami yang berasal dari Nganjuk. Setiap helai daunnya yang hijau lebat menyimpan kekayaan vitamin dan mineral, siap menutrisi hari Anda.',
            'image_path' => 'img/bayam.png',
            'whatsapp_link' => 'https://wa.me/+6285161236246',
            'instagram_link' => 'https://instagram.com/_chandrafebriyanto'
        ]);

        Product::create([
            'name' => 'Bawang Merah',
            'location_city' => 'Pare',
            'description' => 'Tak ada masakan Indonesia yang lengkap tanpa Bawang Merah berkualitas! Bawang Merah kami, didatangkan khas dari Pare, dikenal dengan ukurannya yang pas, warnanya yang cerah, serta aroma dan rasa yang kuat.',
            'image_path' => 'img/bawang-merah.png',
            'whatsapp_link' => 'https://wa.me/+6285161236246',
            'instagram_link' => 'https://instagram.com/_chandrafebriyanto'
        ]);

        Product::create([
            'name' => 'Kol',
            'location_city' => 'Blitar',
            'description' => 'Nikmati kerenyahan alami dari Kol segar pilihan yang kami datangkan langsung dari Blitar. Dengan daunnya yang padat dan putih bersih, kol ini menawarkan tekstur renyah yang memuaskan dan rasa manis yang lembut.',
            'image_path' => 'img/kol.png',
            'whatsapp_link' => 'https://wa.me/+6285161236246',
            'instagram_link' => 'https://instagram.com/_chandrafebriyanto'
        ]);
    }
}