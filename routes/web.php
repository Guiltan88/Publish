<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/home',[HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/auth', [App\Http\Controllers\AuthController::class, 'index']);

Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::get('/pegawai', [PegawaiController::class, 'index']);
//Ilham Aryansyah is here to be the number one
