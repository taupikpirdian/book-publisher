<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bookpublisher.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Create demo user
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@bookpublisher.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
