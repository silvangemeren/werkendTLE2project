<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/vacatures', [VacancyController::class, 'index'])->name('vacancy.index');
Route::get('/vacatures/create', [VacancyController::class, 'create'])->name('vacancy.create');
Route::post('/vacatures/store', [VacancyController::class, 'store'])->name('vacancy.store');
Route::get('/vacatures/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');

//Route::get("/collega's",[CollegaController::class,'index'])->name('collega.index');
//Route::get('instellingen',[InstellingController::class,'index'])->name('instellingen.index');

require __DIR__.'/auth.php';
