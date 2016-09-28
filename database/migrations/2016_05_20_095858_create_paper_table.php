<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_title')->nullable();
            $table->text('paper_details')->nullable();
            $table->text('paper_view')->nullable();
            $table->text('paper_url')->nullable();
            $table->text('paper_type')->nullable();
            $table->string('paper_publish_date')->nullable();
            $table->text('paper_pdf')->nullable();
            $table->string('paper_meta_data')->unique();
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
        Schema::drop('paper');
    }
}
