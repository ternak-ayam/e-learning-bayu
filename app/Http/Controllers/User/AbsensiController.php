<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    public function index(){
        $today = Carbon::today()->toDateString();
        $todayAbsen = Absensi::where('id_user', auth()->user()->id)->whereDate('created_at', $today)->get();
        $status = true;
        if(!$todayAbsen->isEmpty()){
            $status = false;
        }
         return view('dashboardUser.eLearning.absensi.index',[
            'absensis' => Absensi::where('id_user', Auth::user()->id)->get(),
             'status' => $status
         ]);
    }

    public function addAbsensi(){
        Absensi::create([
            'id_user' => auth()->user()->id,
            'absensi' => 'hadir'
        ]);
        return redirect()->back();
    }

     public function cetakAbsensi(){
         $absensi = Absensi::where('id_user', Auth::user()->id)->get();
         $pdf = Pdf::loadView('dashboardUser.eLearning.absensi.cetakAbsensi',[
             'absensis' => $absensi
         ]);
        return  $pdf->stream();
    }
}
