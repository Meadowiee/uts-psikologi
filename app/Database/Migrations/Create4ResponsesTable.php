<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Create4ResponsesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'assessment_id' => ['type' => 'CHAR', 'constraint' => 36],
            'question_id'   => ['type' => 'CHAR', 'constraint' => 36],
            'score'         => ['type' => 'TINYINT', 'constraint' => 1],
            'created_at'    => ['type' => 'DATETIME'],
            'updated_at'    => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('assessment_id', 'assessment', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('question_id', 'question', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('responses');
    }

    public function down()
    {
        $this->forge->dropTable('responses');
    }
}
