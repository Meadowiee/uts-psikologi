<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Create1UsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'tanggal_lahir'  => ['type' => 'DATE', 'null' => true],
            'tempat_lahir'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'jenis_kelamin'  => ['type' => 'ENUM', 'constraint' => ['laki-laki', 'perempuan']],
            'email'          => ['type' => 'VARCHAR', 'constraint' => 50],
            'password'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at'     => ['type' => 'DATETIME'],
            'updated_at'     => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
