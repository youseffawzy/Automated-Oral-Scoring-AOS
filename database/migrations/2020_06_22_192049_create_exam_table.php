<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam', function(Blueprint $table)
		{
			$table->integer('idexam', true);
			$table->integer('duration')->nullable();
			$table->dateTime('ex_start')->nullable();
			$table->dateTime('ex_end')->nullable();
			$table->string('name', 45)->nullable();
			$table->integer('degree')->nullable();
			$table->integer('num_of_mcq_e')->nullable();
			$table->integer('num_of_match_e')->nullable();
			$table->integer('num_of_complete_e')->nullable();
			$table->integer('course_code')->index('fk_exam_course1_idx');
			$table->integer('num_of_mcq_n')->nullable();
			$table->integer('num_of_mcq_h')->nullable();
			$table->integer('num_of_match_n')->nullable();
			$table->integer('num_of_match_h')->nullable();
			$table->integer('num_of_complete_n')->nullable();
			$table->integer('num_of_complete_h')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exam');
	}

}
