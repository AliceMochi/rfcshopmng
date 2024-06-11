<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductOlahan;

class ProductOlahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductOlahan::create([
            'image' => 'images/2g97zCHbjXT08hRvv4bSH77fwNEkq7SqYGXQsSyS.jpg',
            'name' => 'Lele Goreng',
            'price' => 10000.00,
            'category' => 'Makanan',
            'description' => 'Lele goreng yang crispy dan gurih di setiap gigitan.'
        ]);

        ProductOlahan::create([
            'image' => 'images/R58R4O4AHpnSEfdrQTOD3UsCsBxqGcoToZsLOf6Q.jpg',
            'name' => 'Lele Bakar',
            'price' => 15000.00,
            'category' => 'Makanan',
            'description' => 'Lele bakar bumbu rempah khas disajikan dengan hangat.'
        ]);

        ProductOlahan::create([
            'image' => 'images/7G1dOASGcGhlOvNgn0YYbStN9MdmmeGi57nIDjRC.jpg',
            'name' => 'Lele Penyet',
            'price' => 12000.00,
            'category' => 'Makanan',
            'description' => 'Lele penyet dengan sambal yang pedas menggugah selera.'
        ]);

        ProductOlahan::create([
            'image' => 'images/vWoc8iglaMeGn49HinX9HAwU7r8JDzjqi8FFCa88.jpg',
            'name' => 'Wader Goreng',
            'price' => 10000.00,
            'category' => 'Makanan',
            'description' => 'Wader goreng krispi, sempurna untuk camilan.'
        ]);

        ProductOlahan::create([
            'image' => 'images/2PUxc2hzvt3GpL4W8sYCP0W4evRZ9P23MFmfYuIp.jpg',
            'name' => 'Es Teh',
            'price' => 4000.00,
            'category' => 'Makanan',
            'description' => 'Es teh manis segar, pelepas dahaga.'
        ]);

        ProductOlahan::create([
            'image' => 'images/gU41YfemPEcnr10FdNpNCvfov2MkgfRu5TsSCqqQ.jpg',
            'name' => 'Air Mineral',
            'price' => 4000.00,
            'category' => 'Makanan',
            'description' => 'Air mineral dalam kemasan, menjaga Anda tetap terhidrasi.
            '
        ]);
    }
}
