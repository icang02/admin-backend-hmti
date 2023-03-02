<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelResource;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::with('kategori_artikel')->orderBy('tanggal', 'desc')->get();
        return ArtikelResource::collection($data);
    }

    public function show(Artikel $artikel)
    {
        return new ArtikelResource($artikel);
    }

    public function artikelByKategori($kategori)
    {
        $getKategori = KategoriArtikel::where('nama', $kategori)->get()->first();
        if (!$getKategori) return abort(404);

        $data = Artikel::with('kategori_artikel')->where('kategori_artikel_id', $getKategori->id)->orderBy('tanggal')->get();
        return ArtikelResource::collection($data);
    }
}
