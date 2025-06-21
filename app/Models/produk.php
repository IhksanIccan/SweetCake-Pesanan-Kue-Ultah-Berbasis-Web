<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model

{
     protected $table = 'produks';
    protected $fillable = ['nama_produk', 'deskripsi', 'Harga', 'Gambar', 'stok', 'id_penjual'];

    public function penjual()
    {
        return $this->belongsTo(penjual::class, 'id_penjual');
    }

    public function itemPesanans()
    {
        return $this->hasMany(itempesanan::class, 'id_produk');
    }

    public function kategoris()
    {
        return $this->belongsToMany(kategori::class, 'kategori_produks', 'id_produk', 'id_kategori');
    }
}
