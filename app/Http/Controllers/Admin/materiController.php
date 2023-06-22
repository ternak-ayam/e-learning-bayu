<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class materiController extends Controller
{
    public function index(){
        return view('dashboardAdmin.materi.index' , [
            'materis' => Materi::all()
        ]);
    }
    public function addMateri(){
        return view('dashboardAdmin.materi.create');
    }

    public function storeMateri(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf,docx,ppt',
        ]);
        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
  
        if($this->uploadFile($request,$fileName,$file)){
            Materi::create([
                'deskripsi' => $request->deskripsi,
                'file' => $fileName
            ]);
            return redirect()->route('materi.index');
        }
    }

    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/materi')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }
}
