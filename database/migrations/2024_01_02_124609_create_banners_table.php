<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
               $table-> increments('id');
            $table->text('content')->nullable();
            $table->string('button_1_text', 200)->nullable();
            $table->string('button_1_url', 200)->nullable();
            $table->string('button_2_text', 200)->nullable();
            $table->string('button_2_url', 200)->nullable();
            $table->string('image', 250)->nullable();
            $table->boolean('is_active')->default(1)->comment("1 => Active, 0 => Inactive");
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
