<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('match', function(Blueprint $table)
		{
			$table->foreign('exam_idexam', 'fk_match_exam1')->references('idexam')->on('exam')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('match', function(Blueprint $table)
		{
			$table->dropForeign('fk_match_exam1');
		});
	}

}
