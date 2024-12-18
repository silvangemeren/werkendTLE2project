<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVacaturesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeRegistrationController;
use App\Http\Controllers\EmployerRegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('employee-employer');
})->name('home');

// Routes voor werknemer- en werkgever-registratie
Route::controller(EmployeeRegistrationController::class)->group(function () {
    Route::get('/register/employee', 'showRegistrationForm')->name('register.employee');
    Route::post('/register/employee', 'register')->name('register.employee.submit');
});

Route::controller(EmployerRegistrationController::class)->group(function () {
    Route::get('/register/employer', 'showRegistrationForm')->name('register.employer');
    Route::post('/register/employer', 'register')->name('register.employer.submit');
});
// Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/vacatures/guest', [VacancyController::class, 'indexForGuest'])->name('vacancies.guest');
Route::get('/vacatures/guest/search', [VacancyController::class, 'guestSearch'])->name('vacancies.guestSearch');

// Vacancies for Employers and Employees
Route::middleware('auth')->group(function () {
    Route::get('/vacatures/create', [VacancyController::class, 'create'])->name('vacancy.create');
    Route::get('/vacatures/employer', [VacancyController::class, 'indexForEmployer'])->name('vacancies.employer');
    Route::get('/vacatures/employee', [VacancyController::class, 'indexForEmployee'])->name('vacancies.employee');
    Route::get('/vacatures/search', [VacancyController::class, 'search'])->name('vacancy.search');
    Route::get('/vacatures/{vacatures}', [VacancyController::class, 'show'])->name('vacatures.show');
    Route::get('/vacatures', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/vacatures/search', [VacancyController::class, 'search'])->name('vacancy.search');
    Route::get('/vacatures/search', [VacancyController::class, 'search'])->name('vacancy.search');
    Route::post('/vacatures/store', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/vacatures/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::put('/vacatures/{id}/update', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::delete('/vacatures/{id}', [VacancyController::class, 'destroy'])->name('vacancy.destroy');
    Route::post('/vacancies/{vacancy}/apply', [VacancyController::class, 'apply'])->name('vacancy.apply');
});

// Admin-Specific Routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.admin-dashboard');
        }
        return redirect('/');
    })->name('admin.dashboard');

    // Admin User Management
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Admin Vacancies Management
    Route::get('/admin/vacatures', [AdminVacaturesController::class, 'index'])->name('admin.vacatures.index');
    Route::get('/admin/vacatures/create', [AdminVacaturesController::class, 'create'])->name('admin.vacatures.create');
    Route::post('/admin/vacatures', [AdminVacaturesController::class, 'store'])->name('admin.vacatures.store');
    Route::get('/admin/vacatures/{vacatures}/edit', [AdminVacaturesController::class, 'edit'])->name('admin.vacatures.edit');
    Route::patch('/admin/vacatures/{vacatures}', [AdminVacaturesController::class, 'update'])->name('admin.vacatures.update');
    Route::delete('/admin/vacatures/{vacatures}', [AdminVacaturesController::class, 'destroy'])->name('admin.vacatures.destroy');

    // Admin Status Management
    Route::get('/admin/status', [AdminUserController::class, 'change_status'])->name('change_status');
    Route::get('/admin/{id}/status', [AdminUserController::class, 'status'])->name('status');
});

Route::get('/inbox', [ApplicationController::class, 'inbox'])->name('inbox')->middleware('auth');
Route::post('/inbox/unapply/{id}', [ApplicationController::class, 'unapply'])->name('application.unapply')->middleware('auth');


// Miscellaneous Routes
Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancy/{vacancy}', [VacancyController::class, 'show'])->name('vacancy.show');


// Authentication Routes
require __DIR__ . '/auth.php';
