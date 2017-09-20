<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\User::create([
            'name' => 'admin',
            'email' => 's6134117@student.ubaya.ac.id',
            'password' => bcrypt('123123'),
            'admin' => 1,
        ]);

        $address = App\Address::create([
            'user_id' => $admin->id,
            'street' => 'Tenggilis Mejoyo Selatan III No 22',
            'phone' => '082141421214'
        ]);

    }
}
