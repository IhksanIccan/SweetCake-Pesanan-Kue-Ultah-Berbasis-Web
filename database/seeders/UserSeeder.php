<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin2@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@gmail.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('12345678'),
                'role' => 'staff',
            ]
        ); 
    }
}


