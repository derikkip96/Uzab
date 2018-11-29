<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('price')->unsigned()->nullable();
            $table->timestamps();
//
//            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
//
//            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
