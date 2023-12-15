<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwalservice extends Migration
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
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'service_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date' => [
                'type' => 'DATE'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id', 'customer', 'id');
        $this->forge->addForeignKey('service_id', 'table_service', 'id');
        $this->forge->createTable('jadwal_service');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal_service');
    }
}
