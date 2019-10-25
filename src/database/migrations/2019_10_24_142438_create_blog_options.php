<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('order_dir', ['ASC', 'DESC', 'random']);
            $table->enum('order_by', ['published_at', 'created_at', 'updated_at'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_options');
    }
}
