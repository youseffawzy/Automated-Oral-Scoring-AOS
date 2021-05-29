<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('fname', 45)->nullable();
			$table->string('mname', 45)->nullable();
			$table->string('lname', 45)->nullable();
			$table->string('email', 45)->nullable()->unique();
			$table->string('password', 255)->nullable();
			$table->integer('phone')->nullable();
			$table->timestamp('email_verified_at')->nullable();
			$table->integer('id_department')->index('fk_doctor_department1_idx');
			$table->rememberToken();
			$table->string('role', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
