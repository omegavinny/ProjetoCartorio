<?php

use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SitesController::class, 'index']);

Route::get('imoveis', [SitesController::class, 'getImoveis']);
Route::get('imoveis/{imovel}', [SitesController::class, 'getImovel']);

Route::get('proprietarios', [SitesController::class, 'getProprietarios']);
Route::get('proprietarios/{proprietario}', [SitesController::class, 'getProprietario']);

Route::get('upload', [SitesController::class, 'uploadXML']);
Route::post('upload', [SitesController::class, 'storeXML']);
