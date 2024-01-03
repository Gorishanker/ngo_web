<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->bigInteger('payment_status')->default(0)->comment("0: Pending, 1:Success, 2:Failed");
            $table->string('donation_amount')->nullable();
            $table->string('donation_type')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city', 150)->nullable();
            $table->string('state', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('zipcode', 150)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile', 150)->nullable();
            $table->string('name_on_pan', 150)->nullable();
            $table->string('pan_number', 150)->nullable();
            $table->text('how_did_you_about_us')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
