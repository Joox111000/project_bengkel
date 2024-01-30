<?php

namespace App\Models;

use CodeIgniter\Model;

class RedeemModel extends Model
{
    protected $table            = 'redeem';
    protected $allowedFields    = [
        'reward',
        'token',
        'point_digunakan',
        'point_reward_id',
        'status'
    ];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = null;

    function getDataByToken($token){
        return $this->db->table('redeem as r')
        ->where('token',$token)
        ->where('status',0)
        ->get()->getRowArray();
    }

    function getDataRedeem(){
        return $this->db->table('redeem as r')
        ->join('point_reward as p','r.point_reward_id = p.id')
        ->join('customer as s', 'p.customer_id = s.id')
        ->select('r.*, s.nama')
        ->orderBy('r.created_at','DESC')
        ->get()->getResultArray();
    }
}
