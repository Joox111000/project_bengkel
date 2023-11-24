<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [ 
                'nama'  => "admin",
            ],
            [ 
                'nama'  => "user",
            ],
        ];
    
        $this->db->table('role')->insertBatch($data);
    }
}
