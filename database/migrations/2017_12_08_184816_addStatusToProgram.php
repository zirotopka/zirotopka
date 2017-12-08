<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToProgram extends Migration
{
    public function up()
    {
        Schema::table('programms', function (Blueprint $table) { 
            $table->boolean('status')->nullable()->default(0); 
            $table->string('logo')->nullable(); 
            $table->boolean('lite')->nullable()->default(0); 
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
           $table->dropColumn('lite'); 
           $table->dropColumn('status'); 
           $table->dropColumn('logo');
        }); 
    }
}
