<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
               $table-> increments('id');
            $table->string('title');
            $table->string('slug');
            $table->double('amount');
            $table->text('summery')->nullable();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('description');
            $table->integer('category_id');
            $table->boolean('is_active')->default(1)->comment("0 : inactive, 1 : active");
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
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
        Schema::dropIfExists('products');
    }
}
