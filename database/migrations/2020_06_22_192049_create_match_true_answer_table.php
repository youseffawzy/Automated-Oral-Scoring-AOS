<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchTrueAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_true_answer', function(Blueprint $table)
		{
			$table->string('question', 45)->nullable();
			$table->string('answer', 45)->nullable();
			$table->integer('id_match', true);
			$table->integer('component_id')->index('fk_match_true_answer_match1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_true_answer');
	}

}
