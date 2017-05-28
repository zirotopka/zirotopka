<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammExercivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programm_exercives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable()->comment = "Ключ";
            $table->string('name')->comment = "Название";
            $table->string('description')->nullable()->comment = "Описание";

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
        Schema::dropIfExists('programm_exercives');
    }
}
