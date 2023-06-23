<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboardAdmin.user.index',
        ['users' => User::all()]);
    }

    public function viewAddUser(){
        return view('dashboardAdmin.user.create');
    }

    public function AddUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT)
        ]);

        return redirect()->route('admin.user.index');
    }
}
