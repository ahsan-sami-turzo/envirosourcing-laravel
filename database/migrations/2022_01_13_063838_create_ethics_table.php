<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEthicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ethics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title_one')->nullable();
            $table->text('title_two')->nullable();
            $table->text('title_three')->nullable();
            $table->text('title_four')->nullable();
            $table->longText('subtitle_one')->nullable();
            $table->longText('subtitle_two')->nullable();
            $table->longText('subtitle_three')->nullable();
            $table->string('ethics_image_one')->nullable();
            $table->string('ethics_image_two')->nullable();
            $table->string('ethics_image_three')->nullable();
            $table->string('ethics_cover_image')->nullable();
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
        Schema::dropIfExists('ethics');
    }
}
