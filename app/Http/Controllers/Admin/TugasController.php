<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index(){
         return view('dashboardAdmin.tugas.index',[
            'tugass' => Tugas::all()
         ]);
    }

    public function viewAddTugas($id = null){
        if($id != null){
            $tugas = Tugas::find($id);
        }else{
            $tugas = null;
        }
         return view('dashboardAdmin.tugas.create',compact('tugas'));
    }

    public function uploadTugas(Request $request){
         $request->validate([
            'deskripsi' => 'required',
            'file' => 'required | mimes:pdf,docx,ppt'
         ]);

        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
  
        if($this->uploadFile($request,$fileName,$file)){
            Tugas::create([
                'deskripsi' => $request->deskripsi,
                'file' => $fileName
            ]);
            return redirect()->route('admin.tugas.index');
        }
    }

    public function updateTugas(Request $request,$id){
          $request->validate([
            'deskripsi' => 'required',
            'file' => 'sometimes|mimes:pdf,docx,ppt,jpg,jpeg,png'
         ]);
         $tugas = Tugas::findOrFail($id);
         if(isset($request->file)){
           
             $file = $request->file;
             $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
             
            if($this->updateFile($request,$fileName,$tugas)){
                // dd($request->file);
                $tugas->deskripsi = $request->deskripsi;
                $tugas->file = $fileName;
                $tugas->save();
                return redirect()->route('admin.tugas.index');
            }
         }else{
                $tugas->deskripsi = $request->deskripsi;
                $tugas->save();
                return redirect()->route('admin.tugas.index');
            }
    }


    public function deleteTugas($id){
        $tugas = Tugas::findOrFail($id);
        if(Storage::disk('public/tugas')->delete($tugas->file)){
            Tugas::find($id)->delete();
            return redirect()->route('admin.tugas.index');
        };
                
    }

    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/tugas')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }

       public function updateFile(Request $request,$fileName, Tugas $tugas){
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
