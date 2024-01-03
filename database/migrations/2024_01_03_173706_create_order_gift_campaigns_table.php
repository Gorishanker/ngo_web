<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGiftCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_gift_campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('campaign_id')->nullable();
            $table->string('occasion', 150)->nullable();
            $table->string('name', 155)->nullable();
            $table->string('email')->nullable();
            $table->string('from')->nullable();
            $table->string('title', 155)->nullable();
            $table->text('message')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('order_gift_campaigns');
    }
}
