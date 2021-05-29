<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchStudentAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_student_answer', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('student_answer', 45)->nullable();
			$table->integer('match_answers_id')->index('fk_match_student_answer_student_answer_match1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_student_answer');
	}

}
