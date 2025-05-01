<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'nama_panggilan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'nomor_induk' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
                'null' => false,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'anak_ke' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'status_anak' => [
                'type' => 'ENUM',
                'constraint' => ['Anak Kandung', 'Anak Angkat', 'Lainnya'],
                'null' => false,
            ],
            'alamat_siswa' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'telepon_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ],
            'nama_tk_asal' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'alamat_tk_asal' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'diproses',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'kk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'raport' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'akta' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'skl' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'id_login' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'nomor_induk_asal' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_siswa', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_login', 'users', 'id_user', 'SET NULL', 'SET NULL');
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}