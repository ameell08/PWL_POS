<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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
    return view('welcome');
});

Route::get('/level', [LevelController::class,'index']);
Route::get('/kategori', [KategoriController::class,'index']);
Route::get('/user', [UserController::class, 'index']);
//insert
Route::get('/user/tambah',[UserController::class, 'tambah']);
Route::post('/user/tambah_simpan',[UserController::class, 'tambah_simpan']);
//update
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
//Delete
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix'=> 'user'], function(){
    Route::get('/', [UserController::class, 'index']);              //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);          //menampilkandata user dalam bentuk json untuk data tables
    Route::get('/create', [UserController::class, 'create']);       //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);             //menampilkan data user baru
    Route::get('/{id}', [UserController::class, 'show']);           // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);      // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);         // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);     // menghapus data user
});