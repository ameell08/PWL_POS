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
        // $user = UserModel::where('username', 'manager')->firstOrFail();
        // return view('user',['data' => $user]);

        /**count */
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
        // return view('user',['data' => $user]);

        /**firstOrCreate */
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view ('user', ['data'=>$user]);

        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view ('user', ['data'=>$user]);

        /**firstOrNew */
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view ('user', ['data'=>$user]);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user->save();
        
        // return view ('user', ['data'=>$user]);

        /**Attribute Changes */
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        
        // $user->username = 'manager56';
        
        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true
        
        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama', 'username'); // false
        
        // $user->save();
        
        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());

        /** Was Changed */
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        
        // $user->username = 'manager12';
        
        // $user->save();
        
        // $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama'); // false
        // dd($user->wasChanged(['nama', 'username'])); // true
        
        /** CRUD */
    //     $user = UserModel::all();
    //     return view('user',['data'=> $user]);
    //     }
        
    //     public function tambah()
    //     {
    //         return view('user_tambah');
    //     }
    
    //     public function tambah_simpan(Request $request)
    //     {
    //         UserModel::create([
    //             'username'=> $request->username,
    //             'nama'=> $request->nama,
    //             'password'=> Hash::make('$request->password'),
    //             'level_id'=> $request->level_id
    //     ]);

    //     return redirect('/user');
    //     }

    // //UPDATE
    // public  function ubah($id){
    //     $user = UserModel::find($id);
    //     return view ('user_ubah',['data' => $user]);
    // }
    
    // public function ubah_simpan(Request $request) {
    //     $user = UserModel::find($request->id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make($request->password);
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }

    // //DELETE
    // public function hapus($id){
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    
    /** BelongsTo */
    // $user = UserModel::with('level')->get();
    // dd($user);

    $user = UserModel::with('level')->get();
    return view('user', ['data' =>$user]);
    }
}