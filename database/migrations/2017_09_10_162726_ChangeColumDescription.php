<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programm_days', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('programm_days', function (Blueprint $table) {
            $table->longText('description')->nullable()->comment = "Описание";
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
            $table->dropColumn('description');
        });

        Schema::table('programm_days', function (Blueprint $table) {
            $table->string('description')->nullable()->comment = "Описание";
        });
    }
}
