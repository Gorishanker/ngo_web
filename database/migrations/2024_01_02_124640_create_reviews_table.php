<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
               $table-> increments('id');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('rating')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('campaign_id')->nullable();
            $table->bigInteger('status')->default(0)->comment("0 : pending, 1:approve, 2: decline");
            $table->text('review')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
