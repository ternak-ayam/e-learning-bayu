<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index(){
         return view('dashboardUser.eLearning.tugas.index',[
            'tugass' => Tugas::all()
         ]);
    }
}
