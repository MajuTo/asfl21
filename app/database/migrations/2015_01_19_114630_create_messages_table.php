<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->timestamps();
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
		
		Schema::table('messages', function(Blueprint $table)
		{
			$table->foreign('category_id')->references('id')->on('categories');
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
		Schema::table('messages', function(Blueprint $table)
		{
			Schema::drop('messages');
		});
	}

}
