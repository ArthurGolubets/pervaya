<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatalogItem extends Migration
{
    public function up()
    {
        Schema::create('catalog_item', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('vendor_code')->nullable();

            $table->string('avatar')->nullable();

            \App\Utils\WithForeign::column($table, \App\Models\Catalog::class, 'catalog_id', 'id', true);
            \App\Utils\WithForeign::column($table, \App\Models\Vendor::class, 'vendor_id', 'id', true);

            $table->boolean('is_new')->default(0);
            $table->boolean('is_popular')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalog_item');
    }
}
