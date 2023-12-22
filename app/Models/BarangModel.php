<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $allowedFields    = [
        'nama',
        'merk',
        'tipe',
    ];

    function allBarang(){
        return $this->db->table('barang as k')
        ->select('COUNT(k.id)')
        ->get()->getRowArray();
    }
}
