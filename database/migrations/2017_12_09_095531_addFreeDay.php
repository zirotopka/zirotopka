<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFreeDay extends Migration
{
    public function up()
    {
        Schema::table('programm_days', function (Blueprint $table) { 
            $table->boolean('free_day')->nullable()->default(0); 
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
           $table->dropColumn('free_day'); 
        }); 
    }
}
