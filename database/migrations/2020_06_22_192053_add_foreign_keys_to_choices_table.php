<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('choices', function(Blueprint $table)
		{
			$table->foreign('question_id', 'fk_choices_question1')->references('id')->on('question')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('choices', function(Blueprint $table)
		{
			$table->dropForeign('fk_choices_question1');
		});
	}

}
