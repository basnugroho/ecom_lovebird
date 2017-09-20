<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'admin' => 0,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3),
        'image' => 'uploads/products/book.png',
        'description' => $faker->paragraph(4),
        'stock' => rand(200, 500),
        'weight' => rand(100,250),
        'price' => $faker->numberBetween(1000, 15000),
        'category_id' => rand(2, 7),
        'description' => $faker->sentence(15)
    ];
});
