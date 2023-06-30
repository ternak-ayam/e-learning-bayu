<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.absensi.index',[
            'absensis' => Absensi::where('id_user', Auth::user()->id)->get()
         ]);
    }
     public function cetakAbsensi(){
         $absensi = Absensi::where('id_user', Auth::user()->id)->get();
         $pdf = Pdf::loadView('dashboardUser.eLearning.absensi.cetakAbsensi',[
             'absensis' => $absensi
         ]);
        return  $pdf->stream();
    }
}
