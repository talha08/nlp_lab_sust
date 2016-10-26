<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOtherUserTable extends Migration
{
    public function up()
    {
        Schema::table('other_user', function(Blueprint $table)
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
        Schema::drop('other_user');
    }
}
