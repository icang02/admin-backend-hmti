<?php

use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\VisiMisiController;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// API ARTIKEL
Route::get('artikel', [ArtikelController::class, 'index']);
Route::get('artikel/{artikel:slug}', [ArtikelController::class, 'show']);
Route::get('artikel/kategori/{kategori:slug}', [ArtikelController::class, 'artikelByKategori']);

// API VISI MISI
Route::get('visi-misi', [VisiMisiController::class, 'index']);

// API GET ALL ALL KATEGORI ARTIKEL
Route::get('kategori_artikel', function() {
  $data = KategoriArtikel::select(['nama', 'slug'])->orderBy('nama')->get();
  return response()->json([
    'data' => $data,
  ]);
});