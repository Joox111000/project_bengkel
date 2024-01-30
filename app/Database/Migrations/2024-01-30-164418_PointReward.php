<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PointReward extends Migration
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
            'poin' => [
                'type'       => 'INT',
                'constraint' => 5,
                'default'   => 0
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id','customer','id', '', 'CASCADE');
        $this->forge->createTable('point_reward');
    }

    public function down()
    {
        $this->forge->dropTable('point_reward');
    }
}
