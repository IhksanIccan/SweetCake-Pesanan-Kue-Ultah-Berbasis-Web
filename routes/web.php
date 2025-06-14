<?php

use App\Http\Controllers\ControllerStaff;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/staff', [ControllerStaff::class,'index']);

// Route::get('/master', function () {
//     return view('master');
// });

// Halaman untuk admin
// Route::get('/admin/dashboard', function () {
//     return view('layouts.app');
// })->middleware(['auth'])->name('admin.dashboard');

// Halaman untuk staff
Route::get('/staff', function () {
    return view('layouts.dashboardStaff');
})->middleware(['auth'])->name('layouts.dashboardStaff');

// Halaman untuk customer
Route::get('/customer', function () {
    return view('layouts.dashboardCustumer');
})->middleware(['auth'])->name('layouts.dashboardCustumer');


Route::get('/admin', function () {
    return view('layouts.dashboardAdmin');
})->middleware(['auth', 'verified'])->name('layouts.dashboardAdmin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

