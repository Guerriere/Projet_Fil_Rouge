<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Partner User',
            'email' => 'partner@example.com',
            'telephone' => '1122334455',
            'adresse' => 'Partner Address',
            'role' => 'partenaire',
            'password' => Hash::make('password'), // Change this to a secure password
        ]);
    }
}