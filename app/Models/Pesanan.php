<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{

    protected $fillable = ['user_id', 'kue_id', 'jumlah', 'tanggal_pesan', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kue()
    {
        return $this->belongsTo(Kue::class);
    }
}
