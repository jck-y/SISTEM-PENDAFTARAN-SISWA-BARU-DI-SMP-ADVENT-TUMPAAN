<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrangTua extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_orangtua' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon_hp' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'pekerjaan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pekerjaan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pendidikan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pendidikan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'penghasilan_ayah' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'penghasilan_ibu' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('id_orangtua', true);
        $this->forge->createTable('orang_tua');
    }

    public function down()
    {
        $this->forge->dropTable('orang_tua');
    }
}
