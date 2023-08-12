<?php

namespace Database\Seeders;
<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> origin/master

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
<<<<<<< HEAD
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        User::factory(10)->create();

=======
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'phoneNumber' => 'test654654',
        // ]);
>>>>>>> origin/master
    }
}
