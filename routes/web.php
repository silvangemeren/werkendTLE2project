<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

// Route for Employer's Vacancies
Route::get('/vacatures/employer', [VacancyController::class, 'indexForEmployer'])->name('vacancies.employer');

// Route for Employee's Vacancies
Route::get('/vacatures/employee', [VacancyController::class, 'indexForEmployee'])->name('vacancies.employee');

// Employee and Employer Pages
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee-page');
Route::get('/employer', [EmployerController::class, 'index'])->name('employer-page');

// Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Vacancies
Route::middleware('auth')->group(function () {
    Route::get('/vacatures', [VacancyController::class, 'index'])->name('vacancy.employer');
    Route::get('/vacatures/create', [VacancyController::class, 'create'])->name('vacancy.create');
    Route::post('/vacatures/store', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/vacatures/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::put('/vacatures/{id}/update', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::delete('/vacatures/{id}/destroy', [VacancyController::class, 'destroy'])->name('vacancy.destroy');
    Route::post('/vacancies/{vacancy}/apply', [VacancyController::class, 'apply'])->name('vacancy.apply');
});

// Fallback Route for Auth
require __DIR__ . '/auth.php';
