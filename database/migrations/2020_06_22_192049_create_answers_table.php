<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->integer('id_answer', true);
			$table->integer('question_id')->index('fk_student_answer_question1_idx');
			$table->integer('id_student');
			$table->integer('id_exam');
			$table->index(['id_student','id_exam'], 'fk_Answers_exams_degree1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answers');
	}

}
