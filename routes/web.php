<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HalamanDepanController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('index-dashboard');

// HALAMAN DEPAN
Route::get('/dashboard/halaman-depan',[HalamanDepanController::class, 'index'])->name('halaman-depan');
Route::post('/dashboard/halaman-depan',[HalamanDepanController::class, 'store'])->name('store-halaman-depan');
Route::put('/dashboard/halaman-depan/{id}',[HalamanDepanController::class, 'update'])->name('update-halaman-depan');
Route::delete('/dashboard/halaman-depan/{id}',[HalamanDepanController::class, 'destroy'])->name('destroy-halaman-depan');

// MENU ARTIKEL
Route::get('/dashboard/artikel/{kategoriArtikel}',[ArtikelController::class, 'artikelByKategori']);
Route::get('/dashboard/artikel/{kategoriArtikel}/create',[ArtikelController::class, 'create']);
Route::post('/dashboard/artikel/{kategoriArtikel}/store',[ArtikelController::class, 'store']);
Route::get('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'edit']);
Route::put('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'update']);
Route::delete('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'destroy']);

// MENU STRUKTUR HIMPUNAN
Route::get('/dashboard/visi-misi',[VisiMisiController::class, 'index']);
Route::post('/dashboard/visi-misi',[VisiMisiController::class, 'update']);
// // Menu Anggota
Route::get('/dashboard/anggota',[AnggotaController::class, 'index']);
Route::post('/dashboard/anggota',[AnggotaController::class, 'store']);
Route::put('/dashboard/anggota/{anggota}',[AnggotaController::class, 'update']);
Route::delete('/dashboard/anggota/{anggota}',[AnggotaController::class, 'destroy']);

// MENU ALUMNI
Route::get('/dashboard/alumni',[AlumniController::class, 'index'])->name('index-alumni');
Route::post('/dashboard/alumni',[AlumniController::class, 'store'])->name('store-alumni');
Route::put('/dashboard/alumni/{alumni}',[AlumniController::class, 'update'])->name('update-alumni');
Route::delete('/dashboard/alumni/{alumni}',[AlumniController::class, 'destroy'])->name('destroy-alumni');

// MENU MASTER DATA
// // Menu Kategori Artikel
Route::post('/dashboard/kategori-artikel',[KategoriArtikelController::class, 'store'])->name('store-kategori_artikel');
Route::put('/dashboard/kategori-artikel/{kategori}',[KategoriArtikelController::class, 'update'])->name('update-kategori_artikel');
Route::delete('/dashboard/kategori-artikel/{kategori}',[KategoriArtikelController::class, 'destroy'])->name('destroy-kategori_artikel');

Route::get('/dashboard/{menu}',[KategoriArtikelController::class, 'index']);



