<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('programms', function (Blueprint $table) {
            $table->dropColumn('days');
            $table->dropColumn('trainings');
            $table->dropColumn('day_off');
            $table->dropColumn('tasks');
        });

        Schema::table('programms', function (Blueprint $table) {
            $table->integer('days')->default(0)->comment = "Дней";
            $table->integer('trainings')->default(0)->comment = "Обязательные тренировки";
            $table->integer('day_off')->default(0)->comment = "Выходной";
            $table->integer('tasks')->default(0)->comment = "Необязательные";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programms', function (Blueprint $table) {
            $table->dropColumn('days');
            $table->dropColumn('trainings');
            $table->dropColumn('day_off');
            $table->dropColumn('tasks');
        });

        Schema::table('programms', function (Blueprint $table) {
            $table->integer('days')->default(0)->comment = "Дней";
            $table->integer('trainings')->default(0)->comment = "Обязательные тренировки";
            $table->integer('day_off')->default(0)->comment = "Выходной";
            $table->integer('tasks')->default(0)->comment = "Необязательные";
        });
    }
}
