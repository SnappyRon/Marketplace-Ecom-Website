<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Import the Product model

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Vintage T-Shirt',
            'price' => 160.00,
            'image' => 'f1.jpg',
            'supplier_name' => 'Supplier 1',
        ]);

        Product::create([
            'name' => 'Green White Polo',
            'price' => 180.00,
            'image' => 'f2.jpg',
            'supplier_name' => 'Supplier 2',
        ]);



        Product::create([
            'name' => 'Rose Gold Polo',
            'price' => 180.00,
            'image' => 'f3.jpg',
            'supplier_name' => 'Supplier 3',
        ]);


        Product::create([
            'name' => 'White Rose Polo',
            'price' => 180.00,
            'image' => 'f4.jpg',
            'supplier_name' => 'Supplier 4',
        ]);


        Product::create([
            'name' => 'Blue Rose Polo',
            'price' => 180.00,
            'image' => 'f5.jpg',
            'supplier_name' => 'Supplier 5',
        ]);


        Product::create([
            'name' => 'Red Blue Long Sleeve',
            'price' => 200.00,
            'image' => 'f6.jpg',
            'supplier_name' => 'Supplier 6',
        ]);


        Product::create([
            'name' => 'White Pants',
            'price' => 250.00,
            'image' => 'f7.jpg',
            'supplier_name' => 'Supplier 7',
        ]);


        Product::create([
            'name' => 'Light Red Long Sleeve',
            'price' => 250.00,
            'image' => 'f8.jpg',
            'supplier_name' => 'Supplier 8',
        ]);


        Product::create([
            'name' => 'Gold Plated Polo',
            'price' => 500.00,
            'image' => 'n4.jpg',
            'supplier_name' => 'Supplier 9',
        ]);


        Product::create([
            'name' => 'Formal Blue Long Sleeve',
            'price' => 500.00,
            'image' => 'n5.jpg',
            'supplier_name' => 'Supplier 10',
        ]);


        Product::create([
            'name' => 'Short Pants',
            'price' => 299.00,
            'image' => 'n6.jpg',
            'supplier_name' => 'Supplier 11',
        ]);


        Product::create([
            'name' => 'Leather Jacket',
            'price' => 1000.00,
            'image' => 'n7.jpg',
            'supplier_name' => 'Supplier 12',
        ]);


    }
}
