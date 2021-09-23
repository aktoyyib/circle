<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BpoController;

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

Auth::routes();


Route::group(array('middleware' => ['throttle:20|60,1', 'auth']), function(){ 
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::resource('roles', RoleController::class);
    Route::get('users/export', [UserController::class, 'export'])->middleware('role:Admin');
    Route::resource('users', UserController::class); 
    Route::resource('patients', PatientController::class);
    Route::get('bpo/export', [BpoController::class, 'export'])->middleware('role:Admin|Doctor');
    Route::resource('bpo', BpoController::class);

}); 

