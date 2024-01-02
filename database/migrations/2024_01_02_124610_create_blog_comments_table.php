<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
               $table-> increments('id');
            $table->integer('blog_id')->comment("1 => image, 2 => pdf, 3 => docs");
            $table->string('name', 150);
            $table->string('email', 200);
            $table->text('comment');
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(0)->comment("1 => 'Active', 0 => 'Inactive'");
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
        Schema::dropIfExists('blog_comments');
    }
}
