<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableChaptersUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'int',
			],
			'anime_id' => [
				'type' => 'int',
				'null' => false
			],
			'user_id' => [
				'type' => 'int',
				'null' => false
			]
		]);

		$this->forge->addKey('id');
		$this->forge->createTable('chapter_user');
	}

	public function down()
	{
		$this->forge->dropTable('chapter_user');
	}
}
