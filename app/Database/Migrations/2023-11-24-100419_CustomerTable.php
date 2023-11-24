<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomerTable extends Migration
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
            'plat' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'cc' => [
                'type' => 'int',
                'constraint' => '5',
            ],
            'akun_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('akun_id','akun','id');
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
