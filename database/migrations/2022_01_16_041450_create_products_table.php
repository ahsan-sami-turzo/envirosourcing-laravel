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
            $table->string('product_name')->nullable();
            $table->string('product_image')->nullable();
            $table->longText('product_description')->nullable();
            $table->foreignId('sisterconcern_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->on('categories')->index()->constrained()->cascadeOnDelete();
            $table->string('slug')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('status')->default(1);
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
