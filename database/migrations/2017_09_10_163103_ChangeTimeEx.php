<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTimeEx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programm_stages', function (Blueprint $table) {
            $table->dropColumn('time_exercive');
            $table->dropColumn('exercise_id');
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->string('time_exercive')->nullable()->comment = "Время выполнения";
            $table->integer('exercise_id')->nullable()->comment = "Программа";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programm_stages', function (Blueprint $table) {
            $table->dropColumn('time_exercive');
            $table->dropColumn('exercise_id');
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->integer('time_exercive')->nullable()->comment = "Время выполнения";
            $table->integer('exercise_id')->nullable()->comment = "Программа";
        });
    }
}
