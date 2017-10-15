<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTimeInProgramm extends Migration
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
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->integer('time_exercive')->nullable()->comment = "Время выполнения";
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
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->timestamp('time_exercive')->nullable()->comment = "Время выполнения";
        });
    }
}
