<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('program', function(Blueprint $table)
		{
			$table->integer('idprogram', true);
			$table->string('name', 45)->nullable();
			$table->integer('id_department')->index('fk_program_department1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('program');
	}

}
