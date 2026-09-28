<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // OWNER
        User::create([
            'name' => 'Owner StockFlow',
            'email' => 'owner@stockflow.test',
            'password' => 'password123',
            'role' => 'owner',
        ]);

        // ADMIN
        User::create([
            'name' => 'Admin StockFlow',
            'email' => 'admin@stockflow.test',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        // KASIR
        User::create([
            'name' => 'Kasir StockFlow',
            'email' => 'kasir@stockflow.test',
            'password' => 'password123',
            'role' => 'kasir',
        ]);
    }
}