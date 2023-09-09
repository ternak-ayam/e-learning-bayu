<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fasilitas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

use function PHPUnit\Framework\isEmpty;

class materiController extends Controller
{
    public function index(){
        return view('dashboardUser.eLearning.materi.index', [
            'materis' => Materi::where('deskripsi', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get(),
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

        $materis = $filter->get();
        return view('dashboardUser.eLearning.materi.index' , [
            'materis' => $materis,
            'categorys' => Category::all(),
            'fasilitass' => Fasilitas::all()
        ]);

    }

    public function downloadAllFile()
    {
        $files = Materi::select('file')->get()->toArray();

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
}
