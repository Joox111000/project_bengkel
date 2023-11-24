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

}
