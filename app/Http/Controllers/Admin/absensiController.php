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

    public function deletePertemuan($id){
        Pertemuan::find($id)->delete();
        return redirect()->route('admin.absensi.index');
    }
    public function createPertemuan($id = null){
        $pertemuan =  ($id != null) ? Pertemuan::find($id) : null;
        return view('dashboardAdmin.absensi.create', compact('pertemuan'));
    }

    public function createAbsensi($id = null){
         return view('dashboardAdmin.absensi.addAbsensi',[
            'users' => User::all(),
            'id_pertemuan' => $id,
         ]);
    }

    public function updateAbsensiView($id){
        $absensis = Absensi::where('id_pertemuan',$id)->get();
        return view('dashboardAdmin.absensi.updateAbsensi', [
            'absensis' => $absensis,
            'id' => $id
        ]);
    }

    public function addAbsensi(Request $request){
        $data = $request->all();
        // dd(count($data['id_user']));
        for($i = 0; $i < count($data['id_user']); $i++){
            Absensi::create([
                'id_pertemuan' => $data['id_pertemuan'][$i],
                'id_user' => $data['id_user'][$i],
                'absensi' => $data['absen'][$i]
            ]);
        }
        return redirect()->route('admin.absensi.index');
    }

    public function updateAbsensi($id,Request $request){
        $data = $request->all();
        for($i = 0; $i < count($data['id_user']); $i++){
            Absensi::where('id', $data['id_absensi'][$i])->update([
                'absensi' => $data['absen'][$i]
            ]);
        }
        return redirect()->route('admin.absensi.index');
    }


}
