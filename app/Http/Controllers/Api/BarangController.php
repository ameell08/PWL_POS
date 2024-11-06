<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $rules = [
            'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'kategori_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public'); // Simpan di folder `public/uploads`
            $requestData = $request->all();
            $requestData['image'] = $path; // Tambahkan path gambar ke data request

            $barang = BarangModel::create($requestData);
            return response()->json($barang, 201);
        } else {
            return response()->json(['error' => 'File gambar tidak ditemukan'], 400);
        }
    }

    public function show(BarangModel $barang)
    {
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang)
    {
        $rules = [
            'barang_kode' => 'required|string|min:3|max:10|unique:m_barang,barang_kode,' . $barang->barang_id . ',barang_id',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'kategori_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $check = BarangModel::find($barang->barang_id);
        if ($check) {
            $check->update($request->all());
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($barang->image) {
                    Storage::disk('public')->delete($barang->image);
                }
                $file = $request->file('image');
                $path = $file->store('uploads', 'public');
                $requestData['image'] = $path;
            }

            $barang->updatw($requestData);
            $barang-> save();

            return response()->json($check);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
