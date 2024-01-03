<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 155);
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status', 50)->default('0')->comment("0=> PENDING,1=> SUCCESS,   2=>FAILURE");
            $table->text('payment_json')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->mediumText('transaction_dt')->nullable();
            $table->integer('status')->default(0)->comment("0: inCart  1: Compeletd");
            $table->string('payment_token')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
