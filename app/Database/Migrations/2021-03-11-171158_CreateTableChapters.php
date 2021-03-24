<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableChapters extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'int',
				'auto_increment' => true
			],
			'chapter_number' => [
				'type' => 'int',
				'null' => false
			],
			'anime_id'=>[
				'type' => 'int',
				'null' => false
			],
			'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
        'created_at datetime default CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id');
        $this->forge->createTable('chapters');
	}

	public function down()
	{
		$this->forge->dropTable('chapters');
	}
}
