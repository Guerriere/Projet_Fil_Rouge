<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'telephone' => '987654321',
            'adresse' => 'Client Address',
            'role' => 'client',
            'password' => Hash::make('password'), // Change this to a secure password
        ]);
    }
}