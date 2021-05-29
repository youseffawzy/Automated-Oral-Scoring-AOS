<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_answers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_student');
			$table->integer('id_exam');
			$table->integer('match_true_answer_id_match')->index('fk_match_answers_match_true_answer1_idx');
			$table->index(['id_student','id_exam'], 'fk_student_answer_match_examsdegree1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_answers');
	}

}
