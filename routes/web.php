<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TransactionHeadController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login']);
Route::resource('department',DepartmentController::class);
Route::resource('designation',DesignationController::class);
Route::resource('user',UserController::class);
Route::get('ajax_designation_by_id/{id}',[SettingController::class,'ajaxDesignationByDepartmentId'])->name('ajaxDesignationByDepartmentId');
Route::get('user/{user_id}/payroll',[PayrollController::class,'manage'])->name('payroll.manage');
Route::put('user/{user_id}/payroll',[PayrollController::class,'update'])->name('payroll.update');
Route::resource('transactionHead',TransactionHeadController::class);

