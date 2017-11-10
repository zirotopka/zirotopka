<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayTobans extends Migration
{
    
    /** 
     * Run the migrations. 
     * 
     * @return void 
     */ 
    public function up() 
    { 
        Schema::table('bans', function (Blueprint $table) { 
            $table->dropColumn('programm_day_id'); 
            $table->dropColumn('programm_stage_id'); 
        }); 
    } 
 
    /** 
     * Reverse the migrations. 
     * 
     * @return void 
     */ 
    public function down() 
    { 
        Schema::table('bans', function (Blueprint $table) { 
            $table->integer('programm_day_id'); 
            $table->integer('programm_stage_id'); 
        }); 
    } 
}
