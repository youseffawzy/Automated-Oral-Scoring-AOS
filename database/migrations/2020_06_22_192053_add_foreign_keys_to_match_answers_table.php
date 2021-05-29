<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMatchAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('match_answers', function(Blueprint $table)
		{
			$table->foreign('match_true_answer_id_match', 'fk_match_answers_match_true_answer1')->references('id_match')->on('match_true_answer')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_student', 'fk_student_answer_match_exams degree1')->references('id_student')->on('exams_degree')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('match_answers', function(Blueprint $table)
		{
			$table->dropForeign('fk_match_answers_match_true_answer1');
			$table->dropForeign('fk_student_answer_match_exams degree1');
		});
	}

}
