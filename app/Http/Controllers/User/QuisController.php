<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BuktiQuis;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Quis;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuisController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.quis.index',[
            'quiss' => Quis::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10),
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
        return view('dashboardUser.eLearning.quis.index' , [
            'quiss' => $quiss,
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
        ]);
    }

    public function uploadBuktiQuis(Request $request,$id){
        $bukti = BuktiQuis::where('quis_id', $id)->where('user_id', auth()->user()->id)->first();
        $quis = Quis::where('id',$request->id)->first();
        return view('dashboardUser.eLearning.quis.add-bukti', compact('quis', 'bukti'));
    }

    public function SaveBuktiQuis(Request $request){
        $buktiquis = BuktiQuis::where('quis_id', $request->id_quis)->where('user_id', auth()->user()->id)->first();
        $file = $request->file;
        $fileName = time() . '_' . \Illuminate\Support\Str::uuid() . '.' . $file->getClientOriginalExtension();
        if($buktiquis){
            Storage::disk('public/materi')->delete($fileName);
            if($this->uploadFile($request,$fileName,$file)){
                BuktiQuis::where('quis_id', $request->id_quis)->where('user_id', auth()->user()->id)->update([
                    'bukti' =>  $fileName
                ]);
                return redirect()->route('user.quis');
            }
        }else{
            if($this->uploadFile($request,$fileName,$file)){
                BuktiQuis::create([
                    'user_id' => auth()->user()->id,
                    'quis_id' => $request->id_quis,
                    'bukti' => $fileName
                ]);
                return redirect()->route('user.quis');
            }
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
