<?php

namespace App\Models;

use App\Models\produk;
use Illuminate\Database\Eloquent\Model;

class penjual extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function produks()
    {
        return $this->hasMany(produk::class, 'id_penjual');
    }

    public function kurirs()
    {
        return $this->hasMany(kurir::class, 'user_id');
    }
    public function keranjang()
    {
    return $this->hasMany(Keranjang::class);
    }
}
