<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class materiController extends Controller
{
    public function index(){
        return view('dashboardUser.eLearning.materi.index', [
            'materis' => Materi::all()
        ]);
    }

    public function downloadAllFile()
    {
    $files = Materi::select('file')->get()->toArray();

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
