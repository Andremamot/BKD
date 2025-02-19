<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfilePegawaiController;

Route::get('/', function () {
    return view('pegawai.index');
});

Route::resource('pegawai', PegawaiController::class);

Route::get('/profile', [ProfilePegawaiController::class, 'index'])->name('profile.index');


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/profile', [ProfilePegawaiController::class, 'index'])->name('profile.index')->middleware('auth');


$router->post('/api/login', 'AuthController@login');
