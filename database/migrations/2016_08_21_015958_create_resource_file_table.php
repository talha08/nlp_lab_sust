<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resource_id')->unsigned()->index();
            $table->string('resource_file')->nullable();
            $table->string('resource_file_title')->nullable();
            $table->foreign('resource_id')->references('id')->on('resource')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('resource_file');
    }
}
