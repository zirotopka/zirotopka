<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDaysTarinsandelse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programms', function (Blueprint $table) {
            $table->integer('days');
            $table->integer('trainings');
            $table->integer('day_off');
            $table->integer('tasks');
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
    }
}
