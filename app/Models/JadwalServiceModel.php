<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalServiceModel extends Model
{
    protected $table            = 'jadwal_service';
    protected $allowedFields    = [
        'customer_id',
        'service_id',
        'date',
    ];

    function findJadwalById($id){
        return $this->db->table('jadwal_service as j')
        ->join('customer as c','c.id = j.customer_id')
        ->join('table_service as t','t.id = j.service_id')
        ->select('j.*,c.id as cId,c.plat as cPlat,t.id as tId,t.nama as tNama')
        ->where('j.customer_id',$id)
        ->get()->getResultArray();
    }

    function findId($cusId,$serId){
        return $this->db->table('jadwal_service as j')
        ->join('table_service as t','t.id = j.service_id')
        ->where('j.customer_id',$cusId)
        ->where('j.service_id', $serId)
        ->select('j.*, t.frekuensi')
        ->get()->getRowArray();
    }
}
