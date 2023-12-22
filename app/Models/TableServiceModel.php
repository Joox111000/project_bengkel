<?php

namespace App\Models;

use CodeIgniter\Model;

class TableServiceModel extends Model
{
    protected $table            = 'table_service';
    protected $allowedFields    = [
        'nama',
        'frekuensi',
        'barang_id'
    ];

    function allService(){
        return $this->db->table('table_service as t')
        ->select('t.nama as nama')
        ->get()
        ->getResultArray();
    }

    function getAll(){
        return $this->db->table('table_service as t')
        ->join('barang as b','t.barang_id = b.id')
        ->select('t.*, b.nama as bNama')
        ->get()->getResultArray();
    }

    function getServiceId($nama){
        return $this->db->table('table_service as t')
        ->where('t.nama',$nama)
        ->select('t.id')
        ->get()->getRowArray();
    }

    function jumlahService()
    {
        return $this->db->table('table_service as t')
        ->select('COUNT(t.id)')
        ->get()->getRowArray();
    }
}
