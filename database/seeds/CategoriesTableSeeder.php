<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['uncategorized', 'makanan', 'multivitamin', 'perawatan'];
        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i]
            ]);
        }
    }
}
