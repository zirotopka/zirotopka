<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id');
            $table->string('text');
            $table->integer('sender_id');
        });

        Schema::create('message_to_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id');
            $table->integer('answer_id');
            $table->boolean('is_read')->default(0)->comment="Прочитано ли?";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_answers');

        Schema::dropIfExists('message_to_answers');
    }
}
