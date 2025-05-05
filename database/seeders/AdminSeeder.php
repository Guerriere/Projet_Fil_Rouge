<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'telephone' => '123456789',
            'adresse' => 'Admin Address',
            'role' => 'admin',
            'password' => Hash::make('password'), // Change this to a secure password
        ]);
    }
}
