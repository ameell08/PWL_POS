<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Lili',
                'penjualan_kode' => 'R001',
                'penjualan_tanggal'=>'2024-08-26'
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Afif',
                'penjualan_kode' => 'R002',
                'penjualan_tanggal'=>'2024-08-26'
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Tama',
                'penjualan_kode' => 'R003',
                'penjualan_tanggal'=>'2024-08-26'
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Edgar',
                'penjualan_kode' => 'R004',
                'penjualan_tanggal'=>'2024-08-28'
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Louis',
                'penjualan_kode' => 'R005',
                'penjualan_tanggal'=>'2024-08-28'
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Sheerina',
                'penjualan_kode' => 'R006',
                'penjualan_tanggal'=>'2024-08-28'
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Ilham',
                'penjualan_kode' => 'R007',
                'penjualan_tanggal'=>'2024-08-29'
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Lian',
                'penjualan_kode' => 'R008',
                'penjualan_tanggal'=>'2024-08-29'
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Kevin',
                'penjualan_kode' => 'R009',
                'penjualan_tanggal'=>'2024-08-29'
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Stuart',
                'penjualan_kode' => 'R010',
                'penjualan_tanggal'=>'2024-08-29'
            ]
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
