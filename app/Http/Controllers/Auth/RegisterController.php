<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Ojt;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
            'akhir_ojt' => 'required'
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT)
        ]);
        
        if($data){
            Ojt::create([
                'user_id' => $data->id,
                'sekolah' => $request->sekolah,
                'pembimbing' => $request->pembimbing,
                'mulai_ojt' => $request->mulai_ojt,
                'akhir_ojt' => $request->akhir_ojt
            ]);
            return redirect()->route('login');
        }
    }
}
