<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePassName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pasport_data_vidachi');
            $table->dropColumn('pasport_kem_vidan');

            $table->integer('pasport_date')->nullable();
            $table->string('pasport_issued')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->timestamp('pasport_data_vidachi')->nullable();
        $table->string('pasport_kem_vidan')->nullable();

        $table->dropColumn('pasport_date');
        $table->dropColumn('pasport_issued');
    }
}
