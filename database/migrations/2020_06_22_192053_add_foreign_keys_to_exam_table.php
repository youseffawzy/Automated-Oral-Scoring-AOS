<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exam', function(Blueprint $table)
		{
			$table->foreign('course_code', 'fk_exam_course1')->references('code')->on('course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exam', function(Blueprint $table)
		{
			$table->dropForeign('fk_exam_course1');
		});
	}

}
