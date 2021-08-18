<?php

use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SitesController::class, 'index']);

Route::get('upload', [SitesController::class, 'create']);

Route::post('upload', [SitesController::class, 'store']);
