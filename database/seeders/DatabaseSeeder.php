<?php

namespace Database\Seeders;

use App\Models\UserData;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // UserData::factory(10)->create();

        UserData::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
