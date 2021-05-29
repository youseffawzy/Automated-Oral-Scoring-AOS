<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExamsDegreeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exams_degree', function(Blueprint $table)
		{
			$table->foreign('id_exam', 'fk_student_has_exam_exam1')->references('idexam')->on('exam')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_student', 'fk_student_has_exam_student1')->references('id')->on('student')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exams_degree', function(Blueprint $table)
		{
			$table->dropForeign('fk_student_has_exam_exam1');
			$table->dropForeign('fk_student_has_exam_student1');
		});
	}

}
