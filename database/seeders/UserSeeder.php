<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => 123
        ])->assignRole('Super Admin');

        User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 123
        ])->assignRole('Admin');

        User::firstOrCreate([
            'name' => 'Author',
            'email' => 'author@gmail.com',
            'password' => 123
        ])->assignRole('Author');

        User::firstOrCreate([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 123
        ])->assignRole('User');
    }
}
