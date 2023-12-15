<?php

namespace App\Models;

use CodeIgniter\Model;

class KritikModel extends Model
{
    protected $table            = 'kritik';
    protected $allowedFields    = [
        'customer_id',
        'pesan'
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = null;

    function getKritik(){
        return $this->db->table('kritik as k')
        ->join('customer as c','c.id = k.customer_id')
        ->select('k.*, c.nama as nama')
        ->orderBy('k.created_at', 'DESC')
        ->get()->getResultArray();
    }
}
