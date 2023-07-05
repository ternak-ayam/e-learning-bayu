<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('dashboardAdmin.dashboard.index',[
            'mahasiswas' => User::all()
         ]);
    }

    public function laporanUser(){
        return view('dashboardAdmin.laporan.index', [
             'laporans' => User::where('name', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->get()
        ]);
    }
}
