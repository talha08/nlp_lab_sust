<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('resource_name');
            $table->string('resource_author');
            $table->string('resource_type');
            $table->string('resource_view')->default(0);
            $table->text('resource_details');
            $table->string('resource_image')->default('/upload/default/resource.jpg');
            $table->string('resource_link1')->nullable();
            $table->string('resource_link2')->nullable();
            $table->string('resource_link3')->nullable();
            $table->string('resource_image_url')->nullable();

            $table->string('resource_meta_data')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::drop('resource');
    }
}
