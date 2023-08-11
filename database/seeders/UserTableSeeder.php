<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'Admin',
                'gender' => 'male',
                'password' => Hash::make('password'),
                'phone_number' => '123456789',
                'birth' => '1990-01-01',
                'image' => 'admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2,
                'name' => 'User',
                'gender' => 'female',
                'password' => Hash::make('password'),
                'phone_number' => '987654321',
                'birth' => '1995-05-10',
                'image' => 'user.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 3,
                'name' => 'Delivery',
                'gender' => 'male',
                'password' => Hash::make('password'),
                'phone_number' => '555555555',
                'birth' => '1992-09-15',
                'image' => 'delivery.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
