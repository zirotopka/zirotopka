<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id');
            $table->integer('stage_id');
            $table->integer('rating');
            $table->timestamp('current_client_date');
            $table->timestamps();
        });

        Schema::table('trainings', function (Blueprint $table) {
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
        Schema::dropIfExists('training_stages');

        Schema::table('trainings', function (Blueprint $table) {
            $table->integer('programm_stage_id')->nullable();
        });
    }
}
