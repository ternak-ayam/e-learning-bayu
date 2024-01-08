<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriCheked extends Model
{
     protected $fillable = [
        'user_id',
        'materi_id',
        'checked'
    ];
    use HasFactory;
}
