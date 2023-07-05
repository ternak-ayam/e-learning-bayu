<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\UploadTugas;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.tugas.index',[
            'tugass' => Tugas::all()
         ]);
    }

    public function viewDetailTugas($id){
         return view('dashboardUser.eLearning.tugas.detailTugas', [
            'tugas' => Tugas::where('id', $id)->first(),
            'upload_tugas' => UploadTugas::where('id_tugas',$id)->where('id_user', Auth::user()->id)->first()
         ]);
    }

    public function tugasUpload($id,Request $request){
        $request->validate([
            'file' => 'required | mimes:pdf,docx,ppt,jpg,jpeg,png'
        ]);

        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
  
        if($this->uploadFile($request,$fileName,$file)){
             UploadTugas::create([
                'id_user' => Auth::user()->id,
                'id_tugas' => $id,
                'file' => $fileName
            ]);
            return redirect()->back();
        }

    }

    public function tugasUpdate(Request $request,$id){
        $request->validate([
            'file' => 'required | mimes:pdf,docx,ppt,jpg,jpeg,png'
        ]);
        $tugas = UploadTugas::findOrFail($id);
        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
          if($this->updateFile($request,$fileName,$tugas)){
                // dd($request->file);
                $tugas->file = $fileName;
                $tugas->save();
                return redirect()->back();
            }

    }
    
    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/tugas')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }

       public function updateFile(Request $request,$fileName, UploadTugas $tugas){
       $oldFile = Storage::disk('public/tugas')->exists($tugas->file)
        ? Storage::disk('public/tugas')->get($tugas->file)
        : null;

        if ($request->hasFile('file')) {
            // Store the new file
            if (Storage::disk('public/tugas')->put($fileName, file_get_contents($request->file))) {
                // Delete the old file if it exists
                if ($oldFile !== null) {
                    Storage::disk('public/tugas')->delete($tugas->file);
                }
                return true;
            }
        }
        return false;
    }
}
