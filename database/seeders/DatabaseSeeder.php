<?php

namespace Database\Seeders;

use App\Models\PesananStaff;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CustomerProfileSeeder::class);
        $this->call(KueSeeder::class);
        $this->call(PesananSeeder::class);
        $this->call(PesananStaffSeeder::class);
    }
}
