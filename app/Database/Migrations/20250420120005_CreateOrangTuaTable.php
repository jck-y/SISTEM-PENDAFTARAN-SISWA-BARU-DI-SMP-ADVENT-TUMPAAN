<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrangTua extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_orangtua' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'alamat_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'alamat_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'telepon_hp' => [
                'type' => 'VARCHAR', // Diubah ke VARCHAR karena nomor telepon bisa mengandung karakter
                'constraint' => '20',
                'null' => false,
            ],
            'pekerjaan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'pekerjaan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'pendidikan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'pendidikan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'penghasilan_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'penghasilan_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_orangtua', true);
        $this->forge->addForeignKey('id_siswa', 'siswa', 'id_siswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orang_tua');
    }

    public function down()
    {
        $this->forge->dropTable('orang_tua');
    }
}