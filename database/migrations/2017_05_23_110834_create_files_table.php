<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_url')->nullable()->comment = "Путь";
            $table->integer('file_size')->nullable()->comment = "Размер файла";
            $table->integer('file_type')->nullable()->comment = "Тип указан в модели";
            $table->string('name')->nullable()->comment = "Название";

            $table->string('owner_id')->comment = "ID записи";
            $table->string('owner_type')->comment = "Модель";

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
        Schema::dropIfExists('files');
    }
}
