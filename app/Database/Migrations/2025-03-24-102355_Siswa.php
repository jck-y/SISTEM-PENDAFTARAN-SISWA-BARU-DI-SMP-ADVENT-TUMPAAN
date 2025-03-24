<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_panggilan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_induk' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'anak_ke' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status_anak' => [
                'type' => 'ENUM',
                'constraint' => ['Anak Kandung', 'Anak Angkat', 'Lainnya'],
            ],
            'alamat_siswa' => [
                'type' => 'TEXT',
            ],
            'telepon_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_tk_asal' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_tk_asal' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_siswa', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
