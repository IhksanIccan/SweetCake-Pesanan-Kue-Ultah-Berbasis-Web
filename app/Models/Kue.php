<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kue extends Model
{

    protected $fillable = ['nama_kue', 'deskripsi', 'harga', 'gambar'];

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
