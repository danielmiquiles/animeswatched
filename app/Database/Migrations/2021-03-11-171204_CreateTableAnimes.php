<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAnimes extends Migration
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
				'constraint' => 100,
				'null' => false,
			],
			'description' => [
				'type' => 'text',
				'null' => true,
			],
			'year' => [
				'type' => 'varchar',
				'constraint' => 100,
				'null' => false,
			],
			'url_image' => [
				'type' => 'varchar',
				'constraint' => 100,
				'null' => true,
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        'created_at datetime default CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id');
        $this->forge->createTable('animes');
	}

	public function down()
	{
		$this->forge->dropTable('animes');
	}
}
