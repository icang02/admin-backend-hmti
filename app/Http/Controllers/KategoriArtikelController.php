<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Jabatan;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

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
}
