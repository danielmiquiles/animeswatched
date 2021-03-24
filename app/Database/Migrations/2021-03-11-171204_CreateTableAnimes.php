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
			],
			'name' => [
				'type' => 'varchar',
				'constraint' => 100,
				'null' => false,
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
                'type' => 'timestamp',
                'null' => true,
            ],
        'created_at timestamp default CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id');
        $this->forge->createTable('animes');
	}

	public function down()
	{
		$this->forge->dropTable('animes');
	}
}
