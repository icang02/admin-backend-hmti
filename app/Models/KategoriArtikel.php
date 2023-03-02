<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    use HasFactory;
    protected $table = 'kategori_artikel';
    protected $guarded = [''];
    public $timestamps = false;

    public function artikel()
    {
        return $this->hasMany(artikel::class);
    }
}
