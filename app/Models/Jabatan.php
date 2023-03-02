<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $guarded = [''];
    public $timestamps = false;

    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
