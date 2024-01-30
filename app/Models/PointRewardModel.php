<?php

namespace App\Models;

use CodeIgniter\Model;

class PointRewardModel extends Model
{
    protected $table            = 'point_reward';
    protected $allowedFields    = [
        'poin',
        'customer_id',
    ];

    function getCustomerPoint($cusId){
        return $this->db->table('point_reward as p')
        ->join('customer as c','p.customer_id = c.id')
        ->where('p.customer_id',$cusId)
        ->select('c.*, p.poin as poin')
        ->get()->getRowArray();
    }
}
