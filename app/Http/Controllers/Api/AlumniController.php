<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlumniResource;
use App\Http\Resources\JsonFormatResource;
use App\Models\Alumni;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $query = Alumni::with('angkatan')->get();
        $data = AlumniResource::collection($query);
        return new JsonFormatResource(true, 'Data alumni HMTI.', $data);
    }

    public function getByTahun(Angkatan $angkatan)
    {
        // dd($angkatan->alumni);
        $query = $angkatan->alumni;
        $data = AlumniResource::collection($query);
        return new JsonFormatResource(true, "Data alumni HMTI $angkatan->tahun.", $data);
    }
}
