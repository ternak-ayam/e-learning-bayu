<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiQuis extends Model
{
    protected $fillable = [
        'user_id',
        'quis_id',
        'bukti'
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
