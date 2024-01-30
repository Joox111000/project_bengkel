<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'    => 'mekanik@gmail.com',
                'password' => sha1("123456"),
                'role_id'  => 3,
            ],
        ];
    
        $this->db->table('akun')->insertBatch($data);
    }
}
