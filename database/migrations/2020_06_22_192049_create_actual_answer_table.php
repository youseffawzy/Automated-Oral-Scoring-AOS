<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActualAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actual_answer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('student_answer', 45)->nullable();
			$table->integer('Answers_id_answer')->index('fk_actualanswer_Answers1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actual_answer');
	}

}
