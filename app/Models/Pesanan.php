<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'kue_id', 'jumlah', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kue()
    {
        return $this->belongsTo(Kue::class);
    }

    public function pesananStaffs()
    {
        return $this->hasMany(PesananStaff::class);
    }

    public function staffs()
    {
        return $this->belongsToMany(User::class, 'pesanan_staff');
    }
}
