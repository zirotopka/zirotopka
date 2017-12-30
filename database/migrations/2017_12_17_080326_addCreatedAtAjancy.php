<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtAjancy extends Migration
{
    public function up()
    {
        Schema::table('adjancy_lists', function (Blueprint $table) { 
            $table->timestamps(); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adjancy_lists', function (Blueprint $table) { 
           $table->dropColumn('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
           $table->dropColumn('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));  
        }); 
    }
}
