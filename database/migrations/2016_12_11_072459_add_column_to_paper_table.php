<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper', function (Blueprint $table) {
            $table->string('paper_cite')->nullable();
            $table->text('publication_name')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper', function (Blueprint $table) {
             Schema::drop('paper');
        });
    }
}
