<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_id')->unsigned()->index();
            $table->string('paper_file')->nullable();
            $table->string('paper_file_title')->default('File');
            $table->foreign('paper_id')->references('id')->on('paper')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('paper_file');
    }
}
