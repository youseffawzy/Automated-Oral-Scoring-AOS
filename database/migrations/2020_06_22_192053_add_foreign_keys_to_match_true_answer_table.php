<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMatchTrueAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('match_true_answer', function(Blueprint $table)
		{
			$table->foreign('component_id', 'fk_match_true_answer_match1')->references('id_component')->on('match')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('match_true_answer', function(Blueprint $table)
		{
			$table->dropForeign('fk_match_true_answer_match1');
		});
	}

}
