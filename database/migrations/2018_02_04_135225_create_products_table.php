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
            $table->string('productName');
            $table->integer('subCategoryId');
            $table->integer('manufacturerId');
            $table->float('productPrice', 10,2);
            $table->integer('productQuantity');
            $table->string('productPerimeter');
            $table->text('productDescription');
            $table->text('productImage');
            $table->tinyInteger('publicationStatus');
            $table->tinyInteger('discountFlag');
            $table->integer('productDiscount');
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
