<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment_video')->default(0);
            $table->string('user')->default(0);
            $table->string('comment_text')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments_table', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('comment_video');
            $table->dropColumn('user');
            $table->dropColumn('comment_text');
        });
    }
}
