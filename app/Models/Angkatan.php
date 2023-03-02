<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;
    protected $table = 'angkatan';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }
}
