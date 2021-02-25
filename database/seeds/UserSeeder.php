<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Rizal',
            'email' => 'rizalihwan94@gmail.com',
            'username' => 'rizalihwan',
            'password' => bcrypt('password')
        ]);
    }
}
