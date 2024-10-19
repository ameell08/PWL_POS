<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;

//Praktikum 7
    Route::pattern('id','[0-9]+'); //Ketika ada parameter {id}, maka harus berupa angka

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'postRegister']);

        //Pertemuan 7
        Route::middleware(['auth'])->group(function(){
            Route::get('/', [WelcomeController::class,'index']);

            Route::group(['prefix' => 'user', 'middleware'=> 'authorize:ADM'], function(){
                Route::get('/', [UserController::class, 'index']);                          //menampilkan laman awal user
                Route::post('/list', [UserController::class, 'list']);                      //menampilkan data user dalam bentuk json untuk datatables
                Route::get('/create', [UserController::class, 'create']);                   //menampilkan laman form tambah user
                Route::post('/', [UserController::class, 'store']);                         //menyimpan data user baru
                Route::get('/create_ajax', [UserController::class, 'create_ajax']);         //menampilkan laman form tambah user AJAX
                Route::post('/ajax', [UserController::class, 'store_ajax']);                //menyimpan data user baru AJAX
                Route::get('/{id}', [UserController::class, 'show']);                       //menampilkan detail user
                Route::get('/{id}/edit', [UserController::class, 'edit']);                  //menampilkan laman form edit user
                Route::put('/{id}', [UserController::class, 'update']);                     //menyimpan perubahan data user
                Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);        //menampilkan laman form edit user AJAX
                Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    //menyimpan perubahan data user AJAX
                Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);   //menampilkan form confirm hapus data user AJAX
                Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); //menghapus data user AJAX
                Route::delete('/{id}', [UserController::class, 'destroy']);                 //menghapus data user
                });

                Route::group(['prefix' => 'level', 'middleware'=> 'authorize:ADM,MNG'], function(){
                    Route::get('/', [LevelController::class, 'index']);                             //menampilkan laman awal level
                    Route::post('/list', [LevelController::class, 'list']);                         //menampilkan data level dalam bentuk json untuk datatables
                    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);            //menampilkan laman form tambah level AJAX
                    Route::post('/ajax', [LevelController::class, 'store_ajax']);                   //menyimpan data level baru AJAX
                    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);           //menampilkan laman form edit level AJAX
                    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);       //menyimpan perubahan data level AJAX
                    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);      //menampilkan form confirm hapus data level AJAX
                    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);    //menghapus data level AJAX
                });

                Route::group(['prefix' => 'kategori', 'middleware'=> 'authorize:ADM,MNG'], function(){
                    Route::get('/', [KategoriController::class, 'index']);                              //menampilkan laman awal kategori
                    Route::post('/list', [KategoriController::class, 'list']);                          //menampilkan data kategori dalam bentuk json untuk datatables
                    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);             //menampilkan laman form tambah kategori AJAX
                    Route::post('/ajax', [KategoriController::class, 'store_ajax']);                    //menyimpan data kategori baru AJAX
                    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);            //menampilkan laman form edit kategori AJAX
                    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);        //menyimpan perubahan data kategori AJAX
                    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);       //menampilkan form confirm hapus data kategori AJAX
                    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);     //menghapus data kategori AJAX
                });

                Route::group(['prefix' => 'supplier', 'middleware'=> 'authorize:ADM'], function(){
                    Route::get('/', [SupplierController::class, 'index']);                              //menampilkan laman awal supplier
                    Route::post('/list', [SupplierController::class, 'list']);                          //menampilkan data supplier dalam bentuk json untuk datatables
                    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);             //menampilkan laman form tambah supplier AJAX
                    Route::post('/ajax', [SupplierController::class, 'store_ajax']);                    //menyimpan data supplier baru AJAX
                    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);            //menampilkan laman form edit supplier AJAX
                    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);        //menyimpan perubahan data supplier AJAX
                    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);       //menampilkan form confirm hapus data supplier AJAX
                    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);     //menghapus data supplier AJAX
                });

                Route::group(['prefix' => 'barang', 'middleware'=> 'authorize:ADM,MNG'], function(){
                    Route::get('/', [BarangController::class, 'index']);                                //menampilkan laman awal barang
                    Route::post('/list', [BarangController::class, 'list']);                            //menampilkan data barang dalam bentuk json untuk datatables
                    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);               //menampilkan laman form tambah barang AJAX
                    Route::post('/ajax', [BarangController::class, 'store_ajax']);                      //menyimpan data barang baru AJAX
                    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);              //menampilkan laman form edit barang AJAX
                    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);          //menyimpan perubahan data barang AJAX
                    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);         //menampilkan form confirm hapus data barang AJAX
                    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);       //menghapus data barang AJAX
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

