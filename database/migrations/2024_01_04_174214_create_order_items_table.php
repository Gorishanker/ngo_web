<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 155);
            $table->bigInteger('order_id');
            $table->bigInteger('campagin_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->boolean('combo')->default(0)->comment("0 : no, 1 : Yes");
            $table->bigInteger('combo_id')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->timestamp('created_at')->nullable()->useCurrentOnUpdate();
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
        Schema::dropIfExists('order_items');
    }
}
