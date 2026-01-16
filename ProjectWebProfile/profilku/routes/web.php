<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class, 'index']);
Route::get('/admin', [ProfileController::class, 'edit']);
Route::post('/admin/update', [ProfileController::class, 'update']);



