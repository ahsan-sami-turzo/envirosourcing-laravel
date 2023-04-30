<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_us_image')->nullable();
            $table->string('title')->nullable();
            $table->string('why_choose_us_title')->nullable();
            $table->text('why_choose_us_subtitle')->nullable();
            $table->string('why_choose_us_background')->nullable();
            $table->integer('num_1')->nullable();
            $table->integer('num_2')->nullable();
            $table->integer('num_3')->nullable();
            $table->integer('num_4')->nullable();
            $table->integer('num_5')->nullable();
            $table->text('num_1_text')->nullable();
            $table->text('num_2_text')->nullable();
            $table->text('num_3_text')->nullable();
            $table->text('num_4_text')->nullable();
            $table->text('num_5_text')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('about');
    }
}
