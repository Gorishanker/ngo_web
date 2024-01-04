<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('hint')->nullable();
            $table->text('benefit')->nullable();
            $table->text('short_description')->nullable();
            $table->text('primary_description')->nullable();
            $table->text('secondary_description')->nullable();
            $table->string('image');
            $table->integer('target_amount');
            $table->bigInteger('price')->default(0);
            $table->integer('raise_amount')->default(0);
            $table->integer('total_rating')->default(0);
            $table->bigInteger('average_rating')->default(0);
            $table->boolean('is_active')->default(1)->comment("0 => Inactive, 1 => Active");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
