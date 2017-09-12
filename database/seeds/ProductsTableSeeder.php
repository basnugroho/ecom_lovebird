<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class, 20)->create();

        // $p1 = [
        //     'name' => 'METABOLIS  PUTIH BMW MASTER',
        //     'image' => 'uploads/products/book.png',
        //     'price' => 5000,
        //     'description' => 'Lorem Ipsum is setting i it to make a type specimen book.',
        // ];

        // $p2 = [
        //     'name' => 'F1 LOVEBIRD FULL NGEKEK LOMBA & F1 SERIES HARIAN',
        //     'image' => 'uploads/products/book.png',
        //     'price' => 2400,
        //     'description' => 'Lorem Ipsum is simply dummy text of the printing and typ'
        // ];

        // Product::create($p1);
        // Product::create($p2);
    }
}
