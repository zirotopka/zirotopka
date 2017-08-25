<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLeadIme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   

        Schema::table('programm_days', function (Blueprint $table) {
            $table->dropColumn('lead_time');
        });

        Schema::table('programm_days', function (Blueprint $table) {
            $table->string('lead_time')->nullable();
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
            $table->integer('lead_time');
        });

        Schema::table('programm_days', function (Blueprint $table) {
            $table->dropColumn('lead_time')->nullable();
        });
    }
}
