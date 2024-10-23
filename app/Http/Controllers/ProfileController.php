<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $activeMenu = 'profile';
        $breadcrumb = (object) [
            'title' => 'Profile',
            'list' => ['Home', 'Profile']
        ];

        $user = Auth::user();
        return view('profile.index', [
            'activeMenu' => $activeMenu,
            'breadcrumb' => $breadcrumb,
            'user' => $user
        ]);
    }

    public function edit_ajax(Request $request)
    {
        if ($request->ajax()) {
            $user = Auth::user();
            $levels = ['admin' => 'Admin', 'user' => 'User']; // Adjust based on your needs
            return view('profile.edit_ajax', [
                'user' => $user,
                'levels' => $levels
            ])->render();
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid request'
        ]);
    }

    public function update_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            try {
                $user = User::find(Auth::id());

                if (!$user) {
                    return response()->json([
                        'status' => false,
                        'message' => 'User tidak ditemukan'
                    ]);
                }

                $rules = [
                    'username' => 'required|string|min:3|max:20|unique:m_user,username,' . $user->user_id . ',user_id',
                    'nama' => 'required|string|max:100',
                    'level' => 'required|in:admin,user',
                    'password' => 'nullable|min:6|max:20',
                    'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Validasi Gagal',
                        'msgField' => $validator->errors(),
                    ]);
                }

                // Update basic info
                $user->username = $request->username;
                $user->nama = $request->nama;
                $user->level = $request->level;

                // Update password if provided
                if ($request->filled('password')) {
                    $user->password = Hash::make($request->password);
                }

                // Handle photo upload
                if ($request->hasFile('photo')) {
                    // Delete old photo if exists
                    if ($user->photo && Storage::exists('public/profile_photos/' . $user->photo)) {
                        Storage::delete('public/profile_photos/' . $user->photo);
                    }

                    $photo = $request->file('photo');
                    $photoName = time() . '_' . $user->username . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('public/profile_photos', $photoName);
                    $user->photo = $photoName;
                }

                if (!$user->save()) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Gagal menyimpan perubahan'
                    ]);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Profile berhasil diupdate'
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid request'
        ]);
    }

    public function show_ajax(Request $request)
    {
        if ($request->ajax()) {
            $user = Auth::user();
            return view('profile.show_ajax', ['user' => $user])->render();
        }
        return response()->json([
            'status' => false,
            'message' => 'Invalid request'
        ]);
    }
}