<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatService extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'table_service_id' => [
                'type' => 'VARCHAR',
                'constraint' => "50",
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_mekanik' => [
                'type' => 'VARCHAR',
                'constraint' => "50",
            ],
            'nama_admin' => [
                'type' => 'VARCHAR',
                'constraint' => "50",
            ],
            'total_biaya' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'keluhan' => [
                'type' => 'TEXT',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id','customer','id');
        $this->forge->createTable('riwayat_service');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_service');
    }
}
