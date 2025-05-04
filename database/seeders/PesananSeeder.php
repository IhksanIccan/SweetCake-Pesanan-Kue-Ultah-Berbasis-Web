<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    public function run()
    {
        DB::table('pesanans')->insert([
            [
                'user_id' => 1, // pastikan user dengan ID 1 ada di tabel users
                'kue_id' => 1,  // pastikan kue dengan ID 1 ada di tabel kues
                'jumlah' => 2,
                'tanggal_pesan' => now()->toDateString(),
                'status' => 'menunggu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'kue_id' => 2,
                'jumlah' => 1,
                'tanggal_pesan' => now()->subDays(1)->toDateString(),
                'status' => 'diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
