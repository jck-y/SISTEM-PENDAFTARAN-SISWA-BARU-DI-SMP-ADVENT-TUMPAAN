<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKepalaSekolahTable extends Migration
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
        $this->forge->createTable('kepala_sekolah');

        $this->db->table('kepala_sekolah')->insert([
            'username' => 'kepsek',
            'password' => '123', 
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('kepala_sekolah');
    }
}