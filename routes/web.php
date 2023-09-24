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
Route::get('/register', function () {
    return view('auth.register');
});

// dashboard user
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->middleware('auth');


Route::get('/login', [App\Http\Controllers\Auth\loginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [App\Http\Controllers\Auth\loginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\loginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [App\Http\Controllers\Auth\registerController::class, 'index'])->name('user.register');
Route::post('/register/store', [App\Http\Controllers\Auth\registerController::class, 'register'])->name('user.register.store');


Route::get('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'showLoginForm']);
Route::post('admin/login', [App\Http\Controllers\Admin\Auth\loginController::class, 'login'])->name('admin.login');

Route::middleware('auth')->prefix('profile')->group(function () {
    Route::prefix('biodata')->group(function () {
        Route::get('/', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.biodata.index');
        Route::get('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'editBiodata'])->name('edit.biodata');
        Route::put('/edit-biodata/{id}',[App\Http\Controllers\User\ProfileController::class, 'updateBiodata'])->name('update.biodata');
        Route::get('/edit-password/{user}', [App\Http\Controllers\User\ProfileController::class, 'editPassword'])->name('user.edit.password');
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
        Route::get('/filter',[\App\Http\Controllers\User\materiController::class , 'filterMateri'])->name('user.filter.materi');
        Route::get('/download/all/file', [materiController::class, 'downloadAllFile'])->name('download.all.file');
    });
    Route::prefix('quis')->group(function () {
        Route::get('/', [App\Http\Controllers\User\QuisController::class, 'index'])->name('user.quis');
        Route::get('/filter',[\App\Http\Controllers\User\QuisController::class , 'filterQuis'])->name('user.filter.quis');
        Route::get('/nama-quis', function () {
            return view('dashboardUser.eLearning.tugas.detailTugas');
        });
    });
    Route::prefix('absensi')->group(function () {
        Route::get('/', [App\Http\Controllers\User\AbsensiController::class, 'index'])->name('user.elearning.absensi');
        Route::get('/cetak-pdf', [App\Http\Controllers\User\AbsensiController::class, 'cetakAbsensi'])->name('user.elearning.absensi.cetak');
        Route::get('/nama-quiz', function () {
            return view('dashboardUser.eLearning.absensi.detailQuiz');
        });
    });
});


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::prefix('dashboard-admin')->group(function () {
        // Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    });
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\loginController::class, 'logout'])->name('logout.admin');
    // Route::prefix('absensi')->group(function () {
    //     Route::get('/', [\App\Http\Controllers\Admin\absensiController::class, 'index'])->name('admin.absensi.index');
    //     Route::post('/add-pertemuan', [\App\Http\Controllers\Admin\absensiController::class, 'addPertemuan'])->name('admin.add.absensi');
    //     Route::put('/update-pertemuan/{id}', [\App\Http\Controllers\Admin\absensiController::class, 'updatePertemuan'])->name('admin.update.absensi');
    //     Route::get('/tambah-pertemuan/{id?}', [\App\Http\Controllers\Admin\absensiController::class, 'createPertemuan'])->name('admin.view.add.absensi');
    //     Route::get('/delete-pertemuan/{id}', [\App\Http\Controllers\Admin\absensiController::class, 'deletePertemuan'])->name('admin.delete.absensi');

    //     Route::get('/tambah-absensi/{id?}', [\App\Http\Controllers\Admin\absensiController::class, 'createAbsensi'])->name('admin.view.add.absensi.user');
    //     Route::post('/tambah-absensi', [\App\Http\Controllers\Admin\absensiController::class, 'addAbsensi'])->name('admin.store.absensi.user');
    //     Route::get('/update-absensi/{id}', [\App\Http\Controllers\Admin\absensiController::class, 'updateAbsensiView'])->name('admin.view.update.absensi.user');
    //     Route::put('/update-absensi/{id}', [\App\Http\Controllers\Admin\absensiController::class, 'updateAbsensi'])->name('admin.update.absensi.user');

    //     Route::get('/daftar-absensi/2', function () {
    //         return view('dashboardAdmin.absensi.daftarAbsensi');
    //     });
    // });

    route::get('daftar/laporan', [App\Http\Controllers\Admin\DashboardController::class, 'laporanUser'])->name('admin.daftar.laporan');

    Route::prefix('materi')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\materiController::class , 'index'])->name('admin.materi.index');
        Route::get('/filter',[\App\Http\Controllers\Admin\materiController::class , 'filterMateri'])->name('admin.filter.materi');
        Route::get('/upload-materi/{id?}', [\App\Http\Controllers\Admin\materiController::class , 'addMateri'])->name('admin.view.add.materi');
        Route::post('/upload-materi', [\App\Http\Controllers\Admin\materiController::class , 'storeMateri'])->name('admin.store.materi');
        Route::put('/update-materi/{id}', [App\Http\Controllers\Admin\materiController::class, 'updateMateri'])->name('admin.update.materi');
        Route::get('/delete-materi/{id}', [App\Http\Controllers\Admin\materiController::class, 'deleteMateri'])->name('admin.delete.materi');
    });
    Route::prefix('quis')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\QuisController::class, 'index'])->name('admin.quis.index');
        Route::get('/filter',[\App\Http\Controllers\Admin\QuisController::class , 'filterQuis'])->name('admin.filter.quis');
        Route::get('/upload-quis/{id?}', [App\Http\Controllers\Admin\QuisController::class, 'viewAddQuis'])->name('admin.view.add.quis');
        Route::post('/upload-quis', [App\Http\Controllers\Admin\QuisController::class, 'uploadQuis'])->name('admin.upload.quis');
        Route::put('/update-quis/{id}', [App\Http\Controllers\Admin\QuisController::class, 'updateQuis'])->name('admin.update.quis');
        Route::get('/delete-quis/{id}', [App\Http\Controllers\Admin\QuisController::class, 'deleteQuis'])->name('admin.delete.quis');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/addUser/{id?}', [App\Http\Controllers\Admin\UserController::class, 'viewAddUser'])->name('admin.view.add.user');
        // Route::post('/addUser', [App\Http\Controllers\Admin\UserController::class, 'addUser'])->name('admin.add.user');
        Route::put('/updateUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'updateUser'])->name('admin.update.user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteUser'])->name('admin.delete.user');
    });
});
