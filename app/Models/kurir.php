<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kurir extends Model
{
    protected $fillable = ['id_penjual', 'nama_kurir', 'no_telepon'];

    public function penjual()
    {
        return $this->belongsTo(penjual::class, 'id_penjual');
    }

    public function pesanans()
    {
        return $this->hasMany(pesanan::class, 'id_kurir');
    }
}