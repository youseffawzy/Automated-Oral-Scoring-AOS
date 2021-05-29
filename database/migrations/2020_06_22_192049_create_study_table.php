<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('study', function(Blueprint $table)
		{
			$table->integer('id_student')->index('fk_student_has_course_student_idx');
			$table->integer('course_code')->index('fk_student_has_course_course1_idx');
			$table->string('status', 45)->nullable();
			$table->primary(['id_student','course_code']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('study');
	}

}
