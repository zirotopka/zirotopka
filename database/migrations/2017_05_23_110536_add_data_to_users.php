<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->nullable()->default(0);
            $table->boolean('is_programm_pay')->default(0)->comment = "Купил ли программу";
            $table->float('weight')->nullable()->comment = "Вес";
            $table->float('growth')->nullable()->comment = "Рост";
            $table->integer('age')->nullable()->comment = "Возраст";

            $table->boolean('sex')->default(0)->comment = "Пол (0 - м, 1 - ж)";
            $table->string('referer_code')->nullable()->comment = "Код реферала";
            $table->timestamp('start_training_day')->nullable()->comment = "Дата начала";
            $table->integer('current_day')->nullable()->comment = "Текущий день тренировок";

            $table->string('user_timezone')->nullable()->comment = "Временная зона";
            $table->string('user_ip')->nullable()->comment = "Ip юзера";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('status');
            $table->dropColumn('is_programm_pay');
            $table->dropColumn('weight');
            $table->dropColumn('growth');
            $table->dropColumn('age');

            $table->dropColumn('sex');
            $table->dropColumn('referer_code');
            $table->dropColumn('start_training_day');
            $table->dropColumn('current_day');
        });
    }
}
