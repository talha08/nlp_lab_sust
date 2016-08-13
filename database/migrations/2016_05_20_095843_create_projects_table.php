<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_title')->nullable();
            $table->text('project_details')->nullable();
            $table->boolean('project_status')->default(1); //1 mean running project, 0 Complete
            $table->text('project_url')->nullable();
            $table->text('project_language')->nullable();
            $table->string('project_image')->default('/upload/default/big.jpg');
            $table->string('project_meta_data')->unique();
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
        Schema::drop('projects');
    }
}
