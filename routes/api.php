<?php

use App\Http\Controllers\Api\ArtikelController;
use App\Http\Resources\ArtikelResource;
use App\Http\Resources\HalamanDepanResource;
use App\Http\Resources\JsonFormatResource;
use App\Models\Artikel;
use App\Models\HalamanDepan;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API ARTIKEL
Route::get('artikel', [ArtikelController::class, 'index']);
Route::get('artikel/{artikel:slug}', [ArtikelController::class, 'show']);
Route::get('artikel/kategori/{kategori:slug}', [ArtikelController::class, 'artikelByKategori']);

// API GET ALL ALL KATEGORI ARTIKEL
Route::get('kategori-artikel', function() {
  $data = KategoriArtikel::orderBy('nama')->get();
  return new JsonFormatResource(true, 'Data kategori artikel.', $data);
});

Route::get('halaman-depan', function() {
  $slider = HalamanDepan::where('kategori', 'slider')->get();
  $tentang = HalamanDepan::where('kategori', 'tentang')->get()->first();
  $kepengurusan = HalamanDepan::where('kategori', 'kepengurusan')->get()->first();
  $visi = HalamanDepan::where('kategori', 'visi')->get()->first();
  $misi = HalamanDepan::where('kategori', 'misi')->get();

  $query = [
    ['slider' => $slider],
    ['tentang' => $tentang],
    ['kepengurusan' => $kepengurusan],
    ['visi' => $visi],
    ['misi' => $misi]
  ];

  $data = HalamanDepanResource::collection($query);
  return new JsonFormatResource(true, 'Data halaman depan.', $data);
});