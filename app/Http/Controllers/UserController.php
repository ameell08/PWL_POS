<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        /* Menambahkan data ke dalam m_level karena di dalam m_user terdapat FK dari m_level yaitu level_id, 
         sehingga ketika primary key dari tabel parent belum terisi maka tabel yang memiliki FK dari parent
         tidak terisi*/
        // $data = [
        //     'level_id' => 4,
        //     'level_kode' => 'SPV',
        //     'level_nama' => 'Supervisor',
            
        // ];
        // DB::table('m_level')-> insert($data);

        //Menambahkan data user dengan Eloquent Model
        // $data = [
        //     'username' => 'custmer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // Menambahkan data ke tabel m_user

        // update data
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'custmer-1')->update($data); // Mengupdate data user
        
        // mencoba mengakses model UserModel
        $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}