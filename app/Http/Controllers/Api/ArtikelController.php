<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtikelResource;
use App\Http\Resources\JsonFormatResource;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $query = Artikel::with('kategori_artikel')->orderBy('tanggal', 'desc')->get();
        $data = ArtikelResource::collection($query);
        return new JsonFormatResource(true, 'Data seluruh artikel.', $data);
    }

    public function show(Artikel $artikel)
    {
        $data = new ArtikelResource($artikel);
        return new JsonFormatResource(true, "Data artikel show", $data);
    }

    public function artikelByKategori($kategori)
    {
        $getKategori = KategoriArtikel::where('nama', $kategori)->get()->first();
        if (!$getKategori) return abort(404);

        $query = Artikel::with('kategori_artikel')->where('kategori_artikel_id', $getKategori->id)->orderBy('tanggal')->get();
        $kategori = str()->lower($query->first()->kategori_artikel->nama);
        $data = ArtikelResource::collection($query);
        return new JsonFormatResource(true, "Data artikel kategori $kategori.", $data);
    }
}
