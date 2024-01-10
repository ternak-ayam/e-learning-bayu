<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ojt;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class registerController extends Controller
{
    public function index(){
        return view('Auth.register');
    }


    public function register(Request $request){
         $request->validate([
            'name' => 'required',
            'email' => ['required' , Rule::unique('users', 'email')],
            'password' => 'required',
            'sekolah' => 'required',
            'pembimbing' => 'required',
            'mulai_ojt' => 'required',
            'akhir_ojt' => 'required',
            'file' => 'required'
        ]);
        $file = $request->file;
        $fileName = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT)
        ]);
        
       
        if($data){
              if($this->uploadFile($request,$fileName,$file)){
                 Ojt::create([
                    'user_id' => $data->id,
                    'sekolah' => $request->sekolah,
                    'pembimbing' => $request->pembimbing,
                    'mulai_ojt' => $request->mulai_ojt,
                    'akhir_ojt' => $request->akhir_ojt,
                    'surat_ojt' => $fileName,
                    'status' => false
                ]);
                return redirect()->route('login');
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


