<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                'unique' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
                'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['siswa', 'admin', 'kepsek', 'operator'],
                'default' => 'siswa',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, 
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, 
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');

        $this->db->table('users')->insert([
            'email' => 'user@example.com',
            'username' => 'user',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'role' => 'Siswa',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s'), 
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}