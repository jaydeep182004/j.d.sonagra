<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("form", function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('email');
            $table->string('state');
            $table->string('gender');
            $table->string('hobbies');
            $table->string('image');
            $table->timestamps();
    });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     function down()
    {
        //
    }
    }
};
