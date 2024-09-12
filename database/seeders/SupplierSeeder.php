<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => '111',
                'supplier_nama' => 'Segar Super Indo',
                'supplier_alamat' => 'Malang',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => '222',
                'supplier_nama' => 'Nagata Mitra Perkasa',
                'supplier_alamat' => 'Sidoarjo',
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => '333',
                'supplier_nama' => 'Hip Lik Packaging Products Factory',
                'supplier_alamat' => 'Surabaya',
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
