<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('program', function(Blueprint $table)
		{
			$table->foreign('id_department', 'fk_program_department1')->references('id')->on('department')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('program', function(Blueprint $table)
		{
			$table->dropForeign('fk_program_department1');
		});
	}

}
