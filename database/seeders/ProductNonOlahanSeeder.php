<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductNonOlahan;

class ProductNonOlahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductNonOlahan::create([
            'image' => 'images/E07SVsE5IQca5DIsJaexgkmmtGZCLT0tJAcoQ5IM.jpg',
            'name' => 'Anggur',
            'price' => 80000.00,
            'category' => 'Buah',
            'stock' => 100,
            'weight' => 1.0,
            'description' => 'Anggur segar, manis dan juicy.'
        ]);

        ProductNonOlahan::create([
            'image' => 'images/tzAvOwVVlpTEZQZqTnyl0aVZzDNeR7cB9O9xfEu3.jpg',
            'name' => 'Melon',
            'price' => 100000.00,
            'category' => 'Buah',
            'stock' => 50,
            'weight' => 2.5,
            'description' => 'Melon ukuran besar, manis dan segar.'
        ]);

        ProductNonOlahan::create([
            'image' => 'images/vIsvDn88iVmC6pr4EdQnMFUWoli1u7Ub6QHstyoT.jpg',
            'name' => 'Ikan Lele',
            'price' => 25000.00,
            'category' => 'Ikan',
            'stock' => 50,
            'weight' => 1.0,
            'description' => 'Ikan Lele segar langsung dari kolam, memiliki daging yang lembut dan gurih. Cocok untuk digoreng, dibakar, atau diolah menjadi berbagai masakan lezat.'
        ]);
        
        ProductNonOlahan::create([
            'image' => 'images/OSk9oU64IMYxfTBP60ZklZIANGJYibwqLVTkj2M2.jpg',
            'name' => 'Ikan Wader',
            'price' => 35000.00,
            'category' => 'Ikan',
            'stock' => 50,
            'weight' => 1.0,
            'description' => 'Ikan Wader segar, cocok untuk digoreng hingga menjadi krispi yang renyah di luar namun lembut di dalamnya. Ikan ini menjadi pilihan camilan yang nikmat dan bergizi.'
        ]);

        ProductNonOlahan::create([
            'image' => 'images/2uCbL9t6h4DDEcpuYQA4IZ57d7yiFmi9VR93zaAY.jpg',
            'name' => 'Cornelia Vanisa',
            'price' => 100000.00,
            'category' => 'JKT48',
            'stock' => 1,
            'weight' => 49,
            'description' => 'seperti teka-teki, kalian akan selalu penasaran denganku, aku Oniel.'
        ]);
    }
}
