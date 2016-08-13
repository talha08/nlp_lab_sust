<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('title');
            $table->text('details');
            $table->boolean('status')->default(0);
            $table->integer('views')->default(0);
            $table->integer('share')->default(0);
            $table->integer('like')->default(0);
            $table->string('tag'); //if use pivot table then hide it
            $table->string('image')->default('/upload/default/big.jpg');
            $table->string('img_thumbnail')->default('/upload/default/small.jpg');
            $table->string('meta_data')->unique();
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
        Schema::drop('blog');
    }
}
