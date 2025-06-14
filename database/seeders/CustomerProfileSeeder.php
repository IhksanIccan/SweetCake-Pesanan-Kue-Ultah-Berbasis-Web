<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\Hash;

class CustomerProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user dengan role 'customer' jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'customer1@gmail.com'],
            [
                'name' => 'Customer Satu',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ]
        );

        // Buat profil customer
        CustomerProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'alamat' => 'Jl. Mawar No. 12',
                'telepon' => '081234567890',
            ]
        );
    }
}
