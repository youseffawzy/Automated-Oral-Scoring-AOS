<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMatchStudentAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('match_student_answer', function(Blueprint $table)
		{
			$table->foreign('match_answers_id', 'fk_match_student_answer_student_answer_match1')->references('id')->on('match_answers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('match_student_answer', function(Blueprint $table)
		{
			$table->dropForeign('fk_match_student_answer_student_answer_match1');
		});
	}

}
