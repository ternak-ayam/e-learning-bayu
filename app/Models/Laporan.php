<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'nilai'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
