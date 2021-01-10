<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('date');
            $table->string('title');
            $table->string('description');
            $table->string('icon');
            $table->unsignedBigInteger('group_id');
            $table->boolean('week');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('event_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
