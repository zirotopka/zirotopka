<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFildsToDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programm_days', function (Blueprint $table) {
            $table->integer('lead_time')->nullable()->comment = "Время выполнения";
            $table->integer('difficult')->nullable()->comment = "Сложность";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programm_days', function (Blueprint $table) {
            $table->dropColumn('lead_time');
            $table->dropColumn('difficult');
        });
    }
}
