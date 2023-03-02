<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::with(['jabatan'])->get();
        $allJabatan = Jabatan::all();

        return view('admin.struktur-himpunan.anggota.index', [
            'anggota' => $data,
            'allJabatan' => $allJabatan,
        ]);
    }

    public function store(Request $request)
    {
        $rules =  [
            'nama' => 'required',
            'jabatan_id' => 'required|unique:anggota',
        ];
        if ($request->has('foto')) {
            $rules =  [
                'nama' => 'required',
                'jabatan_id' => 'required|unique:anggota',
                'foto' => 'mimes:png,jpg,jpeg|max:2048',
            ];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data = [
                'type' => 'danger',
                'title' => 'Gagal',
                'success' => 'Jabatan masih digunakan pada data lain.'
            ];
            return back()->with(['data' => $data]);
        }

        $namaFoto = null;
        if ($request->has('foto')) {
            $file = $request->file('foto');
            $namaFoto = $file->hashName();
            $file->storeAs('public/anggota', $namaFoto);
        }

        Anggota::create([
            'nama' => ucfirst($request->nama),
            'jabatan_id' => $request->jabatan_id,
            'foto' => $namaFoto,
        ]);
        
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil ditambahkan.'
        ];
        return back()->with(['data' => $data]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $rules =  [
            'nama' => 'required',
            'jabatan_id' => 'required|unique:anggota',
        ];

        if ($anggota->jabatan->id == $request->jabatan_id) {
            $rules =  [
                'nama' => 'required',
                'jabatan_id' => 'required',
            ];
        }
        if ($request->has('foto')) {
            $rules =  [
                'nama' => 'required',
                'jabatan_id' => 'required',
                'foto' => 'mimes:png,jpg,jpeg|max:2048',
            ];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data = [
                'type' => 'danger',
                'title' => 'Gagal',
                'success' => 'Jabatan masih digunakan pada data lain.'
            ];
            return back()->with(['data' => $data]);
        }
        
        $namaFoto = $anggota->foto;
        if ($request->has('foto')) {
            if ($anggota->foto != null) Storage::delete('public/anggota/' . $anggota->foto);
            $namaFoto = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('public/anggota', $namaFoto);
        }
        $anggota->update([
            'nama' => ucfirst($request->nama),
            'jabatan_id' => $request->jabatan_id,
            'foto' => $namaFoto,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil diupdate.'
        ];
        return back()->with(['data' => $data]);
    }

    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto != null) Storage::delete("public/anggota/$anggota->foto");
        $anggota->delete();
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil dihapus.'
        ];
        return back()->with(['data' => $data]);
    }
}
