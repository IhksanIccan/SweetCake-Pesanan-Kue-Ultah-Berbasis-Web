<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['Nama'];

    public function produks()
    {
        return $this->belongsToMany(produk::class, 'kategori_produks', 'id_kategori', 'id_produk');
    }
}
