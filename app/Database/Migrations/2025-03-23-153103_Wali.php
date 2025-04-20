<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wali extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_wali' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'nama_ayah_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_ibu_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_ayah_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_ibu_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'telepon_hp' => [
                'type' => 'INT',
                'constraint' => 20,
            ],
            'pekerjaan_ayah_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pekerjaan_ibu_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pendidikan_ayah_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'pendidikan_ibu_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'penghasilan_ayah_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'penghasilan_ibu_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_wali', true);
        $this->forge->createTable('wali');
    }

    public function down()
    {
        $fields = [
            'penghasilan_ayah_wali' => [
                'type' => 'INT',
                'null' => true,
            ],
            'penghasilan_ibu_wali' => [
                'type' => 'INT',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('wali', $fields);
        $this->forge->dropTable('wali');
    }
}
