<?php

namespace App\Models;

use CodeIgniter\Model;

class TableServiceModel extends Model
{
    protected $table            = 'table_service';
    protected $allowedFields    = [
        'nama',
        'frekuensi'
    ];
}
