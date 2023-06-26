<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ojt;
use App\Models\User;
use Illuminate\Http\Request;

class OjtController extends Controller
{
    public function index(){
         return view('dashboardUser.profile.daftarOJT.index',[
            'users' => User::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get(),
            'ojt' => Ojt::first(),
        ]);
    }
}
