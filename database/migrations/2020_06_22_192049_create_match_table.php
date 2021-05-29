<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match', function(Blueprint $table)
		{
			$table->integer('id_component', true);
			$table->string('priority', 45)->nullable();
			$table->integer('exam_idexam')->index('fk_match_exam1_idx');
			$table->string('name', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match');
	}

}
