<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use Database\Seeders\SupplierSeeder;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Monolog\Level;

//Praktikum 7
    Route::pattern('id','[0-9]+'); //Ketika ada parameter {id}, maka harus berupa angka

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

    Route::middleware(['auth'])->group(function(){ //artinya smeua route di dalam grup ini harus login terlebih dahulu
        Route::get('/', [WelcomeController::class, 'index']); //halaman awal

        // route user
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
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); //Untuk tampilan form confirm delete user ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // menghapus dat auser ajax
            Route::delete('/{id}', [UserController::class, 'destroy']);             // menghapus data user
        });
        
        Route::group(['prefix'=> 'level','middleware' => 'authorize :ADM'], function(){
            Route::get('/', [LevelController::class, 'index']);              //menampilkan halaman awal 
            Route::post('/list', [LevelController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
            Route::get('/create', [LevelController::class, 'create']);       //menampilkan halaman form tambah 
            Route::post('/', [LevelController::class, 'store']);             //menampilkan data baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']);   // menyimpan data ajax baru
            Route::get('/{id}', [LevelController::class, 'show']);           // menampilkan detail 
            Route::get('/{id}/edit', [LevelController::class, 'edit']);      // Menampilkan halaman form edit 
            Route::put('/{id}', [LevelController::class, 'update']);         // menyimpan perubahan data 
            Route::get('/{id}/edit_ajax', [LevelController::class,'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [LevelController::class, 'destroy']);     // menghapus data 
        });
        
        Route::group(['prefix'=> 'kategori'], function(){
            Route::get('/', [KategoriController::class, 'index']);                  //menampilkan halaman awal 
            Route::post('/list', [KategoriController::class, 'list']);              //menampilkan data dalam bentuk json untuk data tables
            Route::get('/create', [KategoriController::class, 'create']);           //menampilkan halaman form tambah 
            Route::post('/', [KategoriController::class, 'store']);                 //menampilkan data baru
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); //form tambah ajax
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);        //simpan data baru ajax
            Route::get('/{id}', [KategoriController::class, 'show']);               // menampilkan detail 
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);          // Menampilkan halaman form edit 
            Route::put('/{id}', [KategoriController::class, 'update']);             // menyimpan perubahan data 
            Route::get('/{id}/edit_ajax', [KategoriController::class,'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
            Route::delete('/{id}', [KategoriController::class, 'destroy']);         // menghapus data 
        });
        
        Route::group(['prefix'=> 'barang'], function(){
            Route::get('/', [BarangController::class, 'index']);              //menampilkan halaman awal 
            Route::post('/list', [BarangController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
            Route::get('/create', [BarangController::class, 'create']);       //menampilkan halaman form tambah 
            Route::post('/', [BarangController::class, 'store']);             //menampilkan data baru
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); //form tambah ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']);      //simpan user data ajax baru
            Route::get('/{id}', [BarangController::class, 'show']);           // menampilkan detail 
            Route::get('/{id}/edit', [BarangController::class, 'edit']);      // Menampilkan halaman form edit 
            Route::put('/{id}', [BarangController::class, 'update']);         // menyimpan perubahan data 
            Route::get('/{id}/edit_ajax', [BarangController::class,'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [BarangController::class, 'destroy']);     // menghapus data 
        });
        
        Route::group(['prefix'=> 'supplier'], function(){
            Route::get('/', [SupplierController::class, 'index']);              //menampilkan halaman awal 
            Route::post('/list', [SupplierController::class, 'list']);          //menampilkan data dalam bentuk json untuk data tables
            Route::get('/create', [SupplierController::class, 'create']);       //menampilkan halaman form tambah 
            Route::post('/', [SupplierController::class, 'store']);             //menampilkan data baru
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); //form tambah ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']);    // simpan data baru ajax
            Route::get('/{id}', [SupplierController::class, 'show']);           // menampilkan detail 
            Route::get('/{id}/edit', [SupplierController::class, 'edit']);      // Menampilkan halaman form edit 
            Route::put('/{id}', [SupplierController::class, 'update']);         // menyimpan perubahan data 
            Route::get('/{id}/edit_ajax', [SupplierController::class,'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']);     // menghapus data 
        });
        
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

