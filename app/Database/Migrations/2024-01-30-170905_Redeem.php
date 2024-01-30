<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Redeem extends Migration
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
            'reward' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'token' => [
                'type'  => 'VARCHAR',
                'constraint'    => '10'
            ],
            'point_digunakan'   => [
                'type'  => 'INT',
                'constraint'=> 5
            ],
            'point_reward_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'status'    => [
                'type'  => 'BOOLEAN',
                'default'=> 0
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('point_reward_id','point_reward','id', '', 'CASCADE');
        $this->forge->createTable('redeem');
    }

    public function down()
    {
        $this->forge->dropTable('redeem');
    }
}
