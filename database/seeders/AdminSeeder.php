<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the original admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'bizougarnziyad3@gmail.com',
            'password' => Hash::make('Bizou2005z'),
        ]);

        // Create the new admin
        Admin::create([
            'name' => 'Ziyad Admin',
            'email' => 'bizougarnziyad.dev@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
