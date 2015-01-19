<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->increments('id');
			$table->string('name');
			$table->string('firstname');
			$table->string('username')->unique();
			$table->string('password');
			$table->boolean('loggedOnce');
			$table->string('email');
			$table->string('phone');
			$table->string('mobile');
			$table->string('fax');
			$table->string('address');
			$table->string('zipCode');
			$table->string('city');
			$table->rememberToken();
			$table->timestamps();
			$table->integer('group_id')->unsigned();
		});
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('group_id')->references('id')->on('groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}
