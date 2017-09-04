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
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123'),
            'admin' => 1,
        ]);

        $address = App\Address::create([
            'user_id' => $admin->id
        ]);

    }
}
