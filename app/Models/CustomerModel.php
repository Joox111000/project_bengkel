<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer';
    protected $allowedFields    = [
        'nama',
        'plat',
        'jenis',
        'cc',
        'akun_id'
    ];

    function allData(){
        return $this->db->table('customer as c')
        ->join('akun as a', 'c.akun_id = a.id')
        ->where('a.role_id',2)
        ->select('c.*, a.email as email')
        ->get()->getResultArray();
    }
}
