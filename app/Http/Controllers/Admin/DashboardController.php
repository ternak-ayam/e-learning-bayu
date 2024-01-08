<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('dashboardAdmin.dashboard.index',[
            'mahasiswas' => User::all()
         ]);
    }

     public function laporanUser(){
        return view('dashboardAdmin.laporan.index', [
             'laporans' => User::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get()
        ]);
    }

    public function nilaiLaporanUser($id){

     $laporan = Laporan::find($id);
        if(Laporan::find($id)->nilai){
           $nilai = Laporan::find($id);
        }else{
            $nilai = null;
        }

        return view('dashboardAdmin.laporan.nilai', compact('nilai', 'laporan'));
    }

    public function nilaiLaporanUserSave(Request $request){
           $this->validate($request, [
            'nilai' => 'required',
            'id' => 'required'
           ]);

           Laporan::where('id', $request->id)->update([
               'nilai' => $request->nilai
           ]);

           return redirect()->route('admin.daftar.laporan');
    }



}
