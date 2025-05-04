<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KueSeeder extends Seeder
{
    public function run()
    {
        DB::table('kues')->insert([
            [
                'nama_kue' => 'Kue Coklat',
                'deskripsi' => 'Kue coklat klasik dengan topping ceres.',
                'harga' => 300000,
                'gambar' => 'kue_coklat.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Vanilla',
                'deskripsi' => 'Kue lembut rasa vanilla manis.',
                'harga' => 350000,
                'gambar' => 'kue_vanilla.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Red Velvet',
                'deskripsi' => 'Kue mewah rasa red velvet dengan krim keju.',
                'harga' => 250000,
                'gambar' => 'kue_redvelvet.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Tiramisu',
                'deskripsi' => 'Kue dengan lapisan krim dan kopi khas tiramisu.',
                'harga' => 500000,
                'gambar' => 'kue_tiramisu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Buah',
                'deskripsi' => 'Kue segar dengan topping buah-buahan asli.',
                'harga' => 550000,
                'gambar' => 'kue_buah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Keju',
                'deskripsi' => 'Kue dengan lapisan keju parut dan krim lembut.',
                'harga' => 340000,
                'gambar' => 'kue_keju.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Matcha',
                'deskripsi' => 'Kue rasa green tea matcha dari Jepang.',
                'harga' => 175000,
                'gambar' => 'kue_matcha.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Stroberi',
                'deskripsi' => 'Kue rasa stroberi segar dengan hiasan buah stroberi.',
                'harga' => 155000,
                'gambar' => 'kue_stroberi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Black Forest',
                'deskripsi' => 'Kue coklat khas Jerman dengan cherry dan krim.',
                'harga' => 185000,
                'gambar' => 'kue_blackforest.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Oreo',
                'deskripsi' => 'Kue krim dengan taburan oreo dan coklat putih.',
                'harga' => 145000,
                'gambar' => 'kue_oreo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Kopi',
                'deskripsi' => 'Kue rasa kopi mocca dengan buttercream.',
                'harga' => 150000,
                'gambar' => 'kue_kopi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Caramel',
                'deskripsi' => 'Kue manis dengan saus karamel dan kacang.',
                'harga' => 140000,
                'gambar' => 'kue_caramel.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Pandan',
                'deskripsi' => 'Kue lembut rasa pandan khas Indonesia.',
                'harga' => 135000,
                'gambar' => 'kue_pandan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Rainbow',
                'deskripsi' => 'Kue dengan warna pelangi dan krim lembut.',
                'harga' => 165000,
                'gambar' => 'kue_rainbow.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kue' => 'Kue Ubi Ungu',
                'deskripsi' => 'Kue lembut dari bahan ubi ungu pilihan.',
                'harga' => 150000,
                'gambar' => 'kue_ubiungu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
