<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeeController;

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

Route::get('employees/{employee}/edit',[EmployeeController::class, 'edit'])
    ->name('employees.edit')
    ->middleware('auth');