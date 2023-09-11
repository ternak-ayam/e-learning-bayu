<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Quis;
use App\Models\Tugas;
use Illuminate\Http\Request;

class QuisController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.quis.index',[
            'quiss' => Quis::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(1),
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
}
