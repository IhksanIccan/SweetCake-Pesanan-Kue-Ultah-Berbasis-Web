<?php

use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;





// Route::get('/test', function () {
//     return view('dashboard.dashboard');
// });
// Route::get('/test', function () {
//     return view('wkwk.test');
// });



Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/adminlihatproduk', [admin::class, 'lihatproduk'])->name('adminlihatproduk');
    Route::get('/adminlihatuser', [admin::class, 'lihatuser'])->name('adminlihatuser');
    Route::get('/adminlihatpesanan', [admin::class, 'lihatpesanan'])->name('lihatpesanan');
    Route::post('/admin/produk/hapus/{id}', [admin::class, 'hapusproduk'])->name('admin.produk.hapus');
    Route::post('/user/{id}', [admin::class, 'hapus'])->name('hapus');
});

Route::middleware('auth', 'role:penjual')->group(function () {
    // Produk
    Route::get('/tambahproduk', [PenjualController::class, 'tambahproduk'])->name('tambahproduk');
    Route::get('/lihatproduk', [PenjualController::class, 'lihatproduk'])->name('lihatprodukku');
    Route::post('/simpanproduk', [PenjualController::class, 'simpanproduk'])->name('simpanproduk');
    Route::post('/hapus/{id}', [PenjualController::class, 'hapusproduk'])->name('delete');
    Route::get('/penjual/produk/{id}/edit', [PenjualController::class, 'editproduk'])->name('penjual.editproduk');
    Route::put('/penjual/produk/{id}', [PenjualController::class, 'updateproduk'])->name('penjual.updateproduk');

    // Pesanan
    Route::get('/penjual/pesanan', [PenjualController::class, 'lihatpesananpenjual'])->name('penjual.pesanan');
    Route::patch('/penjual/pesanan/{id}/status', [PenjualController::class, 'ubahStatusPesanan'])->name('penjual.pesanan.ubahstatus');
    Route::patch('/penjual/pesanan/{id}/konfirmasi-pembayaran', [PenjualController::class, 'konfirmasiPembayaran'])->name('penjual.pesanan.konfirmasi');

    // Kurir
    Route::get('/lihatkurir', [PenjualController::class, 'lihatkurir'])->name('penjual.kurir.index');
    Route::get('/tambahkurir', [PenjualController::class, 'create'])->name('penjual.kurir.create');
    Route::post('/kurir', [PenjualController::class, 'store'])->name('penjual.kurir.store');
    Route::get('/editkurir/{id}', [PenjualController::class, 'edit'])->name('penjual.kurir.edit');
    Route::put('/kurir/{id}', [PenjualController::class, 'update'])->name('penjual.kurir.update');
    Route::delete('/kurir/{id}', [PenjualController::class, 'destroy'])->name('penjual.kurir.destroy');
});


Route::middleware(['auth', 'role:pembeli'])->group(function () {
    // Dashboard pembeli
    Route::get('/dashboard/pembeli', function () {
        return view('pembeli.dashboard'); // Pastikan view ini tersedia
    })->name('dashboardpembeli');

    // Biodata pembeli
    Route::get('/pembeli/biodata', [PembeliController::class, 'formBiodata'])->name('pembeli.biodata');
  Route::put('/pembeli/biodata', [PembeliController::class, 'updateBiodata'])->name('pembeli.biodata.update');

    // Daftar dan detail produk
    Route::get('/pembeli/produk', [PembeliController::class, 'daftarProduk'])->name('pembeli.produk');
    Route::get('/produk/{id}', [PembeliController::class, 'detailProduk'])->name('pembeli.produk.detail');

    // Keranjang dan Checkout
    // Menampilkan isi keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');

    // Menambahkan produk ke keranjang
    Route::post('/keranjang/tambah/{produkId}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');

    // Menghapus item dari keranjang
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');

    // Melakukan checkout
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
});








// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test', function () {
//     return view('profile.edit');
// });
require __DIR__ . '/auth.php';
