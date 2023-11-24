<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'    => 'Superadmin@gmail.com',
                'password' => sha1("123456"),
                'role_id'  => 1,
            ],
            [
                'email'    => 'user1@gmail.com',
                'password' => sha1("password123"),
                'role_id'  => 2,
            ],
        ];
    
        $this->db->table('akun')->insertBatch($data);
    }
}
