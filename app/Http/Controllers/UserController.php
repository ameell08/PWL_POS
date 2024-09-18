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
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'custmer-1')->update($data); // Mengupdate data user
        
        //Jobsheet 4
        /*menambahkan data baru */
        // $data =[
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama'=>'Manager 3',
        //     'password'=> Hash::make('12345')
        // ];
        // UserModel::create($data);

        // mencoba mengakses model UserModel
        // $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        /*find*/
        // $user = UserModel::find(1); 
        // return view('user', ['data' => $user]);

        /*where*/
        // $user = UserModel::firstWhere('level_id', 1)->first(); 
        // return view('user', ['data' => $user]);

        /*firstWhere*/
        // $user = UserModel::firstWhere('level_id', 1); 
        // return view('user', ['data' => $user]);

        /*findOr*/
        // $user = UserModel::findOr(1,['username', 'nama'], function (){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);  
        
        // $user = UserModel::findOr(20,['username', 'nama'], function (){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]); 
        
        /*findOrFail*/
        // $user = UserModel::findOrFail(1);
        // return view('user',['data' => $user]);

        /**firstOrFail */
        $user = UserModel::where('username', 'manager')->firstOrFail();
        return view('user',['data' => $user]);
    }
}