<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdController; 
use App\Http\Controllers\Opd2Controller; 
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Pendaftaran2Controller;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\Dashboard2Controller;

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

Route::get('/', [OpdController::class, 'index']);

Route::resource('/opd','OpdController')->except(['show']);
Route::post('/opd', [OpdController::class, 'index'])->name('opd');
Route::get('/opd', [OpdController::class, 'index'])->name('opd');
Route::get('/opd/data', [OpdController::class, 'data'])->name('opd.data');
Route::get('/opd/input', [OpdController::class, 'input'])->name('opd.input');
Route::post('/opd/create', [OpdController::class, 'create'])->name('opd.create');
Route::get('/opd/edit', [OpdController::class, 'edit'])->name('opd.edit');
Route::post('/opd/update', [OpdController::class, 'update'])->name('opd.update');
Route::delete('/opd/destroy/{id}', [OpdController::class, 'destroy'])->name('opd.destroy');


Route::get('/', [SuperadminController::class, 'index']);

Route::resource('/superadmin','SuperadminController')->except(['show']);
Route::post('/superadmin', [SuperadminController::class, 'index'])->name('superadmin');
Route::get('/superadmin', [SuperadminController::class, 'index'])->name('superadmin');
Route::get('/superadmin/data', [SuperadminController::class, 'data'])->name('superadmin.data');
Route::get('/superadmin/input', [SuperadminController::class, 'input'])->name('superadmin.input');
Route::post('/superadmin/create', [SuperadminController::class, 'create'])->name('superadmin.create');
Route::get('/superadmin/edit', [SuperadminController::class, 'edit'])->name('superadmin.edit');
Route::post('/superadmin/update', [SuperadminController::class, 'update'])->name('superadmin.update');
Route::delete('/superadmin/destroy/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.destroy');

Route::get('/', [AdminController::class, 'index']);

Route::resource('/admin','AdminController')->except(['show']);
Route::post('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/data', [AdminController::class, 'data'])->name('admin.data');
Route::get('/admin/input', [AdminController::class, 'input'])->name('admin.input');
Route::post('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/', [PendaftaranController::class, 'index']);

Route::resource('pendaftarans', PendaftaranController::class);

Route::get('/', [Pendaftaran2Controller::class, 'index']);

Route::resource('pendaftarans2', Pendaftaran2Controller::class);

Route::resource('admin', AdminController::class);
Route::resource('admin2', Admin2Controller::class);
Route::resource('superadmin', SuperadminController::class);
Route::resource('opd', OpdController::class);
Route::resource('dashboard1', Dashboard1Controller::class);
Route::resource('dashboard2', Dashboard2Controller::class);

Route::get('/', [Admin2Controller::class, 'index']);

Route::resource('/admin2','Admin2Controller')->except(['show']);
Route::post('/admin2', [Admin2Controller::class, 'index'])->name('admin2');
Route::get('/admin2', [Admin2Controller::class, 'index'])->name('admin2');
Route::get('/admin2/data', [Admin2Controller::class, 'data'])->name('admin2.data');
Route::get('/admin2/input', [Admin2Controller::class, 'input'])->name('admin2.input');
Route::post('/admin2/create', [Admin2Controller::class, 'create'])->name('admin2.create');
Route::get('/admin2/edit', [Admin2Controller::class, 'edit'])->name('admin2.edit');
Route::post('/admin2/update', [Admin2Controller::class, 'update'])->name('admin2.update');
Route::delete('/admin2/destroy/{id}', [Admin2Controller::class, 'destroy'])->name('admin2.destroy');

Route::get('/', [Opd2Controller::class, 'index']);

Route::resource('/opd2','Opd2Controller')->except(['show']);
Route::post('/opd2', [Opd2Controller::class, 'index'])->name('opd2');
Route::get('/opd2', [Opd2Controller::class, 'index'])->name('opd2');
Route::get('/opd2/data', [Opd2Controller::class, 'data'])->name('opd.data2');
Route::get('/opd2/input', [Opd2Controller::class, 'input'])->name('opd2.input');
Route::post('/opd2/create', [Opd2Controller::class, 'create'])->name('opd2.create');
Route::get('/opd2/edit', [Opd2Controller::class, 'edit'])->name('opd2.edit');
Route::post('/opd2/update', [Opd2Controller::class, 'update'])->name('opd2.update');
Route::delete('/opd2/destroy/{id}', [Opd2Controller::class, 'destroy'])->name('opd2.destroy');

