<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Kue;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user dengan role 'customer'
        $user = User::where('role', 'customer')->first();
        // Ambil satu kue
        $kue = Kue::first();

        if ($user && $kue) {
            Pesanan::create([
                'user_id' => $user->id,
                'kue_id' => $kue->id,
                'jumlah' => 2,
                'tanggal_pesan' => now()->toDateString(),
                'status' => 'menunggu',
            ]);

            Pesanan::create([
                'user_id' => $user->id,
                'kue_id' => $kue->id,
                'jumlah' => 1,
                'tanggal_pesan' => now()->subDay()->toDateString(),
                'status' => 'diproses',
            ]);
        }
    }
}
