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
        return redirect()->route('admin.absensi.index');
    }

    public function updatePertemuan(Request $request,$id){
          $data = $request->validate([
             'judul' => 'required'
          ]);
          Pertemuan::findOrFail($id)->update($data);
          return redirect()->route('admin.absensi.index');
    }

    public function deleteAbsensi($id){
        Pertemuan::find($id)->delete();
        return redirect()->route('admin.absensi.index');
    }
    public function createPertemuan($id = null){
        $pertemuan =  ($id != null) ? Pertemuan::find($id) : null;
        return view('dashboardAdmin.absensi.create', compact('pertemuan'));
    }


}
