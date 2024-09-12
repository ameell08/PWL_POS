<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => "001",
                'kategori_nama' => 'Makanan Segar',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => "002",
                'kategori_nama' => 'Perlengkapan Bayi dan anak',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => "003",
                'kategori_nama' => 'Produk Kecantikan',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => '004',
                'kategori_nama' => 'Barang Rumah Tangga',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => '005',
                'kategori_nama' => 'Alat tulis dan kantor',
            ]
        ];
        DB::table('m_kategori')->insert($data);
    }
   
}
