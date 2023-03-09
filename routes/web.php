<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HalamanDepanController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\GaleriController;
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

// ROUTE HALAMAN LOGIN
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authLogin'])->name('auth-login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth-logout')->middleware('auth');

// REDIRECT
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

// ROUTE HOME DASHBOARD
Route::get('/dashboard', function () {
    return view('admin.index');
})->name('index-dashboard')->middleware('auth');

// HALAMAN DEPAN
Route::get('/dashboard/halaman-depan',[HalamanDepanController::class, 'index'])->name('halaman-depan')->middleware('auth');
Route::post('/dashboard/halaman-depan',[HalamanDepanController::class, 'store'])->name('store-halaman-depan')->middleware('auth');
Route::put('/dashboard/halaman-depan/{id}',[HalamanDepanController::class, 'update'])->name('update-halaman-depan')->middleware('auth');
Route::delete('/dashboard/halaman-depan/{id}',[HalamanDepanController::class, 'destroy'])->name('destroy-halaman-depan')->middleware('auth');

// ROUTE GALLERY
Route::get('/dashboard/galeri',[GaleriController::class, 'index'])->name('galeri')->middleware('auth');

// MENU ARTIKEL
Route::get('/dashboard/artikel/{kategoriArtikel}',[ArtikelController::class, 'artikelByKategori'])->middleware('auth');
Route::get('/dashboard/artikel/{kategoriArtikel}/create',[ArtikelController::class, 'create'])->middleware('auth');
Route::post('/dashboard/artikel/{kategoriArtikel}/store',[ArtikelController::class, 'store'])->middleware('auth');
Route::get('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'destroy'])->middleware('auth');

// MENU STRUKTUR HIMPUNAN
Route::get('/dashboard/visi-misi',[VisiMisiController::class, 'index'])->middleware('auth');
Route::post('/dashboard/visi-misi',[VisiMisiController::class, 'update'])->middleware('auth');
// // Menu Anggota
Route::get('/dashboard/anggota',[AnggotaController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota',[AnggotaController::class, 'store'])->middleware('auth');
Route::put('/dashboard/anggota/{anggota}',[AnggotaController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/anggota/{anggota}',[AnggotaController::class, 'destroy'])->middleware('auth');

// MENU ALUMNI
Route::get('/dashboard/alumni',[AlumniController::class, 'index'])->name('index-alumni')->middleware('auth');
Route::post('/dashboard/alumni',[AlumniController::class, 'store'])->name('store-alumni')->middleware('auth');
Route::put('/dashboard/alumni/{alumni}',[AlumniController::class, 'update'])->name('update-alumni')->middleware('auth');
Route::delete('/dashboard/alumni/{alumni}',[AlumniController::class, 'destroy'])->name('destroy-alumni')->middleware('auth');

// MENU MASTER DATA
// // Menu Kategori Artikel
Route::post('/dashboard/kategori-artikel',[KategoriArtikelController::class, 'store'])->name('store-kategori_artikel')->middleware('auth');
Route::put('/dashboard/kategori-artikel/{kategori}',[KategoriArtikelController::class, 'update'])->name('update-kategori_artikel')->middleware('auth');
Route::delete('/dashboard/kategori-artikel/{kategori}',[KategoriArtikelController::class, 'destroy'])->name('destroy-kategori_artikel')->middleware('auth');

Route::get('/dashboard/{menu}',[KategoriArtikelController::class, 'index'])->middleware('auth');



