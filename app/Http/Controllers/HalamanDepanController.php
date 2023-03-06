<?php

namespace App\Http\Controllers;

use App\Models\HalamanDepan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {  
        if (gettype($request->content) == 'string') {
            $rules = ['content' => 'required'];
        } else {
            $rules = ['content' => 'image|mimes:png,jpeg,jpg|max:2048'];
        }
        $request->validate($rules);

        if (gettype($request->content) == 'string') {
            $content = $request->content;
        } else {
            $rules = 'image|mimes:png,jpeg,jpg|max:2048';
            $content = $request->file('content')->store('slider');
        }

        HalamanDepan::create([
            'kategori' => $request->kategori,
            'content' => $content,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data baru ditambahkan.'
        ];
        return back()->with(['data' => $data]);
    }

    public function update(Request $request, HalamanDepan $id)
    {
        // dd($id);
        $data = $id;
        if ($request->kategori == 'foto kahim' || $request->kategori == 'foto wakahim' || $request->kategori ==  'slider') {
            $rules = [
                'content' => 'image|mimes:jpg,jpeg,png|max:2048'
            ];
        } else {
            $rules = [
                'content' => 'required'
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        $content = $request->content;
        if (!$request->content) $content = $data->content;

        // check if request is image
        if ($request->hasFile('content')) {
            if ($request->kategori == 'foto kahim' || $request->kategori == 'foto wakahim') {
                if ($data->content != null) Storage::delete($data->content);
                $content = $request->file('content')->store('foto-home');
            }
    
            if ($request->kategori == 'slider') {
                if ($data->content != null) Storage::delete($data->content);
                $content = $request->file('content')->store('slider');
            }
        }

        $data->update([
            'content' => $content,
        ]);

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil diupdate.'
        ];
        return back()->with(['data' => $data]);
    }

    public function destroy($id)
    {
        $data = HalamanDepan::findOrFail($id);
        if ($data->kategori == 'foto kahim' ||
            $data->kategori == 'foto wakahim' ||
            $data->kategori == 'slider'
        )  {
            Storage::delete("$data->content");
        }
        $data->delete();

        $data = [
            'type' => 'success',
            'title' => 'Sukses',
            'success' => 'Data berhasil dihapus.'
        ];
        return back()->with(['data' => $data]);
    }
}
