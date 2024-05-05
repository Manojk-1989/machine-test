<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\CompanyController;
use App\Http\Controllers\Web\Admin\EmployeeController;
use App\Http\Controllers\Web\Admin\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/admin/login', [AuthController::class, 'create'])->name('admin.create');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/company', [CompanyController::class, 'create'])->name('company.create');
Route::get('/admin/company-lists', [CompanyController::class, 'index'])->name('company.index');
Route::post('/admin/company', [CompanyController::class, 'store'])->name('company.store');
Route::get('/admin/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::delete('/admin/company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::put('/admin/company/{id}', [CompanyController::class, 'update'])->name('company.update');


Route::get('/admin/employ', [EmployeeController::class, 'create'])->name('employ.create');
Route::get('/admin/employ-lists', [EmployeeController::class, 'index'])->name('employ.index');
Route::post('/admin/employ', [EmployeeController::class, 'store'])->name('employ.store');
Route::get('/admin/employ/{id}/edit', [EmployeeController::class, 'edit'])->name('employ.edit');
Route::delete('/admin/employ/{id}', [EmployeeController::class, 'destroy'])->name('employ.destroy');
Route::put('/admin/employ/{id}', [CompanyController::class, 'update'])->name('employ.update');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');


});







