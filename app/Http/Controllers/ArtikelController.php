<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function artikelByKategori($kategoriArtikel)
    {
        $kategoriGet = KategoriArtikel::where('slug', $kategoriArtikel)->get()->first();
        if (!$kategoriGet) return abort(404);

        $data = Artikel::where('kategori_artikel_id', $kategoriGet->id)->latest()->get();
        return view('admin.artikel.index', [
            'artikel' => $data,
            'kategoriArtikel' => str()->title($kategoriArtikel),
        ]);
    }

    public function create($kategoriArtikel) 
    {   
        $kategoriArtikelId = KategoriArtikel::where('nama', $kategoriArtikel)->first();
        if ($kategoriArtikelId == null) return abort(404);
        return view('admin.artikel.create', [
            'kategoriArtikel' => $kategoriArtikel,
            'kategoriArtikelId' => $kategoriArtikelId->id,
        ]);
    }

    public function store(Request $request, $kategoriArtikel)
    {  
        $namaGambar = null;
        $rules = [
            'judul' => 'required',
            'tanggal' => 'required',
            'content' => 'required'
        ];
        
        if ($request->hasFile('gambar')) {
            $rules = [
                'judul' => 'required',
                'tanggal' => 'required',
                'content' => 'required',
                'gambar' => 'mimes:png,jpg,jpeg|max:2048',
            ];
        }

        $request->validate($rules);
        if ($request->hasFile('gambar')) {
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('public/artikel', $namaGambar);
        }

        Artikel::create([
            'judul' => ucfirst($request->judul),
            'kategori_artikel_id' => $request->kategori_artikel_id,
            'slug' => str()->slug($request->judul),
            'tanggal' => $request->tanggal,
            'content' => $request->content,
            'gambar' => $namaGambar,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Artikel baru berhasil dipost.'
        ];
        return redirect("dashboard/artikel/$kategoriArtikel")->with(['data' => $data]);
    }

    public function edit($kategoriArtikel, Artikel $artikel)
    {
        $kategoriArtikelId = KategoriArtikel::where('nama', $kategoriArtikel)->first();
        if ($kategoriArtikelId == null) return abort(404);

        return view('admin.artikel.edit', [
            'artikel' => $artikel,
            'kategoriArtikel' => $kategoriArtikel,
            'kategoriArtikelId' => $kategoriArtikelId->id,
        ]);
    }

    public function update(Request $request, $kategoriArtikel, Artikel $artikel)
    {
        $namaGambar = $artikel->gambar;
        $rules = [
            'judul' => 'required',
            'tanggal' => 'required',
            'content' => 'required'
        ];
        
        if ($request->hasFile('gambar')) {
            $rules = [
                'judul' => 'required',
                'tanggal' => 'required',
                'content' => 'required',
                'gambar' => 'mimes:png,jpg,jpeg|max:2048',
            ];
        }

        $request->validate($rules);
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar != null) Storage::delete("public/artikel/$artikel->gambar");
            $namaGambar = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('public/artikel', $namaGambar);
        }

        $artikel->update([
            'judul' => ucfirst($request->judul),
            'slug' => str()->slug($request->judul),
            'tanggal' => $request->tanggal,
            'content' => $request->content,
            'gambar' => $namaGambar,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Artikel berhasil diupdate.'
        ];
        return redirect("dashboard/artikel/$kategoriArtikel")->with( ['data' => $data] );
    }

    public function destroy($kategoriArtikel, Artikel $artikel)
    {
        if ($artikel->gambar != null) Storage::delete("public/artikel/$artikel->gambar");
        $artikel->delete();

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Artikel berhasil dihapus.'
        ];
        return redirect("dashboard/artikel/$kategoriArtikel")->with(['data' => $data]);
    }
}
