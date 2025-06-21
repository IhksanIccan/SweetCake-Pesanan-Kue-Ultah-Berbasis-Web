<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
  


     protected $table = 'pesanans';

    protected $fillable = [
        'id_pembeli',
        'Total_Harga',
        'status',
        'is_paid',
        'id_kurir',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public $timestamps = true;

    // Relasi ke pembeli
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }

    // Relasi ke kurir
    public function kurir()
    {
        return $this->belongsTo(Kurir::class, 'id_kurir');
    }

    // Relasi ke item pesanan
    public function itemPesanans()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pesanan');
    }

    // Alias alternatif, jika di Blade kamu pakai `$pesanan->detail`
    public function detail()
    {
        return $this->hasMany(ItemPesanan::class, 'id_pesanan');
    }
}

