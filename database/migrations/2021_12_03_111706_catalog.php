<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Catalog extends Migration
{
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->mediumText('description')->nullable();

            $table->string('name')->nullable();
            $table->string('slug')->nullable();

            $table->string('avatar')->nullable();

            $table->integer('priority');

            \App\Utils\WithForeign::column($table,\App\Models\Catalog::class, 'parent_id', 'id', true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalog');
    }
}
