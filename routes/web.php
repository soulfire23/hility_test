<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Компании
    Route::get('/company/index', [CompanyController::class, 'index'])->name('admin.company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('admin.company.store');
    Route::get('/company/edit/{company:id}', [CompanyController::class, 'edit'])->name('admin.company.edit');
    Route::put('/company/update/{company:id}', [CompanyController::class, 'update'])->name('admin.company.update');
    Route::delete('/company/destroy/{company:id}', [CompanyController::class, 'destroy'])->name('admin.company.destroy');

    // Сотрудники
    Route::get('/employee/index', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/employee/edit/{employee:id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/employee/update/{employee:id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
    Route::delete('/employee/destroy/{employee:id}', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');
});

require __DIR__.'/auth.php';
