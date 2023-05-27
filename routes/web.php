<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// guest
Route::get('/', function () {
    return view('index');
});

// login register
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

// dashboard user
Route::get('/dashboard', function () {
    return view('dashboardUser.dashboard');
});

Route::prefix('profile')->group(function () {
    Route::prefix('biodata')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.profile.biodata.index');
        });
        Route::get('/edit-biodata', function () {
            return view('dashboardUser.profile.biodata.editBiodata');
        });
        Route::get('/edit-password', function () {
            return view('dashboardUser.profile.biodata.editPassword');
        });
    });
    Route::prefix('daftar-ojt')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.profile.daftarOJT.index');
        });
    });
});



Route::prefix('dokumen')->group(function () {
    Route::prefix('pengumpulan-laporan')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.dokumen.pengumpulanLaporan.index');
        });
        Route::get('/upload-laporan', function () {
            return view('dashboardUser.dokumen.pengumpulanLaporan.uploadLaporan');
        });
        Route::get('/edit-laporan', function () {
            return view('dashboardUser.dokumen.pengumpulanLaporan.editLaporan');
        });
    });
    Route::prefix('pencarian-laporan')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.dokumen.pencarianLaporan.index');
        });
    });
});


Route::prefix('elearning')->group(function () {
    Route::prefix('materi')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.eLearning.materi.index');
        });
        Route::get('/upload-laporan', function () {
            return view('dashboardUser.eLearning.materi.uploadLaporan');
        });
    });
    Route::prefix('tugas')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.eLearning.tugas.index');
        });
        Route::get('/nama-tugas', function () {
            return view('dashboardUser.eLearning.tugas.detailTugas');
        });
    });
    Route::prefix('absensi ')->group(function () {
        Route::get('/', function () {
            return view('dashboardUser.eLearning.absensi.index');
        });
        Route::get('/nama-quiz', function () {
            return view('dashboardUser.eLearning.absensi.detailQuiz');
        });
    });
});
