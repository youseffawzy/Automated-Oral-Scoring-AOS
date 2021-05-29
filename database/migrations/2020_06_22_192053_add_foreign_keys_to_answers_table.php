<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('answers', function(Blueprint $table)
		{
			$table->foreign('id_student', 'fk_Answers_exams_degree1')->references('id_student')->on('exams_degree')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('question_id', 'fk_student_answer_question1')->references('id')->on('question')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('answers', function(Blueprint $table)
		{
			$table->dropForeign('fk_Answers_exams_degree1');
			$table->dropForeign('fk_student_answer_question1');
		});
	}

}
