<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        $rules = [
            'level_id'   => 'required|integer',
            'username' => 'required|string|min:3|max:10|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password'   => 'required|min:6',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $newReq = [
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password), // hash the password
        ];

        $user = UserModel::create($newReq);
        return response()->json($user, 201);
    }

    public function show(UserModel $user)
    {
        return UserModel::find($user);
    }

    public function update(Request $request, UserModel $user)
    {
        $user->update($request->all());
        return UserModel::find($user);
    }

    public function destroy(UserModel $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}