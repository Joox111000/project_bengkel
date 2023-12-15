<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'injeksi',
                'frekuensi' => 6,
                'barang_id' =>1
            ],
            [
                'nama'    => 'rem',
                'frekuensi' => 1,
                'barang_id' =>1

            ],
        ];
    
        $this->db->table('table_service')->insertBatch($data);
    }
}
