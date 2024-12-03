<?php

use App\Http\Controllers\VacatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vacatures', [VacatureController::class, 'index'])->name('vacature.index');
