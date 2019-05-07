<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name')->default('');
			$table->string('address')->nullable();
			$table->string('zipCode')->nullable();
			$table->string('city')->nullable();
			$table->string('phone')->nullable();
			$table->boolean('hidePhone')->default(0);
			$table->string('fax')->nullable();
			$table->boolean('hideFax')->default(0);
			$table->text('description')->nullable()->default(null);
			$table->decimal('lat', 14, 10)->nullable();
			$table->decimal('lng', 14, 10)->nullable();
			$table->integer('user_id')->unsigned();
		});

		Schema::table('addresses', function(Blueprint $table)
		{
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
		Schema::drop('addresses');
	}

}
