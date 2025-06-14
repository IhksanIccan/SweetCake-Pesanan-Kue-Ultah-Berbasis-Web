<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kue;

class KueSeeder extends Seeder
{
    public function run(): void
    {
        Kue::create([
            'nama_kue' => 'Brownies Kukus',
            'deskripsi' => 'Brownies kukus lembut dan lezat dengan cokelat premium.',
            'harga' => 35000,
            'gambar' => 'brownies.jpg', // pastikan file ini ada di storage atau public/img
        ]);

        Kue::create([
            'nama_kue' => 'Lapis Legit',
            'deskripsi' => 'Kue lapis legit dengan rasa rempah yang khas dan berlapis-lapis.',
            'harga' => 50000,
            'gambar' => 'lapis_legit.jpg',
        ]);

        Kue::create([
            'nama_kue' => 'Cheesecake',
            'deskripsi' => 'Cheesecake creamy dengan topping buah segar.',
            'harga' => 60000,
            'gambar' => 'cheesecake.jpg',
        ]);
    }
}
