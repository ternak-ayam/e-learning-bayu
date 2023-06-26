<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ojt extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pembimbing',
        'sekolah',
        'mulai_ojt',
        'akhir_ojt'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
