<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $guarded = [''];
    public $timestamps = false;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
