<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programm_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exercise_id')->comment = "Таблица ProgrammExercive";
            $table->boolean('status')->default(1)->comment = "Выходной = 0";
            $table->integer('programm_day_id')->comment = "Таблица ProgrammDay";
            $table->string('description')->nullable()->comment = "Описание";
            $table->timestamp('time_exercive')->nullable()->comment = "Время выполнения";
            $table->integer('repeat_count')->nullable()->comment = "Колличество повторений";
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
        Schema::dropIfExists('programm_stages');
    }
}
