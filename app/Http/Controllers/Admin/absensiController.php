<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

class absensiController extends Controller
{
    public function index(){
        return view('dashboardAdmin.absensi.index',[
            'pertemuans' => Pertemuan::all()
        ]);
    }
    public function addPertemuan(Request $request){
        $this->validate($request, [
             'judul' => 'required'
        ]);
        Pertemuan::create([
            'judul' => $request->judul
        ]);
        return redirect()->route('absensi.index');
    }


}
