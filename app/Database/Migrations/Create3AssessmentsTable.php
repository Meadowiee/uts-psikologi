<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Create3AssessmentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'         => ['type' => 'CHAR', 'constraint' => 36],
            'age'             => ['type' => 'INT', 'constraint' => 10],
            'score_test'      => ['type' => 'INT', 'constraint' => 10],
            'score_rw'        => ['type' => 'INT', 'constraint' => 10],
            'age_category'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'result_category' => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'      => ['type' => 'DATETIME'],
            'updated_at'      => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('assessments');
    }

    public function down()
    {
        $this->forge->dropTable('assessments');
    }
}
