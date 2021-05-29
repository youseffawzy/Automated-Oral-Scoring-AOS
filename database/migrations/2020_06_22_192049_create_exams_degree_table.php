<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamsDegreeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams_degree', function(Blueprint $table)
		{
			$table->integer('id_student')->index('fk_student_has_exam_student1_idx');
			$table->integer('id_exam')->index('fk_student_has_exam_exam1_idx');
			$table->integer('degree_student')->nullable();
			$table->primary(['id_student','id_exam']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exams_degree');
	}

}
