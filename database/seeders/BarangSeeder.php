<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 001,
                'barang_kode' => 'A001',
                'barang_nama' => 'Buah Apel',
                'harga_beli' => 2000,
                'harga_jual' => 2500
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 001,
                'barang_kode' => 'B001',
                'barang_nama' => 'Buah Kiwi',
                'harga_beli' => 4700,
                'harga_jual' => 5000
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 001,
                'barang_kode' => 'C001',
                'barang_nama' => 'Buncis',
                'harga_beli' => 9000,
                'harga_jual' => 10000
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 002,
                'barang_kode' => 'A002',
                'barang_nama' => 'Popok Bayi XL',
                'harga_beli' => 70000,
                'harga_jual' => 72500
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 002,
                'barang_kode' => 'B002',
                'barang_nama' => 'Tisu Basah',
                'harga_beli' => 5000,
                'harga_jual' => 6900
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 002,
                'barang_kode' => 'C002',
                'barang_nama' => 'Shampoo Anak',
                'harga_beli' => 13800,
                'harga_jual' => 15000
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 003,
                'barang_kode' => 'A003',
                'barang_nama' => 'Handbody',
                'harga_beli' => 22000,
                'harga_jual' => 22900
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 003,
                'barang_kode' => 'B003',
                'barang_nama' => 'Deodorant',
                'harga_beli' => 12000,
                'harga_jual' => 13600
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 003,
                'barang_kode' => 'C003',
                'barang_nama' => 'Parfume',
                'harga_beli' => 31000,
                'harga_jual' => 33000
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 004,
                'barang_kode' => 'A004',
                'barang_nama' => 'Sapu',
                'harga_beli' => 17000,
                'harga_jual' => 17800
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 004,
                'barang_kode' => 'B004',
                'barang_nama' => 'Sabun Cuci Piring',
                'harga_beli' => 9500,
                'harga_jual' => 10000
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 004,
                'barang_kode' => 'C004',
                'barang_nama' => 'Pisau 1 set',
                'harga_beli' => 412000,
                'harga_jual' => 413500
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 005,
                'barang_kode' => 'A005',
                'barang_nama' => 'Bolpoin 1 pak',
                'harga_beli' => 16700,
                'harga_jual' => 17000
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 005,
                'barang_kode' => 'B005',
                'barang_nama' => 'Penggaris',
                'harga_beli' => 2000,
                'harga_jual' => 2500
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 005,
                'barang_kode' => 'C005',
                'barang_nama' => 'Buku',
                'harga_beli' => 12000,
                'harga_jual' => 13000
            ]
        ];
        DB::table('m_barang')->insert($data);
    }
}
