<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul'
    ];

    public function absensi(){
        return $this->hasMany('App\Models\Absensi', 'id_pertemuan');
    }
}
