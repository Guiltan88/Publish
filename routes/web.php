<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MatakuliahController;

Route::get('/',function(){
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'Nim saya: '.$param1;
});

ROute::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about',function(){
    return view('halaman-about');
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::get('/matakuliah/show/{id?}', [MatakuliahController::class, 'show']);

Route::get('/home',[QuestionController::class, 'index'])->name('home.index');

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pegawai', [PegawaiController::class, 'index'])
    ->name('pegawai.index');

Route::post('/pegawai/store', [PegawaiController::class, 'store'])
    ->name('pegawai.store');

Route::get('/pegawai/show', [PegawaiController::class, 'show'])
    ->name('pegawai.show');

Route::get('dashboard',[DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user',UserController::class);

Route::resource('mahasiswa', MahasiswaController::class);

//Ilham Aryansyah is here to be the number one
