<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('fname', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('password', 45)->nullable();
			$table->string('sex', 45)->nullable();
			$table->string('photo')->nullable();
			$table->string('phone', 45)->nullable();
			$table->integer('level')->nullable();
			$table->float('GPA', 10, 0)->nullable();
			$table->integer('program_idprogram')->index('fk_student_program1_idx');
			$table->string('mname', 45)->nullable();
			$table->string('lname', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student');
	}

}
