<?php

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

Route::get('/dashboard/artikel/{kategoriArtikel}',[ArtikelController::class, 'artikelByKategori']);
Route::get('/dashboard/artikel/{kategoriArtikel}/create',[ArtikelController::class, 'create']);
Route::post('/dashboard/artikel/{kategoriArtikel}/store',[ArtikelController::class, 'store']);
Route::get('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'edit']);
Route::put('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'update']);
Route::delete('/dashboard/artikel/{kategoriArtikel}/{artikel:slug}',[ArtikelController::class, 'destroy']);

Route::get('/dashboard/visi-misi',[VisiMisiController::class, 'index']);
Route::post('/dashboard/visi-misi',[VisiMisiController::class, 'update']);

Route::get('/dashboard/{menu}',[KategoriArtikelController::class, 'index']);



