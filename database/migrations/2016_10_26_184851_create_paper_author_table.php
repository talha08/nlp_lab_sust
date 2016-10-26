<?php

//not use till now

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('paper_id')->unsigned()->index();
            $table->foreign('paper_id')->references('id')->on('paper')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paper_author');
    }
}
