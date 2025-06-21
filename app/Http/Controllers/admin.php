<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;

class admin extends Controller
{
    public function lihatproduk(){
        $lihat = produk::all();
        return view('admin.lihatproduk', compact('lihat'));
    }


    public function lihatpesanan(){
        $lihat = pesanan::all();
        return view('admin.lihatpesanan',compact('lihat'));
    }

    public function lihatuser(){
        $lihat = user::all();
        return view('admin.lihatuser',compact('lihat'));
    }

    public function hapus(Request $request){
        $hapus =user::findOrFail($request->id);
        $hapus->delete();
        return redirect()->route('adminlihatuser');
    }

    public function hapusproduk(Request $request){
        $hapus =produk::findOrFail($request->id);
        $hapus->delete();
        return redirect()->route('adminlihatuser');
    }

    
}
