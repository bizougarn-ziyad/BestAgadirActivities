<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Check if user already exists
        if (UserData::where('email', 'test@example.com')->exists()) {
            return;
        }

        UserData::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
