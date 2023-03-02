<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function index()
    {
        $data = Alumni::with('angkatan')->get();

        return view('admin.alumni.index', [
            'alumni' => $data,
            'allAngkatan' => Angkatan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rules =  [
            'nama' => 'required',
            'jabatan_id' => 'required',
        ];
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
                'Gagal' => 'Ukuran gambar lebih 2Mb atau gambar tidak didukung.'
            ];
            return back()->with(['data' => $data]);
        }

        $namaFoto = null;
        if ($request->has('foto')) {
            $file = $request->file('foto');
            $namaFoto = $file->hashName();
            $file->storeAs('public/alumni', $namaFoto);
        }

        Alumni::create([
            'nama' => ucfirst($request->nama),
            'angkatan_id' => $request->jabatan_id,
            'foto' => $namaFoto,
        ]);
        
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil ditambahkan.'
        ];
        return back()->with(['data' => $data]);
    }

    public function update(Request $request, Alumni $alumni)
    {
        $rules =  [
            'nama' => 'required',
            'jabatan_id' => 'required',
        ];

        if ($alumni->angkatan->id == $request->jabatan_id) {
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
                'Gagal' => 'Ukuran gambar lebih 2Mb atau gambar tidak didukung.'
            ];
            return back()->with(['data' => $data]);
        }
        
        $namaFoto = $alumni->foto;
        if ($request->has('foto')) {
            if ($alumni->foto != null) Storage::delete('public/anggota/' . $alumni->foto);
            $namaFoto = $request->file('foto')->hashName();
            $request->file('foto')->storeAs('public/anggota', $namaFoto);
        }
        $alumni->update([
            'nama' => ucfirst($request->nama),
            'angkatan_id' => $request->jabatan_id,
            'foto' => $namaFoto,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil diupdate.'
        ];
        return back()->with(['data' => $data]);
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->foto != null) Storage::delete("public/anggota/$alumni->foto");
        $alumni->delete();
        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil dihapus.'
        ];
        return back()->with(['data' => $data]);
    }
}
