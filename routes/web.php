<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Penghubung;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/prosesRegister',[AuthController::class,'prosesRegister']);
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



// ADMIN ROUTE GROUP
Route::group(['middleware' => ['cek_login:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class,'index']);
    Route::get('/buku/{hashedId}/lihat', [AdminController::class, 'lihatBuku'])->name('buku.lihat');
    Route::get('/admin/buku', [AdminController::class,'buku']);
    Route::get('/admin/buku/tambahBuku', [AdminController::class,'tambahbuku']);
    Route::post('/admin/buku/prosesTambahBuku', [AdminController::class,'prosesTambahBuku']);
    Route::post('/admin/buku/delete', [AdminController::class,'delete']);
    Route::post('/admin/buku/edit', [AdminController::class,'edit']);
    Route::post('/admin/buku/prosesEdit', [AdminController::class,'prosesEdit']);
    Route::get('/admin/anggota', [AdminController::class,'anggota']);
    Route::get('/admin/peminjaman', [AdminController::class,'peminjaman']);
    Route::get('/admin/peminjaman/cetak',[AdminController::class,'cetakpeminjaman'])->name('cetak.peminjaman');
    Route::get('/admin/pengembalian', [AdminController::class,'pengembalian']);
    Route::get('/admin/pengembalian/cetak',[AdminController::class,'cetakPengembalian'])->name('cetak.pengembalian');
    Route::get('/admin/ulasan', [AdminController::class,'ulasan']);
    Route::get('/admin/ulasan/cetak',[AdminController::class,'cetakulasan'])->name('cetak.ulasan');
});

// USER ROUTE GROUP
Route::group(['middleware' => ['cek_login:user']], function () {
    
    Route::get('/peminjaman/daftar', [UserController::class, 'daftarBukuDipinjam'])->name('peminjaman.daftar');
    Route::post('/peminjaman/{bukuId}',[UserController::class,'peminjaman'])->name('peminjaman');
    Route::get('/pengembalian',[UserController::class,'pengembalian']);
    Route::get('/ulasan',[UserController::class,'ulasan']);
    Route::post('/pengembalian/{id}', [UserController::class, 'kembalikanBuku'])->name('pengembalian.kembalikan');
    Route::get('ulasan-buku', [UserController::class, 'ulasan'])->name('ulasan-buku.index');
    Route::get('ulasan-buku/tambah/{buku_id}', [UserController::class, 'tambahUlasan'])->name('ulasan-buku.tambah');
    Route::post('ulasan-buku/proses', [UserController::class, 'prosesUlasan'])->name('ulasan-buku.proses');
    Route::get('/buku/{hashedId}/baca', [UserController::class, 'baca'])->name('baca');
    Route::get('/buku/cari', [UserController::class, 'cari'])->name('cari');
    Route::get('/buku/cari/pengembalian', [UserController::class, 'cari_pengembalian'])->name('cari.pengembalian');


});
Route::get('/',[UserController::class,'index']);
Route::get('/detail/{id}',[UserController::class,'detail'])->name('detail');


