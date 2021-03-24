<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
				'type' => 'int',
                'auto_increment' => true
			],
            'name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false
            ],
            'email' => [
                'type' => 'varchar',
				'constraint' => '100',
                'null' => true,
            ],
            'password' => [
                'type' => 'text',
                'null' => true,
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        'created_at datetime default CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
