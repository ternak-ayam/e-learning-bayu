<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quis extends Model
{
    use HasFactory;
       protected $fillable = [
        'author',
        'category_id',
        'fasilitas_id',
        'deskripsi',
        'link'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class);
    }
}
