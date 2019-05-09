<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id'); // INT UNSIGNED
            $table->string('title'); // VARCHAR
            $table->text('content'); // TEXT/textarea
            $table->string('image')->nullable();
            $table->date('date');
            $table->timestamp('publish_date');
            $table->timestamps();

            // Add foreign key
            // foreign('nama field fk')->references('field name pk')->on('lookup table')
            $table->foreign('category_id')->references('id')->on('categories');
        });

        // Pivot Table
        Schema::create('post_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
