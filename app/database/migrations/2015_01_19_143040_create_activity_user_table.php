<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_user', function(Blueprint $table)
		{
			$table->integer('activity_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
		
		Schema::table('activity_user', function(Blueprint $table)
		{
			$table->foreign('activity_id')->references('id')->on('activities');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('activity_user', function(Blueprint $table)
		{
			Schema::drop('activity_user');
		});
	}

}
