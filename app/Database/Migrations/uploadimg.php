<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocumentsToSiswa extends Migration
{
    public function up()
    {
        $fields = [
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'raport' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'akta' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'skl' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ];
        $this->forge->addColumn('siswa', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('siswa', ['gambar', 'kk', 'raport', 'akta', 'skl']);
    }
}