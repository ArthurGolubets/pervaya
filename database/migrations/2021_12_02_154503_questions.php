<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name' )->nullable();
            $table->string('phone' )->nullable();
            $table->string('email' )->nullable();

            $table->mediumText('message' )->nullable();
            $table->boolean('is_moderated')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
