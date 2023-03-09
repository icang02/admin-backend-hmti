<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $data = Galeri::latest()->get();
        return view('admin.galeri.index', [
            'data' => $data,
        ]);
    }
}
