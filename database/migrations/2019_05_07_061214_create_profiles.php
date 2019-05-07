<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // VARCHAR, NOT NULL
            $table->text('address')->nullable(); // TEXT, NULL
            $table->string('postcode', 5); // VARCHAR(5)
            $table->integer('age'); // INT
            $table->timestamps();
            $table->softDeletes(); // Delete row data tapi record masih ada..
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
