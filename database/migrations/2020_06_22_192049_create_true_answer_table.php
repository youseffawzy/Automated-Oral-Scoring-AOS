<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrueAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('true_answer', function(Blueprint $table)
		{
			$table->integer('answer_id', true);
			$table->string('answer_text', 45)->nullable();
			$table->boolean('or')->nullable();
			$table->integer('question_id')->index('fk_true_answer_question1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('true_answer');
	}

}
