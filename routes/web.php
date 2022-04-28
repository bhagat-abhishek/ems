<?php

use App\Http\Controllers\CadreController;
use App\Http\Controllers\DataEmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\UserController;
use App\Models\Employee;
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
// im changing this

Auth::routes([
    'register' => true,
    'reset' => false,
    'forgot' => false,
    'verify' => false,
]);


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments')->middleware('auth', 'super-admin');
Route::post('/departments/add', [DepartmentController::class, 'store'])->name('departments.store')->middleware('auth', 'super-admin');
Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit')->middleware('auth', 'super-admin');
Route::post('/departments/update/{id}', [DepartmentController::class, 'update'])->name('departments.update')->middleware('auth', 'super-admin');
Route::get('/departments/delete/{id}', [DepartmentController::class, 'destroy'])->name('departments.delete')->middleware('auth', 'super-admin');


Route::get('/designation', [DesignationController::class, 'index'])->name('designation')->middleware('auth', 'super-admin');
Route::post('/designation/add', [DesignationController::class, 'store'])->name('designation.store')->middleware('auth', 'super-admin');
Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit')->middleware('auth', 'super-admin');
Route::post('/designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update')->middleware('auth', 'super-admin');
Route::get('/designation/delete/{id}', [DesignationController::class, 'destroy'])->name('designation.delete')->middleware('auth', 'super-admin');


Route::get('/cadres', [CadreController::class, 'index'])->name('cadres')->middleware('auth', 'super-admin');
Route::post('/cadres/add', [CadreController::class, 'store'])->name('cadres.store')->middleware('auth', 'super-admin');
Route::get('/cadres/edit/{id}', [CadreController::class, 'edit'])->name('cadres.edit')->middleware('auth', 'super-admin');
Route::post('/cadres/update/{id}', [CadreController::class, 'update'])->name('cadres.update')->middleware('auth', 'super-admin');
Route::get('/cadres/delete/{id}', [CadreController::class, 'destroy'])->name('cadres.delete')->middleware('auth', 'super-admin');



Route::get('/employees', [EmployeeController::class, 'index'])->name('employees')->middleware('auth', 'super-admin');
Route::get('/employees/list', [EmployeeController::class, 'getEmployees'])->name('employees.list')->middleware('auth', 'super-admin');


Route::get('/employees/add', [EmployeeController::class, 'create'])->name('employees.add')->middleware('auth', 'super-admin');
Route::post('/employees/add', [EmployeeController::class, 'store'])->name('employees.add')->middleware('auth', 'super-admin');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware('auth', 'super-admin');
Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update')->middleware('auth', 'super-admin');
Route::get('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.delete')->middleware('auth', 'super-admin');
Route::get('/employees/view/{id}', [EmployeeController::class, 'show'])->name('employees.delete')->middleware('auth', 'super-admin');


Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth', 'super-admin');
Route::post('/users/add', [UserController::class, 'store'])->name('users.store')->middleware('auth', 'super-admin');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth', 'super-admin');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth', 'super-admin');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete')->middleware('auth', 'super-admin');


Route::get('/mod/employees', [ModeratorController::class, 'index'])->name('mod.employees')->middleware('auth', 'moderator');
Route::get('/mod/employee/approve/{id}', [ModeratorController::class, 'approve'])->name('mod.employees.approve')->middleware('auth', 'moderator');
Route::get('/mod/employee/reject/{id}', [ModeratorController::class, 'reject'])->name('mod.employees.reject')->middleware('auth', 'moderator');


Route::get('/data-entry', function() {
    $employess = Employee::where('status', 'rejected')->get();
    return view('admin.entry.index', ['employees'=>$employess, 'i'=>1]);
})->name('data-entry')->middleware('auth', 'data-entry');

Route::get('/data-entry/employees/add', [DataEmployeeController::class, 'create'])->name('employees.add.data')->middleware('auth', 'data-entry');
Route::post('/data-entry/employees/add', [DataEmployeeController::class, 'store'])->name('employees.add.data')->middleware('auth', 'data-entry');
Route::get('/data-entry/employees/edit/{id}', [DataEmployeeController::class, 'edit'])->name('employees.edit.data')->middleware('auth', 'data-entry');
Route::post('/data-entry/employees/update/{id}', [DataEmployeeController::class, 'update'])->name('employees.update.data')->middleware('auth', 'data-entry',);