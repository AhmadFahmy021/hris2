<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return redirect('/login');
});

// Route login dan register
Auth::routes();
Route::get('logout', [LoginController::class,'logout']);

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Profile
Route::resource('profile', ProfileController::class)->middleware(['auth']);
//Route Jurnal
Route::resource('jurnal', JurnalController::class)->middleware(['auth']);

Route::middleware(['auth','hrd'])->group(function() {

    // Route Karyawan
    Route::get('karyawan', [KaryawanController::class, 'index']);
    Route::get('karyawan/{id}/detail', [KaryawanController::class, 'detail']);
    Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::post('karyawan/{id}', [KaryawanController::class, 'update']);
    Route::post('karyawan/{id}/delete', [KaryawanController::class, 'delete']);
    // Route Cuti
    Route::get('cuti', [CutiController::class, 'index']);
    Route::get('cuti/setuju', [CutiController::class, 'index_setuju']);
    Route::get('cuti/tolak', [CutiController::class, 'index_tolak']);
    Route::get('cuti/{id}/setuju', [CutiController::class, 'setuju'])->middleware('hrd');
    Route::get('cuti/{id}/tolak', [CutiController::class, 'tolak'])->middleware('hrd');
});



