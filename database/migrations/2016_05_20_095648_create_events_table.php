<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
           // $table->integer('user_id')->unsigned()->index();
            $table->string('event_title')->nullable();
            $table->text('event_details')->nullable();
            $table->string('event_start')->nullable();
            $table->string('event_end')->nullable();
            $table->string('event_time')->nullable();
            $table->string('event_image')->default('/upload/default/big.jpg');
            $table->string('event_meta_data')->unique();
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::drop('events');
    }
}
