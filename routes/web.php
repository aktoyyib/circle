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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::group(array('middleware' => ['throttle:20|60,1', 'auth']), function(){ 

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class); 
    Route::resource('patients', PatientController::class);
    Route::resource('bpo', BpoController::class);

}); 

