<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'    => 'Superadmin@gmail.com',
                'plat' => "B 1234 CDF",
                'jenis'  => "matic",
                'cc'  => 250,
                'akun_id'  => 2,
            ]
        ];
    
        $this->db->table('customer')->insertBatch($data);
    }
}
