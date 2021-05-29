<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToActualAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actual_answer', function(Blueprint $table)
		{
			$table->foreign('Answers_id_answer', 'fk_actual answer_Answers1')->references('id_answer')->on('answers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('actual_answer', function(Blueprint $table)
		{
			$table->dropForeign('fk_actual answer_Answers1');
		});
	}

}
