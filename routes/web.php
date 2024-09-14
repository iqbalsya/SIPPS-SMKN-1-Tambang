<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BukuPelanggaranController;
use App\Http\Controllers\BukuPelanggaranKelasController;
use App\Http\Controllers\TipePelanggaranController;
use App\Http\Controllers\SanksiPelanggaranController;
use App\Http\Controllers\LaporKeterlambatanController;
use App\Http\Controllers\LaporanPelanggaranController;
use App\Http\Controllers\LaporPelanggaranController;
use App\Http\Controllers\UserController;

// Route untuk halaman utama dan otentikasi
Route::get('/', function () {
    return redirect('sign-in');
})->middleware('guest');

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

// Route untuk profil pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/user-profile', [ProfileController::class, 'index'])->name('user-profile')->middleware('permission:mengakses halaman profile user');
    Route::post('/user-profile', [ProfileController::class, 'update'])->name('user-profile.update')->middleware('permission:mengakses halaman profile user');
});

// Route untuk Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/api/pelanggaran-bulanan', [DashboardController::class, 'getPelanggaranBulanan']);
    Route::get('/api/pelanggaran-terlambat', [DashboardController::class, 'getPelanggaranTerlambat']);
    Route::get('/api/pelanggaran-alpa', [DashboardController::class, 'getPelanggaranAlpa']);
    Route::get('/api/jumlah-siswa-per-jurusan', [DashboardController::class, 'getJumlahSiswaPerJurusan']);
});

// Route untuk User Management dengan role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users/import', [UserController::class, 'import'])->name('users.import');
    Route::get('/users/download-template', [UserController::class, 'downloadTemplate'])->name('users.downloadTemplate');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/siswa/profile', [SiswaController::class, 'profile'])->name('siswa.profile');
    Route::get('/siswa/profile/edit', [SiswaController::class, 'profileEdit'])->name('siswa.profileedit');
    Route::put('/siswa/edit', [SiswaController::class, 'profileUpdate'])->name('siswa.profileupdate');

    Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
    Route::get('/guru/profile/edit', [GuruController::class, 'profileEdit'])->name('guru.profileedit');
    Route::put('/guru/edit', [GuruController::class, 'profileUpdate'])->name('guru.profileupdate');
});

// Route untuk Siswa dengan permission mengelola siswa dan mengakses halaman siswa
Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index')->middleware('permission:mengakses halaman siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create')->middleware('permission:mengelola siswa');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store')->middleware('permission:mengelola siswa');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show')->middleware('permission:mengakses halaman siswa');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit')->middleware('permission:mengelola siswa');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update')->middleware('permission:mengelola siswa');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy')->middleware('permission:mengelola siswa');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import')->middleware('permission:mengelola siswa');
    Route::get('/siswa/template/download', [SiswaController::class, 'downloadTemplate'])->name('siswa.downloadTemplate')->middleware('permission:mengelola siswa');
});

// Route untuk Kelas dengan permission mengelola kelas dan mengakses halaman kelas
Route::middleware(['auth'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index')->middleware('permission:mengakses halaman kelas');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create')->middleware('permission:mengelola kelas');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store')->middleware('permission:mengelola kelas');
    Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show')->middleware('permission:mengakses halaman kelas');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit')->middleware('permission:mengelola kelas');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update')->middleware('permission:mengelola kelas');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy')->middleware('permission:mengelola kelas');
    Route::post('/kelas/{id}/upgrade', [KelasController::class, 'upgrade'])->name('kelas.upgrade')->middleware('permission:mengelola kelas');
});

// Route untuk Guru dengan permission mengelola guru dan mengakses halaman guru
Route::middleware(['auth'])->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index')->middleware('permission:mengakses halaman guru');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create')->middleware('permission:mengelola guru');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store')->middleware('permission:mengelola guru');
    Route::get('/guru/{guru}', [GuruController::class, 'show'])->name('guru.show')->middleware('permission:mengakses halaman guru');
    Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit')->middleware('permission:mengelola guru');
    Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('guru.update')->middleware('permission:mengelola guru');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy')->middleware('permission:mengelola guru');
});

// Route untuk Jurusan dengan permission mengelola jurusan dan mengakses halaman jurusan
Route::middleware(['auth'])->group(function () {
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index')->middleware('permission:mengakses halaman jurusan');
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create')->middleware('permission:mengelola jurusan');
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store')->middleware('permission:mengelola jurusan');
    Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show')->middleware('permission:mengakses halaman jurusan');
    Route::get('/jurusan/{jurusan}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit')->middleware('permission:mengelola jurusan');
    Route::put('/jurusan/{jurusan}', [JurusanController::class, 'update'])->name('jurusan.update')->middleware('permission:mengelola jurusan');
    Route::delete('/jurusan/{jurusan}', [JurusanController::class, 'destroy'])->name('jurusan.destroy')->middleware('permission:mengelola jurusan');
});

// Route untuk Pelanggaran dengan permission mengelola pelanggaran dan mengakses halaman pelanggaran
Route::middleware(['auth'])->group(function () {
    Route::get('/pelanggaran', [PelanggaranController::class, 'index'])
        ->name('pelanggaran.index')
        ->middleware('permission:mengakses halaman pelanggaran');
    Route::get('/pelanggaran/create', [PelanggaranController::class, 'create'])
        ->name('pelanggaran.create')
        ->middleware('permission:mengelola pelanggaran');
    Route::post('/pelanggaran', [PelanggaranController::class, 'store'])
        ->name('pelanggaran.store')
        ->middleware('permission:mengelola pelanggaran');
    Route::get('/pelanggaran/{pelanggaran}', [PelanggaranController::class, 'show'])
        ->name('pelanggaran.show')
        ->middleware('permission:mengakses halaman pelanggaran');
    Route::get('/pelanggaran/{pelanggaran}/edit', [PelanggaranController::class, 'edit'])
        ->name('pelanggaran.edit')
        ->middleware('permission:mengelola pelanggaran');
    Route::put('/pelanggaran/{pelanggaran}', [PelanggaranController::class, 'update'])
        ->name('pelanggaran.update')
        ->middleware('permission:mengelola pelanggaran');
    Route::delete('/pelanggaran/{pelanggaran}', [PelanggaranController::class, 'destroy'])
        ->name('pelanggaran.destroy')
        ->middleware('permission:mengelola pelanggaran');
});

// Route untuk Tipe Pelanggaran dengan permission mengelola tipe pelanggaran dan mengakses halaman tipe pelanggaran
Route::middleware(['auth'])->group(function () {
    Route::get('/tipe-pelanggaran', [TipePelanggaranController::class, 'index'])->name('tipe-pelanggaran.index')->middleware('permission:mengakses halaman tipe pelanggaran');
    Route::get('/tipe-pelanggaran/create', [TipePelanggaranController::class, 'create'])->name('tipe-pelanggaran.create')->middleware('permission:mengelola tipe pelanggaran');
    Route::post('/tipe-pelanggaran', [TipePelanggaranController::class, 'store'])->name('tipe-pelanggaran.store')->middleware('permission:mengelola tipe pelanggaran');
    Route::get('/tipe-pelanggaran/{tipePelanggaran}', [TipePelanggaranController::class, 'show'])->name('tipe-pelanggaran.show')->middleware('permission:mengakses halaman tipe pelanggaran');
    Route::get('/tipe-pelanggaran/{tipePelanggaran}/edit', [TipePelanggaranController::class, 'edit'])->name('tipe-pelanggaran.edit')->middleware('permission:mengelola tipe pelanggaran');
    Route::put('/tipe-pelanggaran/{tipePelanggaran}', [TipePelanggaranController::class, 'update'])->middleware('permission:mengelola tipe pelanggaran');
    Route::delete('/tipe-pelanggaran/{tipePelanggaran}', [TipePelanggaranController::class, 'destroy'])->name('tipe-pelanggaran.destroy')->middleware('permission:mengelola tipe pelanggaran');
});

// Route untuk Sanksi Pelanggaran dengan permission mengelola sanksi pelanggaran dan mengakses halaman sanksi pelanggaran
Route::middleware(['auth'])->group(function () {
    Route::get('/sanksi-pelanggaran', [SanksiPelanggaranController::class, 'index'])->name('sanksi-pelanggaran.index')->middleware('permission:mengakses halaman sanksi pelanggaran');
    Route::get('/sanksi-pelanggaran/create', [SanksiPelanggaranController::class, 'create'])->name('sanksi-pelanggaran.create')->middleware('permission:mengelola sanksi pelanggaran');
    Route::post('/sanksi-pelanggaran', [SanksiPelanggaranController::class, 'store'])->name('sanksi-pelanggaran.store')->middleware('permission:mengelola sanksi pelanggaran');
    Route::get('/sanksi-pelanggaran/{sanksiPelanggaran}', [SanksiPelanggaranController::class, 'show'])->name('sanksi-pelanggaran.show')->middleware('permission:mengakses halaman sanksi pelanggaran');
    Route::get('/sanksi-pelanggaran/{sanksiPelanggaran}/edit', [SanksiPelanggaranController::class, 'edit'])->name('sanksi-pelanggaran.edit')->middleware('permission:mengelola sanksi pelanggaran');
    Route::put('/sanksi-pelanggaran/{sanksiPelanggaran}', [SanksiPelanggaranController::class, 'update'])->middleware('permission:mengelola sanksi pelanggaran');
    Route::delete('/sanksi-pelanggaran/{sanksiPelanggaran}', [SanksiPelanggaranController::class, 'destroy'])->name('sanksi-pelanggaran.destroy')->middleware('permission:mengelola sanksi pelanggaran');
});

// Route untuk Buku Pelanggaran dengan permission mengelola buku pelanggaran dan mengakses halaman buku pelanggaran
Route::middleware(['auth'])->group(function () {
    Route::get('/buku-pelanggaran', [BukuPelanggaranController::class, 'index'])->name('buku-pelanggaran.index')->middleware('permission:mengakses halaman buku pelanggaran');
    Route::get('/buku-pelanggaran/create', [BukuPelanggaranController::class, 'create'])->name('buku-pelanggaran.create')->middleware('permission:mengelola buku pelanggaran',);
    Route::get('buku-pelanggaran/create/{siswa_id?}', [BukuPelanggaranController::class, 'create'])->name('buku-pelanggaran.create')->middleware('permission:mengelola buku pelanggaran');
    Route::get('/get-guru/{kelasId}', [BukuPelanggaranController::class, 'getGuru'])->middleware('permission:mengelola buku pelanggaran');
    Route::post('/buku-pelanggaran', [BukuPelanggaranController::class, 'store'])->name('buku-pelanggaran.store')->middleware(['permission:mengelola buku pelanggaran', 'check.guru.kelas']);
    Route::get('/buku-pelanggaran/{bukuPelanggaran}', [BukuPelanggaranController::class, 'show'])->name('buku-pelanggaran.show')->middleware('permission:mengakses halaman buku pelanggaran');
    Route::get('/buku-pelanggaran/{bukuPelanggaran}/edit', [BukuPelanggaranController::class, 'edit'])->name('buku-pelanggaran.edit')->middleware('permission:mengelola buku pelanggaran');
    Route::put('/buku-pelanggaran/{bukuPelanggaran}', [BukuPelanggaranController::class, 'update'])->name('buku-pelanggaran.update')->middleware('permission:mengelola buku pelanggaran');
    Route::delete('/buku-pelanggaran/{bukuPelanggaran}', [BukuPelanggaranController::class, 'destroy'])->name('buku-pelanggaran.destroy')->middleware('permission:mengelola buku pelanggaran');
    Route::get('/buku-pelanggaran/{id}', [LaporKeterlambatanController::class, 'show'])->name('buku-pelanggaran.show')->middleware('permission:mengakses halaman buku pelanggaran');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/laporan-pelanggaran-kelas', [LaporanPelanggaranController::class, 'index'])->name('laporan-pelanggaran.index');
    Route::get('/validate/{id}', [LaporanPelanggaranController::class, 'validateReport'])->name('laporan-pelanggaran.validate');
    Route::get('/reject/{id}', [LaporanPelanggaranController::class, 'rejectReport'])->name('laporan-pelanggaran.reject');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/lapor-pelanggaran', [LaporPelanggaranController::class, 'index'])->name('lapor-pelanggaran.index');
    Route::get('/lapor-pelanggaran/create', [LaporPelanggaranController::class, 'create'])->name('lapor-pelanggaran.create');
    Route::post('/lapor-pelanggaran', [LaporPelanggaranController::class, 'store'])->name('lapor-pelanggaran.store');
    Route::get('/lapor-pelanggaran/{id}', [LaporPelanggaranController::class, 'show'])->name('lapor-pelanggaran.show');
    Route::get('lapor-pelanggaran/{id}/edit', [LaporPelanggaranController::class, 'edit'])->name('lapor-pelanggaran.edit');
    Route::put('lapor-pelanggaran/{id}', [LaporPelanggaranController::class, 'update'])->name('lapor-pelanggaran.update');
    Route::delete('lapor-pelanggaran/{id}', [LaporPelanggaranController::class, 'destroy'])->name('lapor-pelanggaran.destroy');
    
});


Route::middleware(['auth'])->group(function () {
    Route::get('/buku-pelanggaran-kelas', [BukuPelanggaranKelasController::class, 'index'])
        ->name('buku-pelanggaran-kelas.index')
        ->middleware('permission:mengakses halaman buku pelanggaran kelas');
    Route::get('/buku-pelanggaran-kelas/create', [BukuPelanggaranKelasController::class, 'create'])
        ->name('buku-pelanggaran-kelas.create')
        ->middleware('permission:mengelola buku pelanggaran kelas');
    Route::post('/buku-pelanggaran-kelas', [BukuPelanggaranKelasController::class, 'store'])
        ->name('buku-pelanggaran-kelas.store')
        ->middleware(['permission:mengelola buku pelanggaran kelas', 'check.guru.kelas']);
    Route::get('/buku-pelanggaran-kelas/{bukuPelanggaranKelas}', [BukuPelanggaranKelasController::class, 'show'])
        ->name('buku-pelanggaran-kelas.show')
        ->middleware('permission:mengakses halaman buku pelanggaran kelas');
    Route::get('/buku-pelanggaran-kelas/{bukuPelanggaranKelas}/edit',[BukuPelanggaranKelasController::class, 'edit'])
        ->name('buku-pelanggaran-kelas.edit')
        ->middleware('permission:mengelola buku pelanggaran kelas');
    Route::put('/buku-pelanggaran-kelas/{bukuPelanggaranKelas}', [BukuPelanggaranKelasController::class, 'update'])
        ->name('buku-pelanggaran-kelas.update')
        ->middleware('permission:mengelola buku pelanggaran kelas');
    Route::delete('/buku-pelanggaran-kelas/{bukuPelanggaranKelas}', [BukuPelanggaranKelasController::class, 'destroy'])
        ->name('buku-pelanggaran-kelas.destroy')
        ->middleware('permission:mengelola buku pelanggaran kelas');
});


// Route untuk Lapor Keterlambatan dengan permission
Route::middleware(['auth'])->group(function () {
    Route::get('/lapor-keterlambatan', [LaporKeterlambatanController::class, 'index'])->name('lapor-keterlambatan.index')->middleware('permission:mengakses halaman lapor keterlambatan');
    Route::get('lapor-keterlambatan/create', [LaporKeterlambatanController::class, 'create'])->name('lapor-keterlambatan.create')->middleware('permission:melaporkan keterlambatan');
    Route::post('lapor-keterlambatan', [LaporKeterlambatanController::class, 'store'])->name('lapor-keterlambatan.store')->middleware('permission:melaporkan keterlambatan');
    Route::get('lapor-keterlambatan/create/{id}', [LaporKeterlambatanController::class, 'cetakSurat'])->name('lapor-keterlambatan.cetak')->middleware('permission:melaporkan keterlambatan');
    Route::get('/lapor-keterlambatan/{id}', [LaporKeterlambatanController::class, 'show'])->name('lapor-keterlambatan.show')->middleware('permission:melaporkan keterlambatan');
});

// API routes yang tidak memerlukan otentikasi
Route::get('/get-siswa/{kelasId}', [BukuPelanggaranController::class, 'getSiswa']);
Route::get('/get-pelanggaran/{tipePelanggaranId}', [BukuPelanggaranController::class, 'getPelanggaran']);
Route::get('/get-guru/{kelasId}', [BukuPelanggaranController::class, 'getGuru']);

Route::get('/get-siswa/{kelasId}', [BukuPelanggaranKelasController::class, 'getSiswa']);
Route::get('/get-pelanggaran/{tipePelanggaranId}', [BukuPelanggaranKelasController::class, 'getPelanggaran']);
Route::get('/get-guru/{kelasId}', [BukuPelanggaranKelasController::class, 'getGuru']);

