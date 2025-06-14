<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PesananStaff;

class PesananStaffSeeder extends Seeder
{
    public function run()
    {
        PesananStaff::create([
            'pesanan_id' => 1,
            'staff_id' => 2, // pastikan ini ID staff yang valid
        ]);
    }
}
