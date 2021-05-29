<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeachTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teach', function(Blueprint $table)
		{
			$table->foreign('course_code', 'fk_course_has_doctor_course1')->references('code')->on('course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_course_has_doctor_doctor1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teach', function(Blueprint $table)
		{
			$table->dropForeign('fk_course_has_doctor_course1');
			$table->dropForeign('fk_course_has_doctor_doctor1');
		});
	}

}
