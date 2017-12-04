<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainingDate extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) { 
            $table->integer('deadline_at')->nullable(); 
            $table->integer('program_day_id')->nullable(); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) { 
            $table->dropColumn('deadline_at'); 
            $table->dropColumn('program_day_id'); 
        });
    }
}
