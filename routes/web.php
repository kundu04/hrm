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
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AttendanceController;

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
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login']);
Route::middleware('auth')->group(function (){
    
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
    Route::resource('user',UserController::class)->only('show');

    Route::group(['prefix'=>'admin', 'middleware' => ['user-access-control']], function() {
        Route::resource('department',DepartmentController::class);
        Route::resource('designation',DesignationController::class);
        Route::resource('user',UserController::class)->except('show');
        Route::get('ajax_designation_by_id/{id}',[SettingController::class,'ajaxDesignationByDepartmentId'])->name('ajaxDesignationByDepartmentId');
        Route::get('user/{user_id}/payroll',[PayrollController::class,'manage'])->name('payroll.manage');
        Route::put('user/{user_id}/payroll',[PayrollController::class,'update'])->name('payroll.update');
        Route::resource('transactionHead',TransactionHeadController::class);

        Route::get('application_settings',[SettingController::class,'application_settings'])->name('application_settings');
        Route::post('application_settings',[SettingController::class,'update_application_settings'])->name('application_settings.update');

        Route::get('transaction/{transaction_type}',[TransactionController::class,'index'])->name('transaction.index');
        Route::get('transaction/{transaction_type}/create',[TransactionController::class,'create'])->name('transaction.create');
        Route::post('transaction/{transaction_type}',[TransactionController::class,'store'])->name('transaction.store');

        Route::get('attendance', [AttendanceController::class,'index'])->name('attendance.index');
        Route::get('attendance/index', [AttendanceController::class,'index'])->name('attendance.index');
        Route::get('attendance/create', [AttendanceController::class,'create'])->name('attendance.upload');
        Route::post('attendance/store', [AttendanceController::class,'store'])->name('attendance.store');
        Route::get('attendance/{user_id}', [AttendanceController::class,'show'])->name('attendance.show');

        Route::get('/mailable', function () {
            $data['employee']=\App\Models\User::with('relPayroll')->where('status','active')->first();
            return new \App\Mail\SendPaySlip($data); 
        });
    });

    Route::post('logout', function () {
        auth()->logout();
        return redirect('/');
    })->name('logout');
});