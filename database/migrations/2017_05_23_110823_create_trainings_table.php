<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programm_stage_id')->comment = "Таблица ProgrammStage";
            $table->boolean('user_id')->nullable();

            $table->boolean('is_moderator_check')->default(0)->comment = "Проверено ли модератором";
            $table->boolean('is_files_download')->default(0)->comment = "Загружены ли файлы";
            $table->date('current_client_date')->nullable()->comment = "Локальная дата загрузки";

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
        Schema::dropIfExists('trainings');
    }
}
