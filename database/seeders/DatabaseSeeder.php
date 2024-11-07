<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'seller',
            'password' => bcrypt('12345678'),
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'jerichokecilsekali@gmail.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]);
    }
}
