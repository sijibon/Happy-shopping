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
            $table->id();
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_slug');
            $table->integer('product_quantity');
            $table->double('product_price');
            $table->text('product_title');
            $table->text('product_details');
            $table->text('product_image1');
            $table->text('product_image2');
            $table->text('product_image3');
            $table->integer('product_status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
