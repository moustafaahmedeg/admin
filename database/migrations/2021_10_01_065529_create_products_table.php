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
            $table->bigIncrements('id');
            $table->string('name_ar', 150)->unique('product_ar');
            $table->string('name_en', 150)->unique('product_en');
            $table->decimal('price', 10, 3)->unsigned();
            $table->integer('quantity');
            $table->string('photo', 100);
            $table->string('detials_ar', 500);
            $table->string('detials_en', 500);
            $table->boolean('status')->default(false);
            $table->unsignedTinyInteger('subcategory_id')->index('subcategory_id');
            $table->unsignedInteger('brand_id')->index('brand_id');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
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
