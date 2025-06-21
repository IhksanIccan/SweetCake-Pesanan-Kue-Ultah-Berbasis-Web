<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class produkcontroller extends Controller
{
    public function create()
    {
        return view('penjual.lihatproduk');
    }

   
}
