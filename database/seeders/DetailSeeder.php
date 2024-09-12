<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'detail_id' => 1,
                'penjualan_id' => 1,
                'barang_id' => 1, // buah apel
                'harga' => 2500,
                'jumlah' => 855
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 1,
                'barang_id' => 7, // handbody
                'harga' => 22900,
                'jumlah' => 2
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 1,
                'barang_id' => 11 , //sabun cuci piring
                'harga' => 10000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 4,
                'penjualan_id' => 2,
                'barang_id' => 11 , //sabun cuci piring
                'harga' => 10000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 2,
                'barang_id' => 15 , // buku
                'harga' => 13000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 2,
                'barang_id' => 9 , // shampo anak
                'harga' => 33000,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 7,
                'penjualan_id' => 3,
                'barang_id' => 3, // buncis
                'harga' => 10000,
                'jumlah' => 2
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 3,
                'barang_id' => 5, // tisu basah
                'harga' => 6900,
                'jumlah' => 10
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 3,
                'barang_id' => 6 , // shampoo anak
                'harga' => 15000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 10,
                'penjualan_id' => 4,
                'barang_id' => 8 , // deodorant
                'harga' => 13600,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 11,
                'penjualan_id' => 4,
                'barang_id' => 15 , // buku
                'harga' => 13000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 12,
                'penjualan_id' => 4,
                'barang_id' => 10 , // sapu
                'harga' => 17800,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 13,
                'penjualan_id' => 5,
                'barang_id' => 3, // buncis
                'harga' => 10000,
                'jumlah' => 2
            ],
            [
                'detail_id' => 14,
                'penjualan_id' => 5,
                'barang_id' => 5, // tisu basah
                'harga' => 6900,
                'jumlah' => 10
            ],
            [
                'detail_id' => 15,
                'penjualan_id' => 5,
                'barang_id' => 6 , // sahmpoo ank
                'harga' => 15000,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 16,
                'penjualan_id' => 6,
                'barang_id' => 8 , // deodorant
                'harga' => 13600,
                'jumlah' => 2,
            ],
            [
                'detail_id' => 17,
                'penjualan_id' => 6,
                'barang_id' => 15 , // buku
                'harga' => 13000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 18,
                'penjualan_id' => 6,
                'barang_id' => 10 , // saou
                'harga' => 17800,
                'jumlah' => 1,
            ],
            [
                'detail_id' => 19,
                'penjualan_id' => 7,
                'barang_id' => 4,  // Popok Bayi XL
                'harga' => 72500,
                'jumlah' => 1
            ],
            [
                'detail_id' => 20,
                'penjualan_id' => 7,
                'barang_id' => 5,  // Tisu Basah
                'harga' => 6900,
                'jumlah' => 5
            ],
            [
                'detail_id' => 21,
                'penjualan_id' => 7,
                'barang_id' => 6,  // Shampoo Anak
                'harga' => 15000,
                'jumlah' => 2
            ],
            [
                'detail_id' => 22,
                'penjualan_id' => 8,
                'barang_id' => 8,  // Deodorant
                'harga' => 13600,
                'jumlah' => 2
            ],
            [
                'detail_id' => 23,
                'penjualan_id' => 8,
                'barang_id' => 9,  // Parfume
                'harga' => 33000,
                'jumlah' => 1
            ],
            [
                'detail_id' => 24,
                'penjualan_id' => 8,
                'barang_id' => 12,  // Pisau 1 set
                'harga' => 413500,
                'jumlah' => 1
            ],
            [
                'detail_id' => 25,
                'penjualan_id' => 9,
                'barang_id' => 4,  // Popok Bayi XL
                'harga' => 72500,
                'jumlah' => 2
            ],
            [
                'detail_id' => 26,
                'penjualan_id' => 9,
                'barang_id' => 5,  // Tisu Basah
                'harga' => 6900,
                'jumlah' => 4
            ],
            [
                'detail_id' => 27,
                'penjualan_id' => 9,
                'barang_id' => 10,  // Sapu
                'harga' => 17800,
                'jumlah' => 3
            ],
            [
                'detail_id' => 28,
                'penjualan_id' => 10,
                'barang_id' => 11,  // Sabun Cuci Piring
                'harga' => 10000,
                'jumlah' => 2
            ],
            [
                'detail_id' => 29,
                'penjualan_id' => 10,
                'barang_id' => 13,  // Bolpoin 1 pak
                'harga' => 17000,
                'jumlah' => 3
            ],
            [
                'detail_id' => 30,
                'penjualan_id' => 10,
                'barang_id' => 15,  // Buku
                'harga' => 13000,
                'jumlah' => 2
            ],
        ];
        DB::table('t_penjualan_detail')->insert($data);
    }
}
