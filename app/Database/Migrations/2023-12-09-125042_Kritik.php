<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kritik extends Migration
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
            'pesan' => [
                'type' => 'TEXT',
            ],
            
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id','customer','id');
        $this->forge->createTable('kritik');
    }

    public function down()
    {
        $this->forge->dropTable('kritik');
    }
}
