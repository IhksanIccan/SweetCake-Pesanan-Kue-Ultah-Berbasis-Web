<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPesanan extends Model
{
    protected $table = 'item_pesanans';

    protected $fillable = ['id_pesanan', 'id_produk', 'jumlah', 'harga_satuan'];

    public $timestamps = true; // set false jika tidak pakai created_at/updated_at

    // Relasi ke pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}