<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToAccruals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accruals', function (Blueprint $table) {
            $table->boolean('accruals_status')->nullable()->default(false)->comment = 'Статус accrual';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accruals', function (Blueprint $table) {
            $table->dropcolumn('accruals_status');
        });
    }
}
