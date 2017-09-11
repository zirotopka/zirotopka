<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProgrammDescriptionType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programms', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('programms', function (Blueprint $table) {
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
        Schema::table('programms', function (Blueprint $table) {
            $table->dropColumn('descrtiption');
        });

        Schema::table('programms', function (Blueprint $table) {
            $table->longText('description')->nullable()->comment = "Описание";
        });
    }
}
