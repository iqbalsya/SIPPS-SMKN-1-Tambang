<?php

use App\Models\Pelanggaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BukuPelanggaranController;
use App\Http\Controllers\TipePelanggaranController;
use App\Http\Controllers\SanksiPelanggaranController;
use App\Http\Controllers\LaporKeterlambatanController;

Route::resource('guru', GuruController::class);

Route::resource('jurusan', JurusanController::class);

Route::resource('pelanggaran', PelanggaranController::class);

Route::resource('tipe-pelanggaran', TipePelanggaranController::class);

Route::resource('sanksi-pelanggaran', SanksiPelanggaranController::class);

Route::get('/get-siswa/{kelasId}', [BukuPelanggaranController::class, 'getSiswa']);

Route::get('/get-pelanggaran/{tipePelanggaranId}', [BukuPelanggaranController::class, 'getPelanggaran']);

Route::resource('buku-pelanggaran', BukuPelanggaranController::class);

Route::get('/buku-pelanggaran/create/{siswa_id?}', [BukuPelanggaranController::class, 'create'])->name('buku-pelanggaran.create');


Route::get('/lapor-keterlambatan', [LaporKeterlambatanController::class, 'index'])->name('lapor-keterlambatan.index');

Route::get('lapor-keterlambatan/create', [LaporKeterlambatanController::class, 'create'])->name('lapor-keterlambatan.create');

Route::post('lapor-keterlambatan', [LaporKeterlambatanController::class, 'store'])->name('lapor-keterlambatan.store');

Route::get('lapor-keterlambatan/create/{id}', [LaporKeterlambatanController::class, 'cetakSurat'])->name('lapor-keterlambatan.cetak');

Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/api/pelanggaran-bulanan', [DashboardController::class, 'getPelanggaranBulanan'])->middleware('auth');

Route::get('/api/pelanggaran-terlambat', [DashboardController::class, 'getPelanggaranTerlambat'])->middleware('auth');

Route::get('/api/pelanggaran-alpa', [DashboardController::class, 'getPelanggaranAlpa'])->middleware('auth');

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');


Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');

Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');

Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');

Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');

Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');

Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');

Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');

Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');

Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');

	// Route::get('tables', function () {
	// 	return view('pages.tables');
	// })->name('tables');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');

	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');

	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');

	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});


