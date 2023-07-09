<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quis;
use App\Models\Tugas;
use Illuminate\Http\Request;

class QuisController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.quis.index',[
            'quiss' => Quis::all()
         ]);
    }
}
