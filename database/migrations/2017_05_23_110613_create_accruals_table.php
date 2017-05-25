<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccrualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accruals', function (Blueprint $table) {
            $table->increments('id');

            $table->float('sum')->nullable()->comment = "Сумма платежа";
            $table->integer('user_id')->nullable();
            $table->integer('moderator_id')->nullable();
            $table->integer('type_id')->nullable()->comment = "Таблица AccrualsType";
            $table->integer('balance_id')->nullable()->comment = "Таблица Balance";

            $table->string('comment')->nullable()->comment = "Коментарий";

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
        Schema::dropIfExists('accruals');
    }
}
