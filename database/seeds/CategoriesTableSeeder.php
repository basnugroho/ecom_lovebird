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
        $categories = ['uncategorized', 'makanan', 'minuman', 'multivitamin', 'obat', 'perawatan', 'suplemen'];
        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i],
                'description' => $categories[$i].'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore consectetur illum eum tempore ipsum hic dolor assumenda quibusdam sapiente. Quia, odit nostrum. Recusandae et aperiam nesciunt culpa optio beatae possimus.'
            ]);
        }
    }
}
