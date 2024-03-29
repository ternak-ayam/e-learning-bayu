<?php

use App\Http\Controllers\Admin\absensiController;
use App\Http\Controllers\User\materiController;
use GuzzleHttp\Middleware;
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
    return redirect()->route('user.login');
});

// login register
// Route::get('/login', function () {
//     return view('auth.login');
// });
// Route::get('/register', function () {
//     return view('auth.register');
// });

// dashboard user
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->middleware('auth');


Route::get('/login', [App\Http\Controllers\Auth\loginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [App\Http\Controllers\Auth\loginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\loginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'showLoginForm']);
Route::post('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'login'])->name('admin.login');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::prefix('biodata')->group(function () {
        Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.biodata.index');
        Route::get('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'editBiodata'])->name('edit.biodata');
        Route::put('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'updateBiodata'])->name('update.biodata');
        Route::get('/edit-password/{id}', [App\Http\Controllers\User\ProfileController::class, 'editPassword'])->name('user.edit.password');
        Route::post('/edit-password/{user}', [App\Http\Controllers\User\ProfileController::class, 'updatePassword'])->name('user.update.password');
    });
    Route::prefix('daftar-ojt')->group(function () {
        Route::get('/', [App\Http\Controllers\User\OjtController::class , 'index'])->name('user.ojt.index');
    });
});

Route::prefix('dokumen')->middleware('auth')->group(function () {
    Route::prefix('pengumpulan-laporan')->group(function () {
        Route::get('/', [App\Http\Controllers\User\LaporanController::class , 'index'])->name('user.laporan.index');
        Route::post('/upload-laporan', [App\Http\Controllers\User\LaporanController::class , 'uploadLaporan'])->name('user.laporan.upload');
        Route::put('/update-laporan/{id}', [App\Http\Controllers\User\LaporanController::class , 'updateLaporan'])->name('user.laporan.update');
    });
    Route::prefix('pencarian-laporan')->group(function () {
        Route::get('/', [App\Http\Controllers\User\LaporanController::class , 'daftarLaporan'])->name('user.daftar.laporan');
    });
});


Route::prefix('elearning')->middleware('auth')->group(function () {
    Route::prefix('materi')->group(function () {
        Route::get('/', [materiController::class, 'index'] );
        Route::get('/download/all/file', [materiController::class, 'downloadAllFile'])->name('download.all.file');
    });
    Route::prefix('tugas')->group(function () {
        Route::get('/', [App\Http\Controllers\User\TugasController::class, 'index'])->name('user.tugas');
        Route::get('/detail-tugas/{id}', [App\Http\Controllers\User\TugasController::class, 'viewDetailTugas'])->name('user.tugas.detail');
        Route::post('/upload-tugas/{id}', [App\Http\Controllers\User\TugasController::class, 'tugasUpload'])->name('user.tugas.upload');
        Route::put('/update-tugas/{id}', [App\Http\Controllers\User\TugasController::class, 'tugasUpdate'])->name('user.tugas.update');

    });
    Route::prefix('absensi')->group(function () {
        Route::get('/', [App\Http\Controllers\User\AbsensiController::class, 'index'])->name('user.elearning.absensi');
        Route::get('/add', [App\Http\Controllers\User\AbsensiController::class, 'addAbsensi'])->name('user.elearning.absensi.add');
        Route::get('/cetak-pdf', [App\Http\Controllers\User\AbsensiController::class, 'cetakAbsensi'])->name('user.elearning.absensi.cetak');
        Route::get('/nama-quiz', function () {
            return view('dashboardUser.eLearning.absensi.detailQuiz');
        });
    });
});


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\loginController::class, 'logout'])->name('logout.admin');
    Route::prefix('dashboard-admin')->group(function () {
        // Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    });
    Route::prefix('absensi')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\absensiController::class, 'index'])->name('admin.absensi.index');
        Route::get('/detail/{user}', [\App\Http\Controllers\Admin\absensiController::class, 'detailAbsensi'])->name('admin.absensi.detail');

        Route::get('/daftar-absensi/2', function () {
            return view('dashboardAdmin.absensi.daftarAbsensi');
        });
    });

    route::get('daftar/laporan', [App\Http\Controllers\Admin\DashboardController::class, 'laporanUser'])->name('admin.daftar.laporan');

    Route::prefix('materi')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\materiController::class , 'index'])->name('admin.materi.index');
        Route::get('/upload-materi/{id?}', [\App\Http\Controllers\Admin\materiController::class , 'addMateri'])->name('admin.view.add.materi');
        Route::post('/upload-materi', [\App\Http\Controllers\Admin\materiController::class , 'storeMateri'])->name('admin.store.materi');
        Route::put('/update-materi/{id}', [App\Http\Controllers\Admin\materiController::class, 'updateMateri'])->name('admin.update.materi');
        Route::get('/delete-materi/{id}', [App\Http\Controllers\Admin\materiController::class, 'deleteMateri'])->name('admin.delete.materi');
    });
    Route::prefix('tugas')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\TugasController::class, 'index'])->name('admin.tugas.index');
        Route::get('/upload-tugas/{id?}', [App\Http\Controllers\Admin\TugasController::class, 'viewAddTugas'])->name('admin.view.add.tugas');
        Route::post('/upload-tugas', [App\Http\Controllers\Admin\TugasController::class, 'uploadTugas'])->name('admin.upload.tugas');
        Route::put('/update-tugas/{id}', [App\Http\Controllers\Admin\TugasController::class, 'updateTugas'])->name('admin.update.tugas');
        Route::get('/delete-tugas/{id}', [App\Http\Controllers\Admin\TugasController::class, 'deleteTugas'])->name('admin.delete.tugas');
        Route::get('/detail-tugas/{id}', [App\Http\Controllers\Admin\TugasController::class, 'detailTugasUser'])->name('admin.detail.tugas');

    });

    Route::prefix('user')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/addUser/{id?}', [App\Http\Controllers\Admin\UserController::class, 'viewAddUser'])->name('admin.view.add.user');
        Route::post('/addUser', [App\Http\Controllers\Admin\UserController::class, 'addUser'])->name('admin.add.user');
        Route::put('/updateUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'updateUser'])->name('admin.update.user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteUser'])->name('admin.delete.user');
    });

});
