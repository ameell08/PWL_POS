<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use Database\Seeders\SupplierSeeder;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Illuminate\Support\Facades\Route;
use Monolog\Level;

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
Route::group(['prefix'=> 'user'], function(){
    Route::get('/', [UserController::class, 'index']);                      //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);                  //menampilkandata user dalam bentuk json untuk data tables
    Route::get('/create', [UserController::class, 'create']);               //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);                     //menampilkan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);     // menampilkan halaman form tambah user ajax
    Route::post('/ajax',[UserController::class, 'store_ajax']);             // Menyimpan data user baru ajax
    Route::get('/{id}', [UserController::class, 'show']);                   // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);              // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);                 // menyimpan perubahan data user
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);    // Menampilkan halaman form edit ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);             // menghapus data user
});

Route::group(['prefix'=> 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);              //menampilkan halaman awal 
    Route::post('/list', [LevelController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
    Route::get('/create', [LevelController::class, 'create']);       //menampilkan halaman form tambah 
    Route::post('/', [LevelController::class, 'store']);             //menampilkan data baru
    Route::get('/{id}', [LevelController::class, 'show']);           // menampilkan detail 
    Route::get('/{id}/edit', [LevelController::class, 'edit']);      // Menampilkan halaman form edit 
    Route::put('/{id}', [LevelController::class, 'update']);         // menyimpan perubahan data 
    Route::delete('/{id}', [LevelController::class, 'destroy']);     // menghapus data 
});

Route::group(['prefix'=> 'kategori'], function(){
    Route::get('/', [KategoriController::class, 'index']);              //menampilkan halaman awal 
    Route::post('/list', [KategoriController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
    Route::get('/create', [KategoriController::class, 'create']);       //menampilkan halaman form tambah 
    Route::post('/', [KategoriController::class, 'store']);             //menampilkan data baru
    Route::get('/{id}', [KategoriController::class, 'show']);           // menampilkan detail 
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);      // Menampilkan halaman form edit 
    Route::put('/{id}', [KategoriController::class, 'update']);         // menyimpan perubahan data 
    Route::delete('/{id}', [KategoriController::class, 'destroy']);     // menghapus data 
});

Route::group(['prefix'=> 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']);              //menampilkan halaman awal 
    Route::post('/list', [BarangController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
    Route::get('/create', [BarangController::class, 'create']);       //menampilkan halaman form tambah 
    Route::post('/', [BarangController::class, 'store']);             //menampilkan data baru
    Route::get('/{id}', [BarangController::class, 'show']);           // menampilkan detail 
    Route::get('/{id}/edit', [BarangController::class, 'edit']);      // Menampilkan halaman form edit 
    Route::put('/{id}', [BarangController::class, 'update']);         // menyimpan perubahan data 
    Route::delete('/{id}', [BarangController::class, 'destroy']);     // menghapus data 
});

Route::group(['prefix'=> 'supplier'], function(){
    Route::get('/', [SupplierController::class, 'index']);              //menampilkan halaman awal 
    Route::post('/list', [SupplierController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
    Route::get('/create', [SupplierController::class, 'create']);       //menampilkan halaman form tambah 
    Route::post('/', [SupplierController::class, 'store']);             //menampilkan data baru
    Route::get('/{id}', [SupplierController::class, 'show']);           // menampilkan detail 
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);      // Menampilkan halaman form edit 
    Route::put('/{id}', [SupplierController::class, 'update']);         // menyimpan perubahan data 
    Route::delete('/{id}', [SupplierController::class, 'destroy']);     // menghapus data 
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class,'index']);
// Route::get('/kategori', [KategoriController::class,'index']);
// Route::get('/user', [UserController::class, 'index']);
// //insert
// Route::get('/user/tambah',[UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan',[UserController::class, 'tambah_simpan']);
// //update
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// //Delete
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', [WelcomeController::class, 'index']);

