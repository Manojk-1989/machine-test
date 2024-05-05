<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\CompanyController;
use App\Http\Controllers\Api\Admin\EmployeeController;
use App\Http\Controllers\Api\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Authentication
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    
});  
Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index');
    
});  
Route::middleware('auth:sanctum')->group(function () {
    
    Route::controller(CompanyController::class)->group(function () {
        Route::get('companies', 'index');
        
    });  
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('company/{id}/employees', 'index');
        
    });
});
