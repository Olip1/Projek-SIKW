<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        Product::truncate();

        Product::insert([
            [
                'name' => 'Jamu Kunyit Asam',
                'thumbnail' => 'kunyit-asam.jpg',
                'description' => 'Jamu kunyit asam adalah minuman herbal tradisional ',
                'price' => 15000,
            ],
            [
                'name' => 'Jamu Beras Kencur',
                'thumbnail' => 'beras-kencur.png',
                'description' => 'Jamu beras kencur bermanfaat meningkatkan stamina...',
                'price' => 12000,
            ],
            [
                'name' => 'Sinom',
                'thumbnail' => 'sinom.jpg',
                'description' => 'Membantu melancarkan metabolisme...',
                'price' => 18000,
            ],
            [
                'name' => 'Jamu Kunci Sirih',
                'thumbnail' => 'kunci-sirih.jpg',
                'description' => 'Baik untuk kesehatan organ kewanitaan...',
                'price' => 20000,
            ],
        ]);
    }
}
