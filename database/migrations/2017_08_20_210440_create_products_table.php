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
            $table->string('name');
            $table->string('sku')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('alias',100)->unique();
            $table->integer('price')->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('weight',15)->nullable();
            $table->boolean('control')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('sales')->nullable();
            $table->integer('sort')->default(1);
            $table->boolean('published')->default(true);

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->integer('manufacturer')->unsigned()->nullable();
            $table->foreign('manufacturer')->references('id')->on('manufacturers')->onDelete('set null');

            $table->integer('material')->unsigned()->nullable();
            $table->foreign('material')->references('id')->on('materials')->onDelete('set null');
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
