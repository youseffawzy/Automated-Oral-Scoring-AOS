<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->foreign('id_exam', 'fk_question_exam1')->references('idexam')->on('exam')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->dropForeign('fk_question_exam1');
		});
	}

}
