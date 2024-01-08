<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Materi;
use App\Models\MateriCheked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

use function PHPUnit\Framework\isEmpty;

class materiController extends Controller
{
    public function index(){
        $checked_materis = MateriCheked::where('user_id',auth()->user()->id)->orderBy('materi_id', 'ASC')->get()->toArray();
        $materis = Materi::orderBy('id', 'ASC')->get()->toArray();

        $a = [];
        $b = [];
        if($checked_materis) {
           $i = 0;
            foreach($checked_materis as $checked){
                $a[$i] = $checked['materi_id'];
                $i++;
            }
        }

        if($materis) {
            $k=0;
            foreach($materis as $materi){
                $b[$k] = $materi['id'];
                 $k++;
            }
           
        }

        $c = array_diff($b, $a);
        $c = array_values($c);
        array_splice($c, 0, 1);
        return view('dashboardUser.eLearning.materi.index', [
            'materis' => Materi::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'ASC')->paginate(10),
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all(),
            'disables' => $c
        ]);
    }
    public function filterMateri(Request $request){
         $checked_materis = MateriCheked::where('user_id',auth()->user()->id)->orderBy('materi_id', 'ASC')->get()->toArray();
        $materis = Materi::orderBy('id', 'ASC')->get()->toArray();

        $a = [];
        $b = [];
        if($checked_materis) {
           $i = 0;
            foreach($checked_materis as $checked){
                $a[$i] = $checked['materi_id'];
                $i++;
            }
        }

        if($materis) {
            $k=0;
            foreach($materis as $materi){
                $b[$k] = $materi['id'];
                 $k++;
            }
           
        }

        $c = array_diff($b, $a);
        $c = array_values($c);
        array_splice($c, 0, 1);
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
        return view('dashboardUser.eLearning.materi.index' , [
            'materis' => $materis,
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all(),
            'disables' => $c
        ]);

    }

    public function downloadAllFile()
    {
        $files = Materi::select('file')->get()->toArray();
        dd($files);

        if(empty($files)){
            return back();
        }

        $zipFileName = 'files.zip';
        $zipPath = storage_path($zipFileName);

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($files as $file) {
                $filePath = storage_path('public/materi/' . $file['file']);
                $fileContents = Storage::disk('public/materi')->get($file['file']);
                $zip->addFromString(basename($file['file']), $fileContents);
            }
            $zip->close();
            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            abort(500);
        }
    }

    public function readFile($id,$filename){
        MateriCheked::create([
            'materi_id' => $id,
            'user_id' => auth()->user()->id,
            'checked' => true
        ]);

        $fileUrl = asset('storage/materi/' .  $filename);

        return redirect()->away($fileUrl);
    }
}
