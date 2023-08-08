<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Pertemuan;
use App\Models\User;
use Illuminate\Http\Request;

class absensiController extends Controller
{
    public function index(){
        return view('dashboardAdmin.absensi.index',[
            'absensis' => User::with('absensi')->get()
        ]);
    }

    public function detailAbsensi(User $user){
        $detailAbsensi = Absensi::where('id_user', $user->id)->orderBy('id' , 'DESC')->get();

        return view('dashboardAdmin.absensi.detailAbsensi' , [
            'detailAbsensis' => $detailAbsensi,
            'user' => $user
        ]);
    }



}
