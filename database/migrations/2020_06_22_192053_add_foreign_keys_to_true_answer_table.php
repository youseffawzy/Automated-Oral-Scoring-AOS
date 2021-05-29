<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTrueAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('true_answer', function(Blueprint $table)
		{
			$table->foreign('question_id', 'fk_true_answer_question1')->references('id')->on('question')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('true_answer', function(Blueprint $table)
		{
			$table->dropForeign('fk_true_answer_question1');
		});
	}

}
