<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/siswa');

Route::resource('siswa', SiswaController::class);
