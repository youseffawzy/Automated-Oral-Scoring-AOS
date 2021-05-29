<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMakeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('make', function(Blueprint $table)
		{
			$table->integer('exam_idexam')->index('fk_exam_has_doctor_exam1_idx');
			$table->integer('users_id')->index('fk_exam_has_doctor_doctor1_idx');
			$table->primary(['exam_idexam','users_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('make');
	}

}
