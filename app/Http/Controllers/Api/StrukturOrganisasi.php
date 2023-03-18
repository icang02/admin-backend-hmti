<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonFormatResource;
use App\Http\Resources\StrukturOrganisasiResource;
use App\Models\Anggota;
use Illuminate\Http\Request;

class StrukturOrganisasi extends Controller
{
    public function index()
    {
        $query = Anggota::with('jabatan')->get();
        $data = StrukturOrganisasiResource::collection($query);
        return new JsonFormatResource(true, 'Data anggota himpunan.', $data);
    }
}
