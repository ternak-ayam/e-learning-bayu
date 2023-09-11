<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Quis;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuisController extends Controller
{
    public function index(){
         return view('dashboardAdmin.quis.index',[
            'quiss' =>Quis::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10),
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
         ]);
    }

    public function filterQuis(Request $request){
        $category = $request->input('category');
        $fasilitas = $request->input('fasilitas');
        $filter = Quis::query();
        if($category){
            $filter->where('category_id', '=',$category);
        }
        if($fasilitas){
            $filter->where('fasilitas_id', '=',$fasilitas);
        }

        $quiss = $filter->paginate(10);
        return view('dashboardAdmin.quis.index' , [
            'quiss' => $quiss,
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
        ]);
    }

    public function viewAddQuis($id = null){
        $categorys = Category::all();
        $fasilitass = Fasilitas::all();
        if($id != null){
            $tugas = Quis::find($id);
        }else{
            $tugas = null;
        }
         return view('dashboardAdmin.quis.create',compact('tugas','categorys','fasilitass'));
    }

    public function uploadQuis(Request $request){
         $request->validate([
            'author' => 'required',
            'fasilitas' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
         ]);

         Quis::create([
            'author' => $request->author,
            'category_id' => $request->category,
            'fasilitas_id' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link
         ]);
        return redirect()->route('admin.quis.index');
    }

    public function updateQuis(Request $request,$id){
          $request->validate([
            'author' => 'required',
            'fasilitas' => 'required',
            'category' => 'required',
            'deskripsi' => 'required',
            'link' => 'required'
         ]);
         Quis::where('id', $id)->update([
            'author' => $request->author,
            'category_id' => $request->category,
            'fasilitas_id' => $request->fasilitas,
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
