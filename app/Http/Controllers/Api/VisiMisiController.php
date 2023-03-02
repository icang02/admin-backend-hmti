<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisiMisiRosource;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data = VisiMisi::all();
        return VisiMisiRosource::collection($data);
    }
}
