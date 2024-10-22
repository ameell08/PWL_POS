<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\LevelModel;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    // untuk yang belum punya akun
    public function register()
    {
        $levels = LevelModel::all(); // Mengambil semua level dari database
        return view('auth.register', compact('levels')); // Pass data level ke view
    }
    
    public function postRegister(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $request->validate([
                'username' => 'required|string|min:3|unique:m_user,username',
                'name' => 'required|string|max:100',
                'password' => 'required|min:5',
                'level_id'=>'required|integer',
            ]);
            // Buat user baru
            $user = UserModel::create([
                'username' => $request->username,
                'nama' => $request->name,
                'password' => bcrypt($request->password),
                'level_id' => $request->level_id
            ]);
            auth::login($user);
             // Respon sukses dengan redirect ke halaman yang diinginkan
            return response()->json([
                'status' => true,
                'message' => 'Register Berhasil',
                'redirect' => url('/login')
            ]);
        }
        return redirect('register');
    }
}