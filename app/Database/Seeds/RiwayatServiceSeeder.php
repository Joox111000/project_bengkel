<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RiwayatServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'table_service_id'    => '1',
                'customer_id' => 1,
                'nama_mekanik'  => "sandi",
                'nama_admin'  => "sandyy",
                'total_biaya'  => 100000,
            ]
        ];
    
        $this->db->table('riwayat_service')->insertBatch($data);
    }
}
