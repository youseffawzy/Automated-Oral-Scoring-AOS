<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('study', function(Blueprint $table)
		{
			$table->foreign('course_code', 'fk_student_has_course_course1')->references('code')->on('course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_student', 'fk_student_has_course_student')->references('id')->on('student')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('study', function(Blueprint $table)
		{
			$table->dropForeign('fk_student_has_course_course1');
			$table->dropForeign('fk_student_has_course_student');
		});
	}

}
