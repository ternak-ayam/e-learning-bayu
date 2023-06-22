<?php

use App\Http\Controllers\Admin\absensiController;
use App\Http\Controllers\User\materiController;
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
    return view('auth.login');
});

// login register
// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/register', function () {
    return view('auth.register');
});

// dashboard user
Route::get('/dashboard', function () {
    return view('dashboardUser.dashboard');
})->middleware('auth');

Route::get('/login', [App\Http\Controllers\Auth\loginController::class, 'showLoginForm']);
Route::post('/login', [App\Http\Controllers\Auth\loginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\loginController::class, 'logout'])->name('logout');

Route::get('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'showLoginForm']);
Route::post('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'login'])->name('admin.login');



Route::prefix('profile')->group(function () {
    Route::prefix('biodata')->group(function () {
        Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.biodata.index');
       
        Route::get('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'editBiodata'])->name('edit.biodata');
        Route::put('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'updateBiodata'])->name('update.biodata');
        Route::get('/edit-password', function () {
            return view('dashboardUser.profile.biodata.editPassword');
        });
        Route::post('/edit-password/{user}', [App\Http\Controllers\User\ProfileController::class, 'updatePassword'])->name('user.update.password');
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
        Route::get('/', [materiController::class, 'index'] );
        Route::get('/download/all/file', [materiController::class, 'downloadAllFile'])->name('download.all.file');
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

Route::get('admin/dashboard', function () {
            return view('dashboardAdmin.dashboard.index');
        });



Route::prefix('admin')->group(function () {
    Route::prefix('dashboard-admin')->group(function () {
        Route::get('/', function () {
            return view('dashboardAdmin.dashboard.index');
        });
    });
    Route::prefix('absensi')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\absensiController::class, 'index'])->name('absensi.index');
        

        Route::post('/pertemuan', [\App\Http\Controllers\Admin\absensiController::class, 'addPertemuan'])->name('add.pertemuan');

        Route::get('/tambah-absensi', function () {
            return view('dashboardAdmin.absensi.create');
        });
        Route::get('/daftar-absensi/2', function () {
            return view('dashboardAdmin.absensi.daftarAbsensi');
        });
    });
    Route::prefix('materi')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\materiController::class , 'index'])->name('materi.index');
        Route::get('/upload-materi', [\App\Http\Controllers\Admin\materiController::class , 'addMateri']);
        Route::post('/upload-materi', [\App\Http\Controllers\Admin\materiController::class , 'storeMateri'])->name('store.materi');
    });
    Route::prefix('tugas')->group(function () {
        Route::get('/', function () {
            return view('dashboardAdmin.tugas.index');
        });
        Route::get('/upload-tugas', function () {
            return view('dashboardAdmin.tugas.create');
        });
    });
});
