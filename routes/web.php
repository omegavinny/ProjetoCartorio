<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImoveisController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProprietariosController;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::view('password/forgot', 'auths.passwords.forgot')->name('passwords.forgot');
Route::view('password/reset', 'auths.passwords.reset')->name('passwords.reset');

Route::get('imoveis', [ImoveisController::class, 'index'])->name('imoveis.index');
Route::get('imoveis/{imovel}', [ImoveisController::class, 'show'])->name('imoveis.show');

Route::get('proprietarios', [ProprietariosController::class, 'index'])->name('proprietarios.index');
Route::get('proprietarios/{proprietario}', [ProprietariosController::class, 'show'])->name('proprietarios.show');

Route::get('uploads', [UploadsController::class, 'index'])->name('uploads.index');
Route::post('uploads', [UploadsController::class, 'store'])->name('uploads.store');
Route::get('uploads/{upload}/process', [UploadsController::class, 'procFile'])->name('uploads.process');
Route::get('uploads/enviar-arquivo', [UploadsController::class, 'create'])->name('uploads.create');

Route::get('usuarios', [UsuariosController::class, 'index'])->name('users.index');
Route::post('usuarios', [UsuariosController::class, 'store'])->name('users.store');
Route::get('usuarios/cadastar', [UsuariosController::class, 'create'])->name('users.create');
