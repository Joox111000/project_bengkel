<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'ban',
                'merk' => "swallow",
                'tipe'  => "80/90",
            ]
        ];
    
        $this->db->table('barang')->insertBatch($data);
    }
}
