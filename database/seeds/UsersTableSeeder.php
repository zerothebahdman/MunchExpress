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
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@me.com',
            'role' => 'admin',
            'password' => bcrypt('test@1234'),
            'restaurant_name' => 'Aunty Ajobi Kitchen',
            'location' => 'FCT, Abuja',
            'phone' => "08122334456",

            'name' => 'User',
            'email' => 'user@me.com',
            'role' => 'user',
            'password' => bcrypt('test@1234'),
            'restaurant_name' => 'Chicken Republic',
            'location' => 'FCT, Abuja',
            'phone' => "08122334456",
        ]);
    }
}
