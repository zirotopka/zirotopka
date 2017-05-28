<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programm_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day')->comment = "День";
            $table->boolean('status')->default(1)->comment = "Выходной = 0";
            $table->integer('programm_id')->comment = "Таблица Programm";
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
        Schema::dropIfExists('programm_days');
    }
}
