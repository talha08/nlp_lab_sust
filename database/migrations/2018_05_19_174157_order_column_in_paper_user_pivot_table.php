<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderColumnInPaperUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper_user', function (Blueprint $table) {
            $table->integer('order')->nullable()->after('user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper_user', function (Blueprint $table) {
            Schema::drop('order');
        });
    }
}
