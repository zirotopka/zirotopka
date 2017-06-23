<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalUserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pasport_number')->nullable();
            $table->integer('pasport_series')->nullable();
            $table->timestamp('pasport_data_vidachi')->nullable();
            $table->string('pasport_kem_vidan')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('user_ava_url')->nullable();
            $table->string('surname')->nullable();

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
            $table->dropColumn('pasport_number');
            $table->dropColumn('pasport_series');
            $table->dropColumn('pasport_data_vidachi');
            $table->dropColumn('pasport_kem_vidan');
            $table->dropColumn('birthday');
            $table->dropColumn('user_ava_url');
            $table->dropColumn('surname');
        });
    }
}
