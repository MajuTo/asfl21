<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partners', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('partnerName')->unique();
			$table->string('logo')->nullable();
			$table->string('contact')->nullable();
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
		Schema::table('partners', function(Blueprint $table)
		{
			Schema::drop('partners');
		});
	}

}
