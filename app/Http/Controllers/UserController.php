<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(){
    $breadcrumb = (object)[
        'title' => 'Daftar User',
        'list' => ['Home', 'User']
    ];

    $page = (object)[
        'title' => 'Daftar user yang terdaftar dalam sistem'
    ];

    $activeMenu = 'user'; //set menu yang sedang aktif

    $level = LevelModel::all();

    return view('user.index',['breadcrumb'=>$breadcrumb, 'page' => $page,'level' => $level, 'activeMenu'=>$activeMenu]);
    }
    //Ambil data user dalam bentuk json untuk datables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        /**Filter data user berdasarkan level_id */
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {  // menambahkan kolom aksi 
                $btn  = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
            ->make(true);
    }


    //Menampilkan halaman form tambah user
    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah user baru'
        ];
        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; //set menu yang sedang aktif
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    //Menyimpan data user baru
    public function store(Request $request){
        $request -> validate([
            //username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100', //nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'required|min:5', //pasword harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer'// level_id harus diisi dan berupa angka
        ]);
        UserModel::create([
            'username' => $request->username,
            'nama' => $request -> nama,
            'password' => bcrypt($request->password), //passwird dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);
        return redirect('/user') -> with('success', 'Data user berhasil disimpan');
    }
    //Menampilkan detail user
    public function show(String $id){
        $user = UserModel::with('level') -> find($id);
        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail user'
        ];
        $activeMenu = 'user'; //set menu yang sedang aktif
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page'=>$page, 'user'=>$user, 'activeMenu'=>$activeMenu]);
    }
    //Menampilkan halaman form edit user
    public function edit(string $id){
        $user = UserModel::find($id);
        $level = LevelModel::all();
        $breadcrumb = (object)[
            'title' => 'Edit user',
            'list' => ['Home', 'User', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit User'
        ];
        $activeMenu = 'user';
        return view ('user.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'user'=>$user, 'level'=>$level, 'activeMenu'=>$activeMenu]);
    }

    //Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);
        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success' . "data user berhasil diubah");
    }

    //Mengapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error','Data user tidak ditemukan');
        }

        try{
            userModel::destroy($id);

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/user')->with('error','Data yser gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
}
}
        
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

    // $user = UserModel::with('level')->get();
    // return view('user', ['data' =>$user]);

   
