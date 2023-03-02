<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
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
    return view('admin.index');
});

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

Route::get('/dashboard/{menu}',[KategoriArtikelController::class, 'index']);



