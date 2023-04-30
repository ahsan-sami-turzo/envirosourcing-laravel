<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisterconcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisterconcerns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('company_cover_image')->nullable();
            $table->text('company_title_one')->nullable();
            $table->longText('company_description_one')->nullable();
            $table->text('company_title_two')->nullable();
            $table->longText('company_description_two')->nullable();
            $table->text('company_title_three')->nullable();
            $table->longText('company_description_three')->nullable();
            $table->text('company_title_four')->nullable();
            $table->longText('company_description_four')->nullable();
            $table->longText('address')->nullable();

            $table->string('slug')->nullable();
            $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('sisterconcerns');
    }
}
