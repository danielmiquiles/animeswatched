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
                'type' => 'timestamp',
                'null' => true,
            ],
        'created_at timestamp default CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id');
        $this->forge->createTable('chapters');
	}

	public function down()
	{
		$this->forge->dropTable('chapters');
	}
}
