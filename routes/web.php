<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Employees

Route::get('employees', [EmployeeController::class, 'index'])
    ->name('employees')
    ->middleware('auth');

Route::get('employees/create', [EmployeeController::class, 'create'])
    ->name('employees.create')
    ->middleware('auth');

Route::post('employees', [EmployeeController::class, 'store'])
    ->name('employees.store')
    ->middleware('auth');

Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])
    ->name('employees.edit')
    ->middleware('auth');

Route::put('employees/{employee}', [EmployeeController::class, 'update'])
    ->name('employees.update')
    ->middleware('auth');

Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])
    ->name('employees.destroy')
    ->middleware('auth');

// Employment Statuses
Route::get('employment-statuses', [EmploymentStatusController::class, 'index'])
    ->name('employment-statuses')
    ->middleware('auth');

Route::get('employment-statuses/create', [EmploymentStatusController::class, 'create'])
    ->name('employment-statuses.create')
    ->middleware('auth');

Route::post('employment-statuses', [EmploymentStatusController::class, 'store'])
    ->name('employment-statuses.store')
    ->middleware('auth');

Route::get('employment-statuses/{employmentStatus}/edit', [EmploymentStatusController::class, 'edit'])
    ->name('employment-statuses.edit')
    ->middleware('auth');

Route::put('employment-statuses/{employmentStatus}', [EmploymentStatusController::class, 'update'])
    ->name('employment-statuses.update')
    ->middleware('auth');

Route::delete('employment-statuses/{employmentStatus}', [EmploymentStatusController::class, 'destroy'])
    ->name('employment-statuses.destroy')
    ->middleware('auth');
