<?php

use App\Http\Controllers\Api\AlumniController;
use App\Http\Controllers\Api\ArtikelController;
use App\Http\Resources\GaleriResource;
use App\Http\Resources\HalamanDepanResource;
use App\Http\Resources\JsonFormatResource;
use App\Models\Angkatan;
use App\Models\Galeri;
use App\Models\HalamanDepan;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API GET ALL KATEGORI ARTIKEL
Route::get('kategori-artikel', function () {
    $data = KategoriArtikel::orderBy('nama')->get();
    return new JsonFormatResource(true, 'Data kategori artikel.', $data);
});

// API GET ARTIKEL
Route::get('artikel', [ArtikelController::class, 'index']);
// get berdasarkan kategori artikel
Route::get('artikel/{artikel:slug}', [ArtikelController::class, 'show']);
// get berdasarkan judul artikel
Route::get('artikel/kategori/{kategori:slug}', [ArtikelController::class, 'artikelByKategori']);

// API GET DATA HALAMAN BERANDA
Route::get('halaman-depan', function () {
    $query = HalamanDepan::orderBy('kategori')->get();
    $data = HalamanDepanResource::collection($query);
    return new JsonFormatResource(true, 'Data halaman depan.', $data);
});

// API GET DATA GALERI
Route::get('galeri', function () {
    $query = Galeri::latest()->get();
    $data = GaleriResource::collection($query);
    return new JsonFormatResource(true, 'Data galeri.', $data);
});

// API GET DATA ANGKATAN
Route::get('angkatan', function () {
    $query = Angkatan::orderBy('tahun')->get();
    return new JsonFormatResource(true, 'Data angkatan.', $query);
});

// API GET DATA ALUMNI
Route::get('alumni', [AlumniController::class, 'index']);
// berdasarkan tahun
Route::get('alumni/{angkatan:tahun}', [AlumniController::class, 'getByTahun']);
