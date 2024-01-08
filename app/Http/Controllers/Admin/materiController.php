<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class materiController extends Controller
{
    public function index(){
        return view('dashboardAdmin.materi.index' , [
            'materis' => Materi::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10),
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
        ]);
    }


    public function filterMateri(Request $request){
        $category = $request->input('category');
        $fasilitas = $request->input('fasilitas');
        $filter = Materi::query();
        if($category){
            $filter->where('category_id', '=',$category);
        }
        if($fasilitas){
            $filter->where('fasilitas_id', '=',$fasilitas);
        }

        $materis = $filter->paginate(10);
        return view('dashboardAdmin.materi.index' , [
            'materis' => $materis,
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
        ]);

    }
    public function addMateri($id = null){
        $categorys = Category::all();
        $fasilitass = Fasilitas::all();
        if($id != null){
            $materi = Materi::find($id);
        }else{
            $materi = null;
        }
        return view('dashboardAdmin.materi.create', compact('materi','categorys','fasilitass'));
    }

    public function storeMateri(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'author' => 'required',
            'fasilitas' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|mimes:pdf,docx,ppt,jpg,jpeg,png',
        ]);
        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
  
        if($this->uploadFile($request,$fileName,$file)){
            Materi::create([
                'author' => $request->author,
                'category_id' => $request->category,
                'fasilitas_id' => $request->fasilitas,
                'deskripsi' => $request->deskripsi,
                'file' => $fileName
            ]);
            return redirect()->route('admin.materi.index');
        }
    }

    public function updateMateri(Request $request,$id){
         $this->validate($request, [
            'author' => 'required',
            'fasilitas' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'file' => 'sometimes|mimes:pdf,docx,ppt,jpeg,jpg,png',
         ]);

        $materi = Materi::findOrFail($id);
         if(isset($request->file)){
             $file = $request->file;
             $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
             
            if($this->updateFile($request,$fileName,$materi)){
                // dd($request->file);
                $materi->author = $request->author;
                $materi->category_id = $request->category;
                $materi->fasilitas_id= $request->fasilitas;
                $materi->deskripsi = $request->deskripsi;
                $materi->file = $fileName;
                $materi->save();
                return redirect()->route('admin.materi.index');
            }
         }else{
                $materi->author = $request->author;
                $materi->category_id = $request->category;
                $materi->fasilitas_id= $request->fasilitas;
                $materi->deskripsi = $request->deskripsi;
                $materi->save();
                return redirect()->route('admin.materi.index');
            }
    }

    public function deleteMateri($id){
        $materi = Materi::findOrFail($id);
        if(Storage::disk('public/materi')->delete($materi->file)){
            Materi::find($id)->delete();
            return redirect()->route('admin.materi.index');
        };
                
    }

    public function uploadFile(Request $request,$fileName,$file){
        if(Storage::disk('public/materi')->put($fileName, file_get_contents($file))){
            return true;
        }else{
            return false;
        };
    }
     public function updateFile(Request $request,$fileName, Materi $materi){
       $oldFile = Storage::disk('public/materi')->exists($materi->file)
        ? Storage::disk('public/materi')->get($materi->file)
        : null;

        if ($request->hasFile('file')) {
            // Store the new file
            if (Storage::disk('public/materi')->put($fileName, file_get_contents($request->file))) {
                // Delete the old file if it exists
                if ($oldFile !== null) {
                    Storage::disk('public/materi')->delete($materi->file);
                }
                return true;
            }
        }
        return false;
    }
}
