<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Yunus',
            'email' => 'yunus@onlenkan.com',
            'password' => Hash::make('yunus123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@onlenkan.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir'
        ]);
    }
}
