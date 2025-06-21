<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $fillable = ['user_id', 'No_HP', 'Alamat_Pembeli'];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function pesanans()
    {
        return $this->hasMany(pesanan::class, 'id_pembeli');
    }
    public function keranjang()
    {
    return $this->hasMany(Keranjang::class);
    }
}
