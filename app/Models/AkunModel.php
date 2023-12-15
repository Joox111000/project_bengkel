<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table            = 'akun';
    protected $allowedFields    = [
        'email',
        'password',
        'role_id',
    ];

    function dataLogin($email){
        return $this->db->table('akun as a')
        ->join('role as r','a.role_id = r.id')
        ->select('a.*, r.nama as namaRole')
        ->where('a.email',$email)
        ->get()
        ->getRowArray();
    }
    function dataLoginCustomer($email){
        return $this->db->table('akun as a')
        ->join('role as r','a.role_id = r.id')
        ->join('customer as c', 'c.akun_id = a.id')
        ->select('a.*, r.nama as namaRole, c.id as cusId, c.nama as cusNama, c.plat as cusPlat')
        ->where('a.email',$email)
        ->get()
        ->getRowArray();
    }

}
