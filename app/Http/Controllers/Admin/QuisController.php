<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quis;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuisController extends Controller
{
    public function index(){
         return view('dashboardAdmin.quis.index',[
            'tugass' => Quis::all()
         ]);
    }

    public function viewAddQuis($id = null){
        if($id != null){
            $tugas = Quis::find($id);
        }else{
            $tugas = null;
        }
         return view('dashboardAdmin.quis.create',compact('tugas'));
    }

    public function uploadQuis(Request $request){
         $request->validate([
            'deskripsi' => 'required',
            'link' => 'required'
         ]);

         Quis::create([
            'deskripsi' => $request->deskripsi,
            'link' => $request->link
         ]);
        return redirect()->route('admin.quis.index');
    }

    public function updateQuis(Request $request,$id){
          $request->validate([
            'deskripsi' => 'required',
            'link' => 'required'
         ]);
         Quis::where('id', $id)->update([
            'deskripsi' => $request->deskripsi,
            'link' => $request->link
         ]);
         return redirect()->route('admin.quis.index');
        
    }


    public function deleteQuis($id){
        Quis::find($id)->delete();
        return redirect()->route('admin.quis.index');  
    }

    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/tugas')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }

       public function updateFile(Request $request,$fileName, Quis $tugas){
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
