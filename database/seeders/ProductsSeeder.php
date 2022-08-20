<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'name' => 'Ürün 1',
            'category_id' => 2,
            'price' => 500,
            'stock' => 80
        ]);

        Product::create([
            'name' => 'Ürün 2',
            'category_id' => 1,
            'price' => 100,
            'stock' => 150
        ]);

        Product::create([
            'name' => 'Ürün 3',
            'category_id' => 1,
            'price' => 150,
            'stock' => 100
        ]);

        Product::create([
            'name' => 'Ürün 4',
            'category_id' => 2,
            'price' => 50,
            'stock' => 100
        ]);
    }
}
