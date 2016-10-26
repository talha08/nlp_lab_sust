<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('teachers', function(Blueprint $table)
        {   $table->string('researchgate')->nullable();
            $table->string('academia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}
