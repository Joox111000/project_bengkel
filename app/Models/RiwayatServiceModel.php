<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatServiceModel extends Model
{
    protected $table            = 'riwayat_service';
    protected $allowedFields    = [
        'table_service_id',
        'customer_id',
        'nama_mekanik',
        'nama_admin',
        'total_biaya',
        'keluhan',
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = null;
    function cariRiwayatByCustomer($id){
        return $this->db->table('riwayat_service as r')
        ->join('customer as c', 'c.id = r.customer_id')
        ->where('c.id', $id)
        ->select('r.*, c.nama as nama, c.plat as plat,c.jenis as jenis,c.cc as cc, c.telepon as telepon')
        ->orderBy('r.created_at','DESC')
        ->get()->getResultArray();
    }

    function semuaRiwayat(){
        return $this->db->table('riwayat_service as r')
        ->join('customer as c', 'c.id = r.customer_id')
        ->select('r.*, c.nama as cusNama, c.id as cusId,c.plat as cusPlat')
        ->orderBy('r.created_at','DESC')
        ->get()
        ->getResultArray();
    }
}
