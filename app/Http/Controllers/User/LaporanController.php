<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index(){
            return view('dashboardUser.dokumen.pengumpulanLaporan.index',[
                'laporan' => Laporan::where('id_user', Auth::user()->id)->first()
            ]);
    }

    public function uploadLaporan(Request $request){
        $request->validate([
            'judul' => 'required',
            'file' => 'required|mimes:pdf,docx,ppt,jpg,jpeg,png'
        ]);

        $file = $request->file;
        $fileName = time() . '_' . 'Laporan' . '_' . Auth::user()->name . '.' . $file->getClientOriginalExtension();
        if($this->uploadFile($request,$fileName,$file)){
            Laporan::create([
                'id_user' => Auth::user()->id,
                'judul' => $request->judul,
                'file' => $fileName
            ]);

            return redirect()->route('user.laporan.index');
        }

    }

    public function updateLaporan($id,Request $request){
        $file = $request->file;
        $fileName = time() . '_' . 'Laporan' . '_' . Auth::user()->name . '.' . $file->getClientOriginalExtension();
        $request->validate([
            'judul' => 'required',
            'file' => 'sometimes|mimes:pdf,docx,ppt,jpg,jpeg,png'
        ]);

        $laporan = Laporan::findOrFail($id);
        if(isset($request->file)){
            if($this->updateFile($request,$fileName,$laporan)){
                $laporan->judul = $request->judul;
                $laporan->file = $fileName;
                $laporan->save();
                return redirect()->route('user.laporan.index');
            }
        }else{
            $laporan->judul = $request->judul;
            $laporan->save();
            return redirect()->route('admin.laporan.index');
        }

    }

    public function daftarLaporan(){
         return view('dashboardUser.dokumen.pencarianLaporan.index',[
            'laporans' => User::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get()
         ]);
    }


    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/tugas')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }

       public function updateFile(Request $request,$fileName, Laporan $laporan){
       $oldFile = Storage::disk('public/laporan')->exists($laporan->file)
        ? Storage::disk('public/laporan')->get($laporan->file)
        : null;

        if ($request->hasFile('file')) {
            // Store the new file
            if (Storage::disk('public/laporan')->put($fileName, file_get_contents($request->file))) {
                // Delete the old file if it exists
                if ($oldFile !== null) {
                    Storage::disk('public/laporan')->delete($laporan->file);
                }
                return true;
            }
        }
        return false;
    }


}
