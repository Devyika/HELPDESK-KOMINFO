<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\Dashboard2Controller;

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
    return view('welcome');
});
Route::resource('pendaftarans', PendaftaranController::class);
Route::resource('admins', AdminController::class);
Route::resource('superadmins', SuperadminController::class);
Route::resource('opds', OpdController::class);
Route::resource('dashboard1', Dashboard1Controller::class);
Route::resource('dashboard2', Dashboard2Controller::class);
