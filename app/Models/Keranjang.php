<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $fillable = ['pembeli_id', 'produk_id', 'jumlah'];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
