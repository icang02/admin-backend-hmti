<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Artikel;
use App\Models\Jabatan;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriArtikelController extends Controller
{
    public function index($menu)
    {
        if ($menu == 'kategori-artikel') {
            $data = KategoriArtikel::orderBy('nama')->get();
            $headerTable = 'Nama Kategori';
        }
        if ($menu == 'data-jabatan') {
            $data = Jabatan::all();
            $headerTable = 'Jabatan';
        }
        if ($menu == 'data-angkatan'){
            $data = Angkatan::orderBy('tahun')->get();
            $headerTable = 'Nama Angkatan';
        }
        
        return view('admin.master-data.kategori-artikel.index', [
            'kategoriArtikel' => $data,
            'menu' => ucwords(str_replace('-', ' ', $menu)),
            'headerTable' => $headerTable,
        ]);
    }

    public function store(Request $request)
    {
        $rules = ['nama' => 'required|unique:kategori_artikel'];
        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'Kolom kategori belum diisi.',
            'unique' => 'Kategori artikel sudah ada.'
        ]);

        if ($validator->errors('nama')->first()) {    
            $data = [
                'type' => 'danger',
                'title' => 'Gagal',
                'success' => $validator->errors('nama')->first()
            ];
            return back()->with(['data' => $data])->withInput();
        }

        KategoriArtikel::create([
            'nama' => ucfirst($request->nama),
            'slug' => str()->slug($request->nama),
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Kategori baru berhasil ditambahkan.'
        ];
        return back()->with(['data' => $data]);
    }

    public function update(Request $request, KategoriArtikel $kategori)
    {
        $rules = ['nama' => 'required|unique:kategori_artikel'];
        if ($kategori->nama == $request->nama) $rules = ['nama' => 'required'];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'Kolom kategori wajib diisi.',
            'unique' => 'Kategori artikel sudah ada.'
        ]);

        if ($validator->errors('nama')->first()) {    
            $data = [
                'type' => 'danger',
                'title' => 'Gagal',
                'success' => $validator->errors('nama')->first()
            ];
            return back()->with(['data' => $data]);
        }

        $kategori->update([
            'nama' => ucfirst($request->nama),
            'slug' => str()->slug($request->nama),
        ]);
        
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Kategori berhasil diupdate.'
        ];
        return back()->with(['data' => $data]);
    }

    public function destroy(KategoriArtikel $kategori)
    {
        $cekArtikel = Artikel::where('kategori_artikel_id', $kategori->kategori_artikel_id)->get();
        if ($cekArtikel) {
            $data = [
                'type' => 'danger',
                'title' => 'Gagal',
                'success' => "Kategori $kategori->nama masih digunakan."
            ];
            return back()->with(['data' => $data]);
        }

        $kategori->delete();
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Kategori berhasil dihapus.'
        ];
        return back()->with(['data' => $data]);
    }
}
