<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->bigInteger('id', true)->unsigned();
			$table->integer('role_id');
			$table->string('name', 100);
			$table->string('contact_number')->nullable();
			$table->string('username', 150);
			$table->string('email', 150);
			$table->string('password');
			$table->string('image')->nullable();
            $table->integer('status')->default(1)->comment('1=Active, 0=InActive');
            $table->string('layout', 100)->default('vertical');
			$table->timestamps();
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
