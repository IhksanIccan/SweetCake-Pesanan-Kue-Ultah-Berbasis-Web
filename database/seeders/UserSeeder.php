<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // unique key
            [
                'name' => 'Admin SweetCake',
                'password' => bcrypt('12341234'),
                'role' => 'admin'
            ]
        );
    }
}
