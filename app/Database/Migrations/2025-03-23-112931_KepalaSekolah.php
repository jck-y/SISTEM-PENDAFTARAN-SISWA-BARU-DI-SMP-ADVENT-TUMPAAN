<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KepalaSekolah extends Migration
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
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kepala_sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('kepala_sekolah');
    }
}
