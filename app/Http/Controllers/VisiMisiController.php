<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = VisiMisi::all();
        return view('admin.struktur-himpunan.visi-misi.index', [
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'kata_sambutan' => 'required',
        ]);

        $visiMisi = VisiMisi::all();

        $dataUpdate = [
            $request->visi, $request->misi, $request->kata_sambutan
        ]; 

        foreach ($visiMisi as $i=> $item) {
            $item->update([
                'isi' => $dataUpdate[$i],
            ]);
        }

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil diupdate.'
        ];
        return back()->with(['data' => $data]);
    }
}
