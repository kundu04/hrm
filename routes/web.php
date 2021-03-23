<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;




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
Route::get('dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login']);
Route::resource('department',DepartmentController::class);
Route::resource('designation',DesignationController::class);


