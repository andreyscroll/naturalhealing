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
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('product_category_id')->unsigned();
            $table->string('brand')->nullable();
            $table->float('price')->nullable();
            $table->float('rating')->nullable();
            $table->string('img')->nullable();
            $table->float('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->text('description')->nullable();
            $table->text('structure')->nullable();
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_categories');
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
