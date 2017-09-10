<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepeatCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programm_stages', function (Blueprint $table) {
            $table->dropColumn('repeat_count');
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->string('repeat_count')->nullable()->comment = "Кол-во повторений";
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
            $table->dropColumn('repeat_count');
        });

        Schema::table('programm_stages', function (Blueprint $table) {
            $table->integer('repeat_count')->nullable()->comment = "Кол-во повторений";
        });
    }
}
