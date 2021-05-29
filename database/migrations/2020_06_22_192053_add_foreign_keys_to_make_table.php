<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMakeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('make', function(Blueprint $table)
		{
			$table->foreign('users_id', 'fk_exam_has_doctor_doctor1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('exam_idexam', 'fk_exam_has_doctor_exam1')->references('idexam')->on('exam')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('make', function(Blueprint $table)
		{
			$table->dropForeign('fk_exam_has_doctor_doctor1');
			$table->dropForeign('fk_exam_has_doctor_exam1');
		});
	}

}
