<?php

namespace App\Http\Controllers;

use App\Models\HalamanDepan;
use Illuminate\Http\Request;

class HalamanDepanController extends Controller
{
    public function index()
    {
        // $data = HalamanDepan::orderByRaw('FIELD(kategori,visi,misi,foto kahim,foto wakahim,slider,tentang,kepengurusan)')->get();
        $data = HalamanDepan::orderBy('kategori')->get();
        return view('admin.halaman-depan.index', [
            'data' => $data
        ]);
    }
}
