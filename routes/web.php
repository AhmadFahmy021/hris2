<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;
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



Route::middleware(['auth'])->group(function() {
    // Route Profile
    Route::resource('profile', ProfileController::class);

    Route::middleware(['profile'])->group(function(){
        //Route Jurnal
        Route::resource('jurnal', JurnalController::class);
    
        // Route Home
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    
        // Hak Akses untuk dashboard HRD
        Route::middleware(['hrd'])->group(function() {
            
            // Route Karyawan
            Route::get('karyawan', [KaryawanController::class, 'index']);
            Route::get('karyawan/{id}/detail', [KaryawanController::class, 'detail']);
            Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit']);
            Route::post('karyawan/{id}', [KaryawanController::class, 'update']);
            Route::post('karyawan/{id}/delete', [KaryawanController::class, 'delete']);
        
            // Route Cuti
            Route::get('cuti', [CutiController::class, 'index']);
            Route::get('cuti/hrd', [CutiController::class, 'index_cuti']);
            Route::get('cuti/create', [CutiController::class, 'create']);
            Route::post('cuti', [CutiController::class, 'store']);
            Route::get('cuti/{id}/edit', [CutiController::class, 'edit']);
            Route::post('cuti/{id}', [CutiController::class, 'update']);
            Route::get('cuti/{id}/delete', [CutiController::class, 'delete']);
            Route::get('cuti/setuju', [CutiController::class, 'index_setuju']);
            Route::get('cuti/tolak', [CutiController::class, 'index_tolak']);
            Route::get('cuti/{id}/setuju', [CutiController::class, 'setuju'])->middleware('hrd');
            Route::get('cuti/{id}/tolak', [CutiController::class, 'tolak'])->middleware('hrd');
        });
        
        // Hak akses untuk karyawan
        Route::get('pengcuti', [CutiController::class, 'index']);
        Route::get('pengcuti/create', [CutiController::class, 'create']);
        Route::post('pengcuti', [CutiController::class, 'store']);
        Route::get('pengcuti/{id}/edit', [CutiController::class, 'edit']);
        Route::post('pengcuti/{id}', [CutiController::class, 'update']);
        Route::get('pengcuti/{id}/delete', [CutiController::class, 'delete']);
        
        // Route Tugas
        Route::resource('/tugas', TugasController::class);
        Route::get('/tugass/tim', [TugasController::class, 'tim']);
        Route::get('/tugass/tim/create', [TugasController::class, 'tim_create']);
        Route::get('/tugass/tim/{id}/edit', [TugasController::class, 'tim_edit']);
        Route::get('/tugass/tim/{id}/delete', [TugasController::class, 'tim_destroy']);
        Route::post('/tugass/tim/', [TugasController::class, 'tim_store']);
        Route::post('/tugass/tim/{id}', [TugasController::class, 'tim_update']);
        Route::post('/tugass/tim/{id}', [TugasController::class, 'tim_update']);
        Route::get('tugass/{id}/selesai', [TugasController::class, 'tugas_selesai']);
        Route::get('tugass/{id}/tunda', [TugasController::class, 'tugas_tunda']);
        
        // Route Tim
        Route::resource('/divisi', DivisiController::class);
    });
});



