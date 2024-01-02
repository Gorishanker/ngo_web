<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_docs', function (Blueprint $table) {
               $table-> increments('id');
            $table->boolean('type')->default(1)->comment("1 => pdf, 2 => doc, 3 => file");
            $table->integer('project_id');
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_docs');
    }
}
