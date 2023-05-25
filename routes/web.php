<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ATugasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::get('api', [ApiController::class,'index']);
Route::get('api/hal', [ApiController::class,'HTML']);

Route::middleware(['auth'])->group(function() {
    // Route Profile
    Route::resource('profile', ProfileController::class);
    // Route Download Slip Gaji
    Route::get('slip-gaji', [PDFController::class, 'generatePDF']);

    Route::middleware(['profile'])->group(function(){
        //Route Jurnal
        Route::resource('jurnal', JurnalController::class);
        Route::get('jurnal/{id}/hapus', [JurnalController::class, 'destroy'])->name('jurnal.hapus');
        // Route Home
        Route::get('rute', [HomeController::class, 'seleksi']);
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('/homes', [HomeController::class, 'owner']);
    
    
        // Hak Akses untuk HRD
        Route::middleware('hrd')->group(function() {
            
            // Route Karyawan
            Route::get('karyawan', [KaryawanController::class, 'index']);
            Route::get('karyawan/{id}/detail', [KaryawanController::class, 'detail']);
            Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit']);
            Route::post('karyawan/{id}', [KaryawanController::class, 'update']);
            Route::get('karyawan/{id}/delete', [KaryawanController::class, 'delete']);
        
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
            Route::get('cuti/{id}/setuju', [CutiController::class, 'setuju']);
            Route::get('cuti/{id}/tolak', [CutiController::class, 'tolak']);
            // 
            Route::get('/tugass/tim', [TugasController::class, 'tim']);
            Route::get('/tugass/tim/create', [TugasController::class, 'tim_create']);
            Route::get('/tugass/tim/{id}/edit', [TugasController::class, 'tim_edit']);
            Route::get('/tugass/tim/{id}/delete', [TugasController::class, 'tim_destroy']);
            Route::post('/tugass/tim/', [TugasController::class, 'tim_store']);
            Route::post('/tugass/tim/{id}', [TugasController::class, 'tim_update']);

            // Route Gaji
            Route::resource('gaji', GajiController::class);

            // Route Tim
            Route::resource('/divisi', DivisiController::class);
            Route::resource('/tugas', TugasController::class);



        });
        
        Route::middleware('owner')->group(function(){
             // Route Karyawan
             Route::get('kelola/karyawan', [KaryawanController::class, 'index']);
             Route::get('kelola/karyawan/{id}/detail', [KaryawanController::class, 'detail']);
             Route::get('kelola/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
             Route::post('kelola/karyawan/{id}', [KaryawanController::class, 'update']);
             Route::get('kelola/karyawan/{id}/delete', [KaryawanController::class, 'delete']);
         
             // Route Cuti
             Route::get('/kelola/cuti', [CutiController::class,'index']);
             Route::get('/kelola/cuti/{id}/setuju', [CutiController::class,'setuju']);
             Route::get('/kelola/cuti/{id}/tolak', [CutiController::class,'tolak']);
            
            //  Route Kelola Tugas Karyawan
            Route::get('/kelola/tugas/karyawan', [TugasController::class,'index']);
            Route::get('/kelola/tugas/karyawan/create', [TugasController::class,'create']);
            Route::post('/kelola/tugas/karyawan', [TugasController::class,'store']);
            Route::get('/kelola/tugas/karyawan/{id}/edit', [TugasController::class,'edit']);
            Route::post('/kelola/tugas/karyawan/{id}', [TugasController::class,'update']);
            Route::get('/kelola/tugas/karyawan/{id}/delete', [TugasController::class,'destroy']);


             // Route Kelola Tugas Divisi
             Route::get('/kelola/tugas/divisi', [TugasController::class, 'tim']);
             Route::get('/kelola/tugas/divisi/create', [TugasController::class, 'tim_create']);
             Route::get('/kelola/tugas/divisi/{id}/edit', [TugasController::class, 'tim_edit']);
             Route::get('/kelola/tugas/divisi/{id}/delete', [TugasController::class, 'tim_destroy']);
             Route::post('/kelola/tugas/divisi', [TugasController::class, 'tim_store']);
             Route::post('/kelola/tugas/divisi/{id}', [TugasController::class, 'tim_update']);
 
             // Route Gaji
             Route::resource('kelola/gaji', GajiController::class);
             // Route Role
            Route::get('users', [RoleController::class, 'index']);
            Route::get('users/{id}/edit', [RoleController::class, 'edit']);
            Route::post('users/{id}', [RoleController::class, 'update']);
            Route::get('users/{id}/delete', [RoleController::class, 'delete']);

            // Route Pantau Jurnal
            Route::get('pantau/jurnal', [JurnalController::class, 'pantau']);
            Route::get('pantau/{id}/detail', [JurnalController::class, 'lihat']);

            // Route Tim
            Route::resource('kelola/divisi', DivisiController::class);
        });

        Route::middleware('karyawan')->group(function(){

            // Hak akses untuk karyawan
            Route::get('pengcuti', [CutiController::class, 'index']);
            Route::get('pengcuti/create', [CutiController::class, 'create']);
            Route::post('pengcuti', [CutiController::class, 'store']);
            Route::get('pengcuti/{id}/edit', [CutiController::class, 'edit']);
            Route::post('pengcuti/{id}', [CutiController::class, 'update']);
            Route::get('pengcuti/{id}/delete', [CutiController::class, 'delete']);
            
            
            // Tim 
            Route::get('/tugass', [TugasController::class, 'index']);
            // Route::post('/tugass/create', [TugasController::class, 'store']);
            // Route::get('/tugass/{id}/edit', [TugasController::class, 'edit']);
            // Route::post('/tugass/{id}', [TugasController::class, 'update']);
            Route::get('/tugass/{id}/delete', [TugasController::class, 'destroy']);
            Route::get('tugass/{id}/selesai', [TugasController::class, 'tugas_selesai']);
            Route::get('tugass/{id}/tunda', [TugasController::class, 'tugas_tunda']);
            Route::get('divition/tugas', [TugasController::class, 'tim']);
            Route::get('divition/tugas/{id}/selesai',[TugasController::class,'selesai']);
            Route::get('divition/tugas/{id}/tunda', [TugasController::class,'tunda']);

            Route::resource('anggota/divisi/tugas', ATugasController::class);
        });
        
        
    });
});



