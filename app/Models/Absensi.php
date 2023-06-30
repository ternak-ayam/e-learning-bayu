<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
       protected $fillable = [
        'id_pertemuan',
        'id_user',
        'absensi'
    ];

    public function user(){
        return $this->belongsTo('\App\Models\User', 'id_user');
    }

    public function pertemuan(){
        return $this->belongsTo('\App\Models\Pertemuan', 'id_pertemuan');
    }

    public static function getAbsensiIsExist($id){
        $absensi = Absensi::where('id_pertemuan',$id)->get();
        if ($absensi->isEmpty()) {
            $data = null;
        } else {
            $data = $absensi;
        }
        return $data;
    }
}

