<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Create2QuestionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'question'   => ['type' => 'JSON'],
            'answer'     => ['type' => 'JSON'],
            'created_at' => ['type' => 'DATETIME'],
            'updated_at' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('questions');
    }

    public function down()
    {
        $this->forge->dropTable('questions');
    }
}
