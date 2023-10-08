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
            $table->string('name',255);
            $table->string('barcode',50)->nullable();
            $table->decimal('cost',10,2)->default(0);
            $table->decimal('price',10,2)->default(0);
            $table->integer('stock');
            $table->integer('alerts');
            $table->string('image',100)->nullable();


            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('mark_id');
            $table->foreign('mark_id')->references('id')->on('marks');

            $table->unsignedBigInteger('industry_id');
            $table->foreign('industry_id')->references('id')->on('industries');

            $table->unsignedBigInteger('modelies_id');
            $table->foreign('modelies_id')->references('id')->on('modelies');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('texture_color_id');
            $table->foreign('texture_color_id')->references('id')->on('texture__colors');

            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->unsignedBigInteger('plant_color_id');
            $table->foreign('plant_color_id')->references('id')->on('plant__colors');

            $table->unsignedBigInteger('sole_color_id');
            $table->foreign('sole_color_id')->references('id')->on('sole__colors');

            $table->unsignedBigInteger('sole__types_id');
            $table->foreign('sole__types_id')->references('id')->on('sole__types');

            $table->unsignedBigInteger('covering__types_id');
            $table->foreign('covering__types_id')->references('id')->on('covering__types');

            $table->unsignedBigInteger('covering_material_id');
            $table->foreign('covering_material_id')->references('id')->on('covering__materials');
            
            // $table->unsignedBigInteger('model_id');
            // $table->foreign('model_id')->references('id')->on('models');


            // $table->unsignedBigInteger('plant_id');
            // $table->foreign('plant_id')->references('id')->on('plants');


            // $table->unsignedBigInteger('sole_material_id');
            // $table->foreign('sole_material_id')->references('id')->on('sole__materials');

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
