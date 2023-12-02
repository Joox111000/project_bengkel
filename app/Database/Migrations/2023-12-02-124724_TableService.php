<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableService extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'frekuensi' => [
                'type' => 'int',
                'constraint' => 5,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('table_service');
    }

    public function down()
    {
        $this->forge->dropTable('table_service');
    }
}
