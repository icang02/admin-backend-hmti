<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function artikelByKategori($kategoriArtikel)
    {
        $kategoriGet = KategoriArtikel::where('slug', $kategoriArtikel)->get()->first();
        if (!$kategoriGet) return abort(404);

        $data = Artikel::where('kategori_berita_id', $kategoriGet->id)->latest()->get();
        return view('admin.artikel.index', [
            'artikel' => $data,
            'kategoriArtikel' => str()->title($kategoriArtikel),
        ]);
    }

    // public function index()
    // {
    //     // $data = Berita::with('kategori_berita')->where('kategori_berita_id', $id)->orderBy('tanggal')->get();
    //     $data = Berita::latest()->get();
    //     return BeritaResource::collection($data);
    // }

    // public function show(Berita $berita)
    // {
    //     return new BeritaResource($berita);
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'judul' => 'required',
    //         'tanggal' => 'required',
    //         'content' => 'required',
    //         'kategori_berita_id' => 'required',
    //     ]);

    //     // check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     $nGambar = null;
    //     if ($request->hasFile('gambar')) {
    //         $gambar = $request->file('gambar');
    //         $nGambar = $gambar->hashName();
    //         $gambar->storeAs('public/berita', $nGambar);
    //     }

    //     $berita = Berita::create([
    //         'judul' => $request->judul,
    //         'kategori_berita_id' => $request->kategori_berita_id,
    //         'slug' => str()->slug($request->judul),
    //         'tanggal' => $request->tanggal,
    //         'gambar' => $nGambar,
    //         'content' => $request->content
    //     ]);

    //     return new BeritaResource($berita);
    // }

    // public function destroy($id)
    // {
    //     $berita = Berita::findOrFail($id);
    //     // dd($berita);
    //     if ($berita->gambar != null) {
    //         Storage::delete("public/berita/$berita->gambar");
    //     }
    //     $berita->delete();
    //     return response()->json(['data' => 'Data berhasil dihapus.']);
    // }
}
