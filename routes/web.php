<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes([
    'register' => false,
    'reset' => false,
    'forgot' => false,
    'verify' => false,
]);


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments')->middleware('auth');
Route::post('/departments/add', [DepartmentController::class, 'store'])->name('departments.store')->middleware('auth');
Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit')->middleware('auth');
Route::post('/departments/update/{id}', [DepartmentController::class, 'update'])->name('departments.update')->middleware('auth');
Route::get('/departments/delete/{id}', [DepartmentController::class, 'destroy'])->name('departments.delete')->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees')->middleware('auth');
Route::get('/employees/list', [EmployeeController::class, 'getEmployees'])->name('employees.list')->middleware('auth');


Route::get('/employees/add', [EmployeeController::class, 'create'])->name('employees.add')->middleware('auth');
Route::post('/employees/add', [EmployeeController::class, 'store'])->name('employees.add')->middleware('auth');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware('auth');
Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update')->middleware('auth');
Route::get('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.delete')->middleware('auth');
Route::get('/employees/view/{id}', [EmployeeController::class, 'show'])->name('employees.delete')->middleware('auth');