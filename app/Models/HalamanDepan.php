<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalamanDepan extends Model
{
    use HasFactory;
    protected $table = 'halaman_depan';
    protected $guarded = [''];
    public $timestamps = false;
}
