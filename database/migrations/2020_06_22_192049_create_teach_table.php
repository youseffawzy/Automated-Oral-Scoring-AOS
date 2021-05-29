<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teach', function(Blueprint $table)
		{
			$table->integer('course_code')->index('fk_course_has_doctor_course1_idx');
			$table->integer('users_id')->index('fk_course_has_doctor_doctor1_idx');
			$table->primary(['course_code','users_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teach');
	}

}
