<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOperatorTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('operator');

        $this->db->table('operator')->insert([
            'username' => 'op',
            'password' => '123',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('operator');
    }
}