<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SitesController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::view('password/forgot', 'auths.passwords.forgot')->name('passwords.forgot');
Route::view('password/reset', 'auths.passwords.reset')->name('passwords.reset');

Route::get('imoveis', [SitesController::class, 'getImoveis'])->name('imoveis.index');
Route::get('imoveis/{imovel}', [SitesController::class, 'getImovel'])->name('imoveis.show');

Route::get('proprietarios', [SitesController::class, 'getProprietarios'])->name('proprietarios.index');
Route::get('proprietarios/{proprietario}', [SitesController::class, 'getProprietario'])->name('proprietarios.show');

Route::get('upload', [SitesController::class, 'uploadXML'])->name('upload.index');
Route::post('upload', [SitesController::class, 'storeXML'])->name('upload.store');
