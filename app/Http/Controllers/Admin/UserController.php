<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ojt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        return view('dashboardAdmin.user.index',
        ['users' => User::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get()]);
    }

    public function viewAddUser($id = null){
        $user = ($id != null) ? User::find($id) : null;
        return view('dashboardAdmin.user.create', compact('user'));
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required' , Rule::unique('users', 'email')],
            'password' => 'required',
            'sekolah' => 'required',
            'pembimbing' => 'required',
            'mulai_ojt' => 'required',
            'akhir_ojt' => 'required'
        ]);
        // dd($request->all());

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
            return redirect()->route('admin.user.index');
        }
        
    }

    public function updateUser(Request $request, $id){
         $data = $request->validate([
            'name' => 'required',
            'email' => ['required' , Rule::unique('users', 'email')->ignore($id)],
            'password' => 'required',
            'pembimbing' => 'required',
            'mulai_ojt' => 'required',
            'akhir_ojt' => 'required'
        ]);

        $user = User::findOrFail($id);
        if($user->update($data)){
            Ojt::where('user_id', $id)->update([
                'sekolah' => $request->sekolah,
                'pembimbing' => $request->pembimbing,
                'mulai_ojt' => $request->mulai_ojt,
                'akhir_ojt' => $request->akhir_ojt
            ]);
            return redirect()->route('admin.user.index');
        }

    }

    public function deleteUser($id){
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }
}
