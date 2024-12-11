<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVacaturesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('employee-employer');
})->name('home');


// Employee and Employer pages routes
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee-page');
Route::get('/employer', [EmployerController::class, 'index'])->name('employer-page');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//vacancies
Route::get('/vacatures', [VacancyController::class, 'index'])->name('vacancy.index');
Route::get('/vacatures/create', [VacancyController::class, 'create'])->name('vacancy.create');
Route::post('/vacatures/store', [VacancyController::class, 'store'])->name('vacancy.store');
Route::get('/vacatures/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
Route::put('/vacatures/{id}/update', [VacancyController::class, 'update'])->name('vacancy.update');
Route::delete('/review/{id}/destroy', [VacancyController::class, 'destroy'])->name('vacancy.destroy');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/vacatures', [AdminVacaturesController::class, 'index'])->name('admin.vacatures.index');
    Route::get('/admin/vacatures/create', [AdminVacaturesController::class, 'create'])->name('admin.vacatures.create');
    Route::post('/admin/vacatures', [AdminVacaturesController::class, 'store'])->name('admin.vacatures.store');
    Route::get('/admin/vacatures/{vacatures}/edit', [AdminVacaturesController::class, 'edit'])->name('admin.vacatures.edit');
    Route::patch('/admin/vacatures/{vacatures}', [AdminVacaturesController::class, 'update'])->name('admin.vacatures.update');
    Route::delete('/admin/vacatures/{vacatures}', [AdminVacaturesController::class, 'destroy'])->name('admin.vacatures.destroy');
});

//admin dashboard
Route::get('/admin/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('admin.admin-dashboard');
    }
    return redirect('/');
})->middleware('auth')->name('dashboard');


//Route::get("/collega's",[CollegaController::class,'index'])->name('collega.index');
//Route::get('instellingen',[InstellingController::class,'index'])->name('instellingen.index');

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');


require __DIR__ . '/auth.php';
