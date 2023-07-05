<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadTugas extends Model
{
    use HasFactory;
       protected $fillable = [
        'id_user',
        'id_tugas',
        'file'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}

