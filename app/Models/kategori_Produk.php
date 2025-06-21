<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Model;

class Kategori_Produk extends Pivot
{
    protected $table = 'kategori_produks';

    protected $fillable = ['id_produk', 'id_kategori'];
}
